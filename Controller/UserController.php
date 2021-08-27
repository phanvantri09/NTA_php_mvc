
<?php
class UserController extends BaseController{
    protected $userModel;
    public function __construct() {
        $this->model('UserModel');
        $this->userModel = new UserModel;
    }
    public function index(){
        $k = $this->userModel->getAll();
    
        return $this->view('page.pageUser',['k'=>$k]);
    }
    
}
?>