<?php 

/**
 * 
 */
session_start();
class Base
{
    function __construct()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 0) {
            header('Location: '. host .'/'. name_project . '?url=admin');
            die;
        }
	}
    
    public function view()
    {
        
        if (isset($_GET['view'])) {
            $function = $_GET['view'];
            $this->$function();
        } else {
            if(isset($_GET['s']))
                $this->seach();
            else
                $this->home();
        }
    }
    public function blogs()
    {
        $post_md = View::get__model('post');
        $post = $post_md->get_post(
            array(
                'status' => '1'
            ),null," ORDER BY `post`.`date`  DESC LIMIT 6"
        );
        $data = array(
            'post' => $post,
            'count' => count($post_md->get_post(array('status' => '1')))
        );
        include_once view_font.'blog.php';
    }
    public function ticker()
    {
        include_once view_font.'ticker.php';
    }
    public function contact(){
        include_once view_font.'contact.php';
    }
    public function login(){
        $model = View::get__model('user');
        if(isset($_POST['password'])){
            $user = $model->get_user(
                array(
                'mail' => $_POST['email'],
                'pass' => $_POST['password']
            ));
            
            if($user != 0 )
            {$user = $user[0];
                $_SESSION['user'] = $user;
                header('Location: '. host .'/'. name_project . '?url=admin');
            }else{
                echo "false";
            }
        }
        
        include_once view_font.'login/index.php';
    }
    public function log_out(){
        if(isset($_POST['key'])){
            unset($_SESSION['cart'][$_POST['key']]);
            if($_POST['key'] == 'all')
                unset($_SESSION['cart']);
        }else{
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
        }
        include_once view_font.'template/header.php';
    }
    public function cart()
    {
        include_once view_font.'cart.php';
    }
    public function content_ticker()
    {
        $ticket_md = View::get__model('ticket');
        
        
        $post = $ticket_md->get_ticket(
            array(
                'status' => '1',
                
            ),null," ORDER BY delivery_date  ASC LIMIT ".($_POST['page']-1)*6 . ' , ' . $_POST['page']*6
        );
        
        $category = View::get__model('category');
        $count = count($ticket_md->get_ticket(array('status' => '1')));
        if(isset($_POST['key'])){
            $post = $ticket_md->select_like_ticket("WHERE `name` LIKE '%".$_POST['key']."%' AND `status` = 1 ORDER BY `description` ASC LIMIT " .($_POST['page']-1)*6 . ' , ' . $_POST['page']*6);
            $count = count($ticket_md->select_like_ticket("WHERE `name` LIKE '%".$_POST['key']."%' AND `status` = 1"));
        }
        
        $data = array(
            'ticket' => $post,
            'count' => $count,
            'page' => $_POST['page'],
            'category' => $category->get__all(array('cat_parent' => '3'))
        );
        
        include_once view_font.'ticket-content.php';
    }
    public function women()
    {
        $color = View::get__model('color');
        $size = View::get__model('size');
        $data = array(
            'color' => $color->get_color(),
            'size' => $size->get_size(),
            
        );
        include_once view_font.'women.php';
    }
    public function men()
    {
        $color = View::get__model('color');
        $size = View::get__model('size');
        $data = array(
            'color' => $color->get_color(),
            'size' => $size->get_size(),
            
        );
        include_once view_font.'men.php';
    }
    public function blogs_detail()
    {
        $category = View::get__model('category');
        $post_md = View::get__model('post');
        $post = $post_md->get_post(
            array(
                'id' => $_GET['post'],
                'status' => '1',
            ),null," ORDER BY `post`.`date`  DESC LIMIT 6"
        );
        $data = array(
            'post' => $post,
            'category' => $category->get__all(array('cat_parent' => '3')),
            'recent' => $post_md->get_post(null,null," ORDER BY `post`.`date`  DESC LIMIT 3"),
            
        );
        include_once view_font.'blog-single.php';
    }
    public function ajax_product()
    {
        $product_md = View::get__model('product');
        if(!isset($_POST['id'])){
            $product = $product_md->get_product(
                array(
                    'status' => '1'
                ),null," ORDER BY  sort DESC LIMIT ".($_POST['page']-1)*6 . ' , ' . $_POST['page']*6
            );
        }
        
        if(isset($_POST['id'])){
            $product = $product_md->get_product(
                array(
                    'status' => '1',
                    'id_category'=>$_POST['id']
                ),null," ORDER BY  sort DESC LIMIT ".($_POST['page']-1)*6 . ' , ' . $_POST['page']*6
            );
            $count =  count($product_md->get_product(array( 'id_category' => $_POST['id'], 'status' => '1')));
        }
        if(isset($_POST['size'])){
            $product = $product_md->select_like_product("WHERE  `size` LIKE '%".$_POST['size']."%'  AND `status` = 1 ORDER BY `sort` ASC LIMIT " .($_POST['page']-1)*6 . ' , ' . $_POST['page']*6);
            $count = $product = $product_md->select_like_product("WHERE `size` LIKE '%".$_POST['size']."%' AND `status` = 1 ORDER BY `sort` ASC ");
        }
         $data = array(
            'product' => $product,
            'count' => $count,
            'page' => $_POST['page']
        );
        include_once view_font.'product.php';
    }
    public function ajax_product_4_column()
    {
        $product_md = View::get__model('product');
        $product = $product_md->get_product(
            array(
                'status' => '1'
            ),null," ORDER BY  sort DESC LIMIT ".($_POST['page']-1)*12 . ' , ' . $_POST['page']*12
        );
        $count = count($product_md->get_product(array('status' => '1')));
        if(isset($_POST['key'])){
            $product = $product_md->select_like_product("WHERE `title` LIKE '%".$_POST['key']."%' AND `status` = 1 ORDER BY `sort` ASC LIMIT " .($_POST['page']-1)*12 . ' , ' . $_POST['page']*12);
            ($product !=0) ?
            $count = count($product_md->select_like_product("WHERE `title` LIKE '%".$_POST['key']."%' AND `status` = 1"))
            : $count = 0;
        }
        $data = array(
            'product' => $product,
            'count' => $count,
            'page' => $_POST['page']
        );
        include_once view_font.'product_list.php';
    }
    public function product_detail()
    {
        $color = View::get__model('color');
        $size = View::get__model('size');
        $product_md = View::get__model('product');
        $product = $product_md->get_product(
            array(
                'status' => '1',
                'id'=>$_GET['id']
            )
        );
        $data = array(
            'product' => $product,
            'color' => $color->get_color(),
            'size' => $size->get_size(),
        );
        include_once view_font.'product-detail.php';
    }
    public function cart_site()
    {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            if (isset($_SESSION['cart'])) {
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] += $_POST['quantity'];
                }
                else{
                    $_SESSION['cart'][$id]['size'] = $_POST['size'];
                    $_SESSION['cart'][$id]['color'] = $_POST['color'];
                    $_SESSION['cart'][$id]['title'] = $_POST['title'];
                    $_SESSION['cart'][$id]['img'] = $_POST['img'];
                    $_SESSION['cart'][$id]['price'] = $_POST['price'];
                    $_SESSION['cart'][$id]['quantity'] = $_POST['quantity'];
                }
            }
            else{              
                $_SESSION['cart'][$id]['size'] = $_POST['size'];
                $_SESSION['cart'][$id]['color'] = $_POST['color'];
                $_SESSION['cart'][$id]['title'] = $_POST['title'];
                $_SESSION['cart'][$id]['img'] = $_POST['img'];
                $_SESSION['cart'][$id]['price'] = $_POST['price'];
                $_SESSION['cart'][$id]['quantity'] = $_POST['quantity'];
            }
            include_once view_font.'template/header.php';
        }
        else{
            echo "Lỗi";
        }
    }
    public function about()
    {
        include_once view_font.'about.php';
    }
    public function home()
    {
        include_once view_font.'index.php';
    }
    public function cart_table()
    {
        if(isset($_POST['id'])) $_SESSION['cart'][$_POST['id']]['quantity'] = $_POST['quantity'];
        include_once view_font.'table_cart.php';
    }
    public function checkout()
    {
        include_once view_font.'checkout.php';
    }
    public function new_acc()
    {
        $model = View::get__model('user');
        if(isset($_POST['mail']))
        {
            $data = array(
            'mail' => $_POST['mail'],
            'pass' => $_POST['pass'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'phone' => $_POST['phone'],
            'address' =>$_POST['address']
            );
            $model ->add_user_member($data);
            
            header('Location: '. host .'/'. name_project . '?view=login');
        }
        include_once view_font.'login/new.php';
    }
    public function push_bill()
    {
        if(isset($_POST))
        {
            $bill = View::get__model('bill');
            $sum = 0;
            foreach($_SESSION['cart'] as $item => $key)
                $sum += $key['quantity'] * $key['price'];
             
            $data = array(
                'id_user' => $_SESSION['user']['id'],
                'total' => $sum,
                'status' => 1
            );
            $bill->add_bill($data);
            $id = $bill->get_bill(null,null,"ORDER BY `bill`.`id` DESC LIMIT 1");
            $id = $id[0]['id'];
            $bill_detail = View::get__model('bill_detail');
            foreach($_SESSION['cart'] as $item => $key)
            {
                $data = array(
                    'id_bill' => $id,
                    'id_product' => $item,
                    'quantity' => $key['quantity'],
                    'size' => $key['size'],
                    'color' => $key['color']
                );
                $bill_detail->add_bill_detail($data);
            }

            include_once view_font.'order-complete.php';
        }
    }
    public function profile()
    {
        $bill = View::get__model('bill');
        $status = View::get__model('status');
        $model = View::get__model('user');
        if(isset($_POST['mail']))
        {
            $data = array(
            'id' =>$_SESSION['user']['id'],
            'mail' => $_POST['mail'],
            'pass' => $_POST['pass'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'phone' => $_POST['phone'],
            'address' =>$_POST['address']
            );
            
            
            $model ->update_user_member($data);
            header("Refresh: ?view=profile");
            $user = $model ->get_user(array('id'=>$_SESSION['user']['id']));
            $user = $user[0];
            session_reset();
            $_SESSION['user'] = $user;
        }
        $data = array(
            'bill' => $bill->get_bill(
                array(
                    'id_user' => $_SESSION['user']['id']
                )
                ),
            'status' => $status->get_status()
        );
        if(isset($_GET['id'])){
            $bill->update_bill_status_5($_GET['id']);
            header("Location: ?view=profile");
        }
        
        include_once view_font.'profile.php';
    }
    public function bill_view()
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
        include_once view_font.'bill_detail.php';
    }
    public function seach()
    {
        include_once view_font.'seach.php';
    }
}