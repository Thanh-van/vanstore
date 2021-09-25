<?php 

/**
 * 
 */
session_start();
class Admin
{
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
    private function ticket()
    {
        $category = View::get__model('category');
        $model = View::get__model('ticket');
        $all = $model -> get_ticket();
        if(isset($_POST['publish']))
        {
            ($_POST['id'] === 'add') ? $model ->add_ticket($_POST) : $model ->update_ticket($_POST);
            header("Refresh:0");
        }
        if(isset($_GET['id'])) { $model ->d_ticket($_GET['id']); header("Refresh:0; ?url=admin&view=ticket"); };
        $data = array(
            'ticket' => $all,
            'category' => $category->get__all(array('cat_parent' => '3'))
        );
        View::get_layout("ticket",$data);
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
    private function post()
    {
        $category = View::get__model('category');
        $model = View::get__model('post');
        $data = array(
            'post' => $model->get_post(),
            'category' =>  $category->get__all()
        );
        View::get_layout("post",$data);
    }

    public function post_detail()
    {
        print_r($_POST);
        $category = View::get__model('category');
        $model = View::get__model('post');
         (isset($_GET['id'])) ?  $post = $model->get_post(array( 'id' => $_GET['id'])) :  $post = $model->get_post();
        if(isset($_POST['publish']))
        {
            (isset($_GET['id'])) ? $model ->update_post($_POST) : $model ->add_post($_POST) ;
            header("Refresh:0");
        }
        $data = array(
            'post' => $post,
            'category' =>  $category->get__all()
        );
        View::get_layout("post_detail",$data);
    }
}

 ?>