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
					include_once 'base.php';
					$control = new Base();
					$control -> view();
					break;
				}
			}
		}else{
			include_once 'base.php';
			$control = new Base();
			$control -> view();
		}
	}
}

 ?>