<?php
include_once 'model.php';
class Size extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_size($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("size ",$array , $k , $sql);
        return $data;
    }
    public function d_size($id)
    {
        $query = "DELETE FROM `size` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_size($size)
    {
        $img = $this->Move_file('img');
        ($img === false) ? $img = $_POST['img1'] : $img ; 
        $array = $this->get_data($size,$img);
        $data =  $this->admin->Update('size',$array,$size['id']);
    }
    public function add_size($size)
    {
        $img = $this->Move_file('img');
        $array = $this->get_data($size,$img);
        $data =  $this->admin->INSERT('size',$array);
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
    private function get_data($size,$img)
    {
        $array = array(
            'id_category' => serialize($size['category']),
            'title' => $size['title'],
            'description' => $size['description'],
            'content' => $size['content'],
            'img' => $img,
            'date' => date("Y-m-d"),
            'status' => $size['status']
        );
        return $array;
    }


}