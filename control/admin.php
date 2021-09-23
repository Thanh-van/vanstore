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
        $user = (isset($_GET['lv'])) ? $model->get_user(array( 'level' => $_GET['lv'])) : $user;
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
        $data = array(
            'ticket' => $all,
            'category' => $category->get__all(array('cat_parent' => '3'))
        );
        if(isset($_POST['publish']))
            print_r($_POST);
        View::get_layout("ticket",$data);
    }
    private function Move_file($name)
    {
        if (isset($_FILES[$name]))
        {
            if ($_FILES[$name]['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                move_uploaded_file($_FILES[$name]['tmp_name'], 'view/upload/'. $_FILES[$name]['name']);
                echo 'File Uploaded';
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
    private function test()
    {   
    
        $this->Move_file('avatar');

        View::get_layout("movefile",null);
    }
}

 ?>