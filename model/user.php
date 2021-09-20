<?php
include_once 'model.php';
class User extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_user()
    {
        $a = null;
        $data = $this->admin->Select("user ",$a);
        return $data;
    }
    public function d_user($id)
    {
        $query = "DELETE FROM `user` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    


}