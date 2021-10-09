<?php
include_once 'model.php';
class product extends Basemodel{
    private $admin ;
	function __construct()
	{
		$this->admin = new Basemodel();
	}
    
    
    public function get_product($array = null , $k = null,$sql = null)
    {
        $data = $this->admin->Select("product ",$array , $k , $sql);
        return $data;
    }
    public function select_like_product($sql)
    {
        $data = $this->admin->Select_like("product ",$sql);
        return $data;
    }
    public function d_product($id)
    {
        $query = "DELETE FROM `product` WHERE id =" . $id;
        $data = $this->admin->Delete($query);
        return $data;
    }
    public function update_product($product)
    {
        $img = $this->Move_file('img');
        
        ($img === "a:0:{}") ? $img = serialize($product['img1']) : $img ; 
        $array = $this->get_data($product,$img);
        print_r($array);
        $data =  $this->admin->Update('product',$array,$product['id']);
    }
    public function add_product($product)
    {
        $img = $this->Move_file('img');
        $array = $this->get_data($product,$img);
        $data =  $this->admin->INSERT('product',$array);
        
    }
    private function Move_file($name)
    {
        
        $arr=array();
        foreach ($_FILES[$name]["error"] as $key => $error) {
           
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES[$name]["tmp_name"][$key];
                $name_file = ($_FILES[$name]["name"][$key]);
                move_uploaded_file($tmp_name, 'view/upload/'. $name_file);
                echo 'File Uploaded';
                
                array_push($arr,$name_file);
            }
        }
        return  serialize($arr);
    }
    private function get_data($product,$img)
    {
        $array = array(
            'id_category' => ($product['id_category']),
            'title' => str_replace("'","&#039",$product['title']),
            'price' => $product['price'],
            'description' => str_replace("'","&#039",$product['description']),
            'manufacturer' => str_replace("'","&#039",$product['manufacturer']),
            'short_description' => str_replace("'","&#039",$product['short_description']),
            'img' => ($img),
            'size' => serialize($product['size']),
            'color' => serialize($product['color']),
            'sort' => $product['sort'],
            'status' => $product['status']
        );
        return $array;
    }


}