<?php
include_once 'model.php';
class admin_model extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    public function get_user()
    {
        $query = "SELECT * FROM `user`";
        $data = $this->admin->Select($query);
        return $data;
    }
}