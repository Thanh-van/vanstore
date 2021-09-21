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
        $user = $model->get_user();
        $data = array(
            'user' => $user
        );
        (isset($_GET['id'])) ? $model->d_user($_GET['id']) : null ;
        if(isset($_GET['page']) && $_GET['page'] == 'admin'){

            echo "ahihi";
        }else{
            // echo "user";
        }
        View::get_layout("user",$data);
    }

    private function catalog()
    {
        $model = View::get__model('category');
        $data = $model -> get__all(null);
        View::get_layout("category",$data);
    }
}

 ?>