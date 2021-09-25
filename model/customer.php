<?php
include_once 'model.php';
class Customer extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    public function get_user($array = null , $k = null)
    {
        $data = $this->admin->Select("user ",$array , $k);
        return $data;
    }
    public function d_user($id)
    {
        $query = "DELETE FROM `user` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_user($POST)
    {
        $img = $this->Move_file('img');
        ($img === false) ? $img = $_POST['img1'] : $img ; 
        $array = $this->get_data($POST,$img);
        $data =  $this->admin->Update('user',$array,$POST['id']);
    }
    public function add_user($POST)
    {
        $img = $this->Move_file('img');
        $array = $this->get_data($POST,$img);
        $data =  $this->admin->INSERT('user',$array);
    }
    private function Move_file($name)
    {
        if (isset($_FILES[$name]))
        {
            if ($_FILES[$name]['error'] > 0)
            {
                return false;
            }
            else{
                move_uploaded_file($_FILES[$name]['tmp_name'], 'view/upload/'. $_FILES[$name]['name']);
                echo 'File Uploaded';
            }
        }
        else{
            return false;
        }
        return  $_FILES[$name]['name'];
    }
    private function get_data($POST,$img)
    {
        $array = array(
            'user' => $POST['user'],
            'pass' => $POST['pass'],
            'img' => $img,
            'sex' => $POST['sex'],
            'phone' => $POST['phone'],
            'address' => $POST['address'],
            'level' => '1'
        );
        return $array;
    }


}