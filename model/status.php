<?php
include_once 'model.php';
class Status extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_status($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("status ",$array , $k , $sql);
        return $data;
    }
    public function d_status($id)
    {
        $query = "DELETE FROM `status` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }


}