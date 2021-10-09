<?php
include_once 'model.php';
class Bill_detail extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    public function get_bill_detail($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("bill_detail ",$array , $k,$sql);
        return $data;
    }
    public function d_bill_detail($id)
    {
        $query = "DELETE FROM `bill_detail` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_bill_detail($POST)
    {
        $array = $this->get_data($POST);
        $data =  $this->admin->Update('bill_detail',$array,$POST['id']);
    }
    public function add_bill_detail($POST)
    {
        $array = $this->get_data($POST);
        $data =  $this->admin->INSERT('bill_detail',$array);
        return $data;
    }
    private function get_data($POST)
    {
        $array = array(
            'id_bill' => $POST['id_bill'],
            'id_product' => $POST['id_product'],
            'quantity' => $POST['quantity'],
            'size' => $POST['size'],
            'color' => $POST['color']
        );
        return $array;
    }


}