<?php
include_once 'model.php';
class Category extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get__all($a)
    {
        $data = $this->admin->Select("category",$a);
        return $data;
    }
    public function d_user($id)
    {
        $query = "DELETE FROM `user` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    


}