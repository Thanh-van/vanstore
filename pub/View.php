<?php 

class View{
    

    public static function get_layout($file_name,$data)
    {
        ob_start();
        $default = "user.php";
        $file_name = admin_view . '/view/' . $file_name .".php";
        
        (file_exists($file_name) === false) ? require admin_view . $default : require $file_name;
        $layout = ob_get_clean();
        include_once 'view/admin/index.php';
    }

    public static function get__model($file_name)
    {
        include_once 'model/' . $file_name . '.php';
        $file_name = ucwords($file_name);
        $model = new $file_name();
        return $model;
    }
}