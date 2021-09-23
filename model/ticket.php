<?php
include_once 'model.php';
class Ticket extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_ticket($array = null , $k = null)
    {
        $data = $this->admin->Select("ticket ",$array , $k);
        return $data;
    }
    public function d_ticket($id)
    {
        $query = "DELETE FROM `ticket` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_ticket($POST)
    {
        $array = $this->get_data($POST);
        $data =  $this->admin->Update('ticket',$array,$POST['id']);
    }
    public function add_ticket($POST)
    {
        $array = $this->get_data($POST);
        $data =  $this->admin->INSERT('ticket',$array);
    }
    private function get_data($POST)
    {
        $array = array(
            'name' => $POST['name'],
            'id_category' => $POST['id_category'],
            'price' => $POST['price'],
            'img' => $POST['img'],
            'description' => $POST['description'],
            'delivery_date' => $POST['delivery_date'],
            'end_date' => $POST['end_date'],
            'quantity' => $POST['quantity'],
            'sort' => $POST['sort'],
            'status' => $POST['status']
        );
        return $array;
    }


}