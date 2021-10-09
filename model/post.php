<?php
include_once 'model.php';
class Post extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_post($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("post ",$array , $k , $sql);
        return $data;
    }
    public function d_post($id)
    {
        $query = "DELETE FROM `post` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_post($POST)
    {
        $img = $this->Move_file('img');
        ($img === false) ? $img = $_POST['img1'] : $img ; 
        $array = $this->get_data($POST,$img);
        $data =  $this->admin->Update('post',$array,$POST['id']);
    }
    public function add_post($POST)
    {
        $img = $this->Move_file('img');
        $array = $this->get_data($POST,$img);
        $data =  $this->admin->INSERT('post',$array);
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
            'id_category' => serialize($POST['category']),
            'title' => $POST['title'],
            'description' => $POST['description'],
            'content' => $POST['content'],
            'img' => $img,
            'date' => date("Y-m-d"),
            'status' => $POST['status']
        );
        return $array;
    }


}