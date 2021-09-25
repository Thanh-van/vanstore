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
        $img = $this->Move_file('img');
        ($img === false) ? $img = $_POST['img1'] : $img ; 
        $array = $this->get_data($POST,$img);
        $data =  $this->admin->Update('ticket',$array,$POST['id']);
    }
    public function add_ticket($POST)
    {
        $img = $this->Move_file('img');
        $array = $this->get_data($POST,$img);
        $data =  $this->admin->INSERT('ticket',$array);
    }
    private function Move_file($name)
    {
        if (isset($_FILES[$name]))
        {
            if ($_FILES[$name]['error'] > 0)
            {
                return false;
            }
            else{
                move_uploaded_file($_FILES[$name]['tmp_name'], 'view/upload/'. $_FILES[$name]['name']);
                echo 'File Uploaded';
            }
        }
        else{
            return false;
        }
        return  $_FILES[$name]['name'];
    }
    private function get_data($POST,$img)
    {
        $array = array(
            'name' => $POST['name'],
            'id_category' => $POST['id_category'],
            'price' => $POST['price'],
            'img' => $img,
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