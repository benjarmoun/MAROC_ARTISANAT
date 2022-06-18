<?php
// require_once './views/includes/header.php';
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, DELETE, PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once './autoload.php';
require_once './controllers/HomeController.php';
$home = new HomeController();
$prod = new ProductsController();
$user = new UserController();
$cat = new CategoryController();


$pages = ['addProduct','getproducts','getProductsAdmn','updateProduct','loginAdmin','getSellers','getProductBySeller','getProductByCategoryName','deleteProduct','getProductByCategory','getCategories','addCategory','deleteCategory','auth','registerUser','deleteUser','getSingleUser','getUsers','login','updateUser','getProductID'];
// print_r($parts) ;
// if(isset($_SESSION['log']) && $_SESSION['log'] === true){
    if(isset($_GET['page'])){
            $parts = explode('/',$_GET['page']);
            // echo $parts[1];
            if(in_array($parts[0] , $pages)){
                $page = $parts[0];
                // echo $page;
                if(method_exists($prod, $page)){
                    if ($page == 'getProductID') {
                        $prod->getProductID($parts[1]);

                    }elseif ($page == 'getProductByCategory') {
                        $prod->getProductByCategory($parts[1]);
                    }elseif ($page == 'getProductByCategoryName') {
                        $prod->getProductByCategoryName($parts[1]);
                    }elseif ($page == 'getProductBySeller') {
                        $prod->getProductBySeller($parts[1]);
                    }elseif ($page == 'updateProduct') {
                        $prod->updateProduct($parts[1]);
                    }elseif ($page == 'deleteProduct') {
                        $prod->deleteProduct($parts[1]);
                    }elseif ($page == 'deleteUser') {
                        $user->deleteUser($parts[1]);

                    }else{
                        $prod->$page();
                    }
                    // $home->index($page,$prod);
                }else{
                    if(method_exists($user, $page)){
                        if ($page == 'deleteUser') {
                            $user->deleteUser($parts[1]);
                        }else{
                            $home->index($page,$user);
                        }
                    }
                    elseif(method_exists($cat, $page)){
                        $home->index($page,$cat);
                    }
                }
            }else{
                // include('./views/includes/404.php');
                echo "not found";
            }
        }
        // else{
        //     // $home->index();
        //     $res->readReservation();
        // }
        
    // }else
    //     if( isset($_GET['page']) && $_GET['page'] === 'register'){ 
    //         $home->index('register');
    //     }
    // else{
    //     $home->index('login');
    // }

?>
