<?php
include_once 'model.php';
class Bill extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    public function get_bill($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("bill ",$array , $k,$sql);
        return $data;
    }
    public function d_bill($id)
    {
        $query = "DELETE FROM `bill` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_bill($POST)
    {
        $array = $this->get_data($POST);
        $data =  $this->admin->Update('bill',$array,$POST['id']);
    }
    public function add_bill($POST)
    {
        $array = $this->get_data($POST);
        $data =  $this->admin->INSERT('bill',$array);
        return $data;
    }
    private function get_data($POST)
    {
        $array = array(
            'id_user' => $POST['id_user'],
            'date' => date("Y-m-d"),
            'total' => $POST['total'],
            'status' => $POST['status']
        );
        return $array;
    }
    public function update_bill_status($id)
    {
        $data =  $this->admin->Update('bill',array(
            'status' => 2
        ),$id);
    }
    public function update_bill_status_5($id)
    {
        $data =  $this->admin->Update('bill',array(
            'status' => 5
        ),$id);
    }
    


}