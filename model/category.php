<?php
include_once 'model.php';
class Category extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get__all($array = null)
    {
        $data = $this->admin->Select("category",$array);
        return $data;
    }

    public function update_category($POST)
    {
        $array = array(
            'name' => $POST['name'],
            'cat_parent' => $POST['cat_parent'],
            'sort' => $POST['sort_ctlg'],
            'status' => $POST['status_ctlg']
        );
        $data =  $this->admin->Update('category',$array,$POST['id']);
    }
    public function add_category($POST)
    {
        $array = array(
            'name' => $POST['name'],
            'cat_parent' => $POST['cat_parent'],
            'sort' => $POST['sort_ctlg'],
            'status' => $POST['status_ctlg']
        );
        $data =  $this->admin->INSERT('category',$array);
    }
    public function delete_catalog($id)
    {
        $query = "DELETE FROM `category` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }

}