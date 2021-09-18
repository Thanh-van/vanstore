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
        $a = array(
            'id' => 1
        );
        $query = "SELECT * FROM `user`".$this ->admin->query_select($a);
        $data = $this->admin->Select($query);
        return $data;
    }
    public function d_user($id)
    {
        $query = "DELETE FROM `user` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
}