
<?php
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