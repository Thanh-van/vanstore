<?php 

/**
 * 
 */
include_once 'model/admin.php';
session_start();
class Admin
{
	private $base;
	function __construct()
	{
		$this->base=new admin_model();
	}
	
	public function view()
	{
        
		$user = $this->base->get_user();
        if(isset($_GET['view'])){
            switch($_GET['view']){
                case 'user':{
                    $this->user();
                    break;
                }
            }
        }
		include_once 'view/admin/index.php';
	}

    private function user()
    {
        if(isset($_GET['page']) && $_GET['page'] == 'admin'){
            echo "ahihi";
        }else{
            echo "user";
        }
    }
}

 ?>