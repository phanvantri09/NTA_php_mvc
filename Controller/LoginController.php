<?php
class LoginController extends BaseController{
    protected $userModel;
    public function __construct(){
        $this->model('UserModel');
        $this->userModel = new UserModel;
    }
    public function login(){
        //khi đã đăng nhập rồi thì sẻ lưu trong vòng 1 ngày  nếu nhập đúng url sẻ chuyển thẳng vào user
        $cookie_name = 'login';
        $cookie_time = (3600 * 24 * 1); // 1 days
        $this->view('page.Login',[]);
        if(empty($_SESSION['usernameLogin'])){
 
            if(isset($cookie_name)){
     
                if(isset($_COOKIE[$cookie_name])){
     
                    parse_str($_COOKIE[$cookie_name]);
    
                    foreach($items as $key => $item){
                        if($item[1]==$usr && $item[4]==$hash){
                            $this->view('page.Login',[]);//chuyển view cho màn hình
                            echo "<script>alert('đăng nhập ko thành công session')</script>";
                        }
                    }
                }
            }
        }else{
            header("Location: https://localhost/NTA_php_mvc/index.php?controller=user&action=index");
            //chuyển view cho màn hình
            echo "<script>alert('đã lưu tt vào sesion')</script>";
        }
        $items = $this->userModel->getAll();
        if(isset($_POST["btnLogin"])){
            $userName = $_POST["usernameLogin"];
            $passWord = $_POST["passwordLogin"];
            $check_remember = ((isset($_POST['checkboxLogin'])!=0)?1:"");
            if(empty($_POST["usernameLogin"]) || empty($_POST["passwordLogin"])){
                
                echo "<script>alert('Vui lòng đăng nhập lại vì thiếu thông tin ')</script>";
                
            }
            else{              
                foreach($items as $key => $item){
                    if($item[1]==$userName && $item[4]==$passWord){
                        $_SESSION['usernameLogin']=$item[1];
                        $_SESSION['passwordLogin']=$item[4];
                        if($check_remember==1){
                            setcookie ($cookie_name, 'usr='.$item[1].'&hash='.$item[4], time() + $cookie_time);
                        }
                        $key = $item[0];
                        header("Location: https://localhost/NTA_php_mvc/index.php?controller=user&action=index");
                        //chuyển view cho màn hình
                        echo "<script>alert('đăng nhập thành công')</script>";
                        exit;
                    }
                    else{
                        echo "<script>alert('đăng nhập không thành công, vui lòng kiểm tra lại thông tin của bạn')</script>";
                        exit;
                    }
                }
            }
        }
    }
    public function logout(){
        unset($_SESSION['usernameLogin']);
        unset($_SESSION['passwordLogin']);
        header('Location: ./index.php?controller=login&action=login');
    }
}
?>