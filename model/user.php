<?php
include_once 'model.php';
class User extends Basemodel{
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
        $array = array(
            'user' => $POST['user'],
            'pass' => $POST['pass'],
            'img' => null,
            'level' => 0
        );
        $data =  $this->admin->Update('user',$array,$POST['id']);
    }
    public function add_user($POST)
    {
        $array = array(
            'user' => $POST['user'],
            'pass' => $POST['pass'],
            'img' => null,
            'level' => 0
        );
        $data =  $this->admin->INSERT('user',$array);
    }


}