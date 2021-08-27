
<?php
class BaseController{
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';
    protected function view($path, $data=[]){
        foreach ($data as $key =>$value){
            $$key = $value;
        }
        $path = self::VIEW_FOLDER_NAME . '/' . str_replace('.','/',$path).'.php';
        return require ($path);
    }
    protected function model($path){
        require  (self::MODEL_FOLDER_NAME . '/' .$path.'.php');
    }
}
?>