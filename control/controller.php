<?php 

/**
 * 
 */
class Control
{
	public function destination()
	{
		if(isset($_GET['url'])){
			switch($_GET['url']){
				case 'admin':{
					include_once 'admin.php';
					$control = new Admin();
					$control -> view();
					break;
				}
				case 'font':{
					
					break;
				}
			}
		}
	}
}

 ?>