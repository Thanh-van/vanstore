<?php
include_once 'model.php';
class Color extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_color($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("color ",$array , $k , $sql);
        return $data;
    }
    public function d_color($id)
    {
        $query = "DELETE FROM `color` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_color($color)
    {
        $img = $this->Move_file('img');
        ($img === false) ? $img = $_POST['img1'] : $img ; 
        $array = $this->get_data($color,$img);
        $data =  $this->admin->Update('color',$array,$color['id']);
    }
    public function add_color($color)
    {
        $img = $this->Move_file('img');
        $array = $this->get_data($color,$img);
        $data =  $this->admin->INSERT('color',$array);
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
    private function get_data($color,$img)
    {
        $array = array(
            'id_category' => serialize($color['category']),
            'title' => $color['title'],
            'description' => $color['description'],
            'content' => $color['content'],
            'img' => $img,
            'date' => date("Y-m-d"),
            'status' => $color['status']
        );
        return $array;
    }


}