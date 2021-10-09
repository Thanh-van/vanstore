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
    public function add_user_member($POST){
        $array = array(
            'mail' => $POST['mail'],
            'pass' => $POST['pass'],
            'img' => null,
            'first_name' => $POST['first_name'],
            'last_name' => $POST['last_name'],
            'phone' => $POST['phone'],
            'address' =>$POST['address'],
            'level' => 1
        );
        $data =  $this->admin->INSERT('user',$array);
    }
    public function update_user_member($POST){
        $array = array(
            'mail' => $POST['mail'],
            'pass' => $POST['pass'],
            'img' => null,
            'phone' => $POST['phone'],
            'first_name' => $POST['first_name'],
            'last_name' => $POST['last_name'],
            'address' =>$POST['address'],
            'level' => 1
        );
        $data =  $this->admin->Update('user',$array,$POST['id']);
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
            'mail' => $POST['user'],
            'pass' => $POST['pass'],
            'img' => null,
            'level' => 0
        );
        $data =  $this->admin->Update('user',$array,$POST['id']);
    }
    public function add_user($POST)
    {
        $array = array(
            'mail' => $POST['user'],
            'pass' => $POST['pass'],
            'img' => null,
            'level' => 0
        );
        $data =  $this->admin->INSERT('user',$array);
    }


}