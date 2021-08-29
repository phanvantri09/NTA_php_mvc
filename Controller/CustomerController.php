
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class CustomerController extends BaseController{
    protected $customerModel;
    protected $userModel;
    public function __construct() {
        $this->model('CustomerModel');
        $this->customerModel = new CustomerModel;
        $this->model('UserModel');
        $this->userModel = new UserModel;
    }
    public function index(){
        $kc = $this->customerModel->getAll();
        $k = $this->userModel->getAll();
        if(isset($_POST["sendmail"])){
            $addressMail = $_POST["addressMail"];
            if(empty($_POST["addressMail"])){
                echo "<script>alert('ko có giá trị mail')</script>";
                return $this->view('page.pageCustomer',['kc'=>$kc,'k'=>$k]);
            }
            require './public/includes/Exception.php';
            require './public/includes/PHPMailer.php';
            require './public/includes/SMTP.php';
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth= "true";
            $mail->SMTPSecure = "tls";
            $mail->Port="587";
            $mail->Username="pvtri.18it5@vku.udn.vn";
            $mail->Password="Abcd1234";
            $mail->isHTML(true);
            $mail->Subject="tesssssss mail";
            $mail->setFrom("$addressMail");
            $mail->Body="thiss plain text";
            $mail->addAddress("$addressMail");
            if ($mail->Send()){
                echo "<script>alert('Đã gửi mail')</script>";
                return $this->view('page.pageCustomer',['kc'=>$kc,'k'=>$k]);
                
            }
            else{
                return $this->view('page.pageCustomer',['kc'=>$kc,'k'=>$k]);
                echo "<script>alert('lỗi gửi mail')</script>";
            }
            $mail->smtpClose();
        }
        if(isset($_POST["btnsearch"])){
            $textsearch = $_POST["textsearch"];
            if(empty($_POST["textsearch"])){
                echo "<script>alert('Hãy nhập dữ liệu tìm kiếm trước khi nhấn nút tìm kiếm')</script>";    
            }
            else{              
                foreach($kc as $key => $item){
                    if($item[2]==$textsearch || $item[3]==$textsearch){
                        //chuyển view cho màn hình
                        return $this->view('page.pageCustomer',['kc'=>$kc,'k'=>$k,'textsearch'=>$textsearch]);
                        exit;
                    }
                    else{
                        echo "<script>alert('không có khách hàng có thông tin trên')</script>";
                        return $this->view('page.pageCustomer',['kc'=>$kc,'k'=>$k]);
                        exit;
                    }
                }
            }
          }
          
        return $this->view('page.pageCustomer',['kc'=>$kc,'k'=>$k]);
        
    }
}
?>