
<?php
class UserModel{
    const TABLE = 'user';
    public function getAll(){
        $user = array();
        $fileUser = "./data/user.txt";
        if(file_exists($fileUser)){
            $r = fopen($fileUser, "r");
            while(!feof($r)){
                $row = fgets($r);
                //loại bỏ rỗng
                if(!empty($row)){
                    // chuyển sang dang mãng mỗi phàn tử trong mảng dc hình thành sau dáu |
                    $user[] = explode("|",$row);
                }
            }
            return $user;
        }
        else{
            echo "k có file";    
        }
    }
}
?>