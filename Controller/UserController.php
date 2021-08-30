
<?php
class UserController extends BaseController{
    protected $userModel;
    public function __construct() {
        $this->model('UserModel');
        $this->userModel = new UserModel;
    }
    public function index(){
        $k = $this->userModel->getAll();
        $url_img ="";
        if(isset($_FILES['choesefile'])){
            $fileName = $_FILES["choesefile"]["name"];
            $fileType = $_FILES["choesefile"]["type"];
            $tmpName = $_FILES["choesefile"]["tmp_name"];
            $fileSize = $_FILES["choesefile"]["size"];
            $ext = explode(".", $fileName);
            $fileExt= strtolower(end($ext));
        
            $arrExt = array("jpg", "png");
            if(!in_array($fileExt, $arrExt)){
                
                echo "<script>alert('Không đúng định dạng file ảnh.')</script>";
                return $this->view('page.pageUser',['k'=>$k]);
              exit;
            }
            if($fileSize>2097152){
              echo"<script>alert('file quá lớn ko thể update')</script>";
              return $this->view('page.pageUser',['k'=>$k]);
            }
            move_uploaded_file($tmpName,"./public/img/".$fileName);
            $url_img ="./public/img/".$fileName;
            $writeFile = fopen("./data/user.txt", "w") or die("Unable to open file!");
            foreach($k as $key=> $item){
              if($item[1]!=$_SESSION['usernameLogin']){
                fwrite($writeFile, $item[0]."|".$item[1]."|".$item[2]."|".$item[3]."|".$item[4]."|".$item[5]."|".$item[6]);
              }
              else{
                fwrite($writeFile, $item[0]."|".$item[1]."|".$item[2]."|".$item[3]."|".$item[4]."|".$item[5]."|".$url_img."\n");
              }
            }
            fclose($writeFile);
            echo"<script>alert('Đã cập nhật avatar')</script>";
            echo header("refresh: 1; url = https://localhost/NTA_php_mvc/index.php?controller=user&action=index");
          }
        return $this->view('page.pageUser',['k'=>$k]);
    }
    
}
?>