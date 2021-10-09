<?php 

/**
 * 
 */
session_start();
class Admin
{
    function __construct()
	{
		if(isset($_SESSION['user'])) {
            if($_SESSION['user']['level'] != 0){
                header('Location: '. host .'/'. name_project);
                die;
            }
        }else{
            header('Location: '. host .'/'. name_project);
        }
	}
    public function log_out(){
        unset($_SESSION['user']);
        header('Location: '. host .'/'. name_project);
        die;
    }
	public function view()
	{
        if(isset($_GET['view'])){
            $function = $_GET['view'];
            $this->$function();
        }else{
            $this -> user();
        }
	}
    
    private function user()
    {
        $model = View::get__model('user');
        (isset($_GET['id'])) ? $model->d_user($_GET['id']) : false;
        $user = $model->get_user();
        
        $check =  ( isset($_POST['publish']) ) ? ((isset($_POST['id']) && $_POST['id'] === 'add' ) ? $model->add_user($_POST): $model->update_user($_POST)) : null;
        $user = $model->get_user(array( 'level' => 0));
        $data = array(
            'user' => $user
        );
        View::get_layout("user",$data);
    }

    private function catalog()
    {
        $model = View::get__model('category');
        ( isset($_POST['publish']) ) ? 
        ((isset($_POST['id']) && $_POST['id'] === 'add' ) ? 
        $model->add_category($_POST): $model->update_category($_POST)) : null;
        (isset($_GET['id'])) ? $model->delete_catalog($_GET['id']) : false;
        $data = $model -> get__all(null);
        View::get_layout("category",$data);
    }
    private function bill()
    {
        $status = View::get__model('status');
        $bill = View::get__model('bill');
        $data = array(
            'bill' => $bill->get_bill(),
            'status' => $status->get_status()
        );
        if(isset($_GET['id']))
        {
            if(isset($_GET['key']) && $_GET['key'] == 2)
                $bill->update_bill_status($_GET['id']);
            else $bill->update_bill_status_5($_GET['id']);
            header('Location: ?url=admin&view=bill');
        }
        View::get_layout("bill",$data);
    }
    private function customer()
    {
        $model = View::get__model('customer');
        if(isset($_GET['id'])) { $model ->d_user($_GET['id']); header("Refresh:0; ?url=admin&view=customer"); };
        $user = $model->get_user();
        
        $check =  ( isset($_POST['publish']) ) ? ((isset($_POST['id']) && $_POST['id'] === 'add' ) ? $model->add_user($_POST): $model->update_user($_POST)) : null;
        $user = $model->get_user(array( 'level' => '1'));
        $data = array(
            'user' => $user,
            'lv'   => '1'
        );
        View::get_layout("customer",$data);
    }
    private function test()
    {   
        View::get_layout("movefile",null);
    }
    private function product()
    {
        $category = View::get__model('category');
        $model = View::get__model('product');
        if (isset($_GET['id'])) {
            $post = $model->d_post($_GET['id']);
            header("?url=admin&view=post");
        }
        $color = View::get__model('color');
        $data = array(
            'color' => $color->get_color(),
            'product' => $model->get_product(),
            'category' =>  $category->get__all()
        );
        View::get_layout("product",$data);
    }

    public function product_detail()
    {
        $category = View::get__model('category');
        $model = View::get__model('product');
        (isset($_GET['id'])) ?  $post = $model->get_product(array( 'id' => $_GET['id'])) :  $post = null;
        if(isset($_POST['publish']))
        {
            (isset($_POST['id'])) ? $model ->update_product($_POST) : $model ->add_product($_POST) ;
            
        }
        
        $color = View::get__model('color');
        $size = View::get__model('size');
        $data = array(
            'color' => $color->get_color(),
            'size' => $size->get_size(),
            'product' => $post,
            'category' =>  $category->get__all()
        );
        View::get_layout("product_detail",$data);
    }
    public function bill_table()
    {
        $product_md = View::get__model('product');
        $detail = View::get__model('bill_detail');
        $color = View::get__model('color');
        $bill = $detail->get_bill_detail(
            array(
                'id_bill' => $_POST['id']
            ));
        $size = View::get__model('size');
        $product =array();
        foreach ($bill as $item => $key) {
            $arr = $product_md->get_product(
                array(
                    'id' => $key['id_product']
                )
            );
            array_push($product,$arr);
        }
        $data = array(
            'product' => $product,
            'bill' => $bill,
            'color' => $color->get_color(),
            'size' => $size->get_size()
        );
        include_once admin_view.'view/table_detail.php';
    }
}

 ?>