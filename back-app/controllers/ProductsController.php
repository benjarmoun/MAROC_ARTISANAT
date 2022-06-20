<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST, DELETE, PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  require __DIR__.'/../PHPMailer/PHPMailer.php';
  require __DIR__.'/../PHPMailer/SMTP.php';
  require __DIR__.'/../PHPMailer/Exception.php';
  use PHPMailer\PHPMailer\PHPMailer;

class ProductsController{

    public function sendEmail() {

        $data = json_decode(file_get_contents("php://input"));
        print_r(
            $data
        );

        $mail = new PHPMailer(true); 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
        
        $body="MAROC ARTISAN
            Hello $data->fname $data->lname ,
            Your purxhase has been completed. Your reservation is confirmed with the following info :
            Personal ID : $data->user_id
            Name: $data->fname $data->lname .
            Email: $data->email.";
            
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth= "true";
            $mail->SMTPSecure = "tls";
            $mail->port="587";
            $mail->Username = "samirnouami@gmail.com";
            $mail->Password = "dmrhetulyvluwltw";
            // $mail->Subject = "test test allah allah";
            $mail->setFrom("samirnouami@gmail.com");
            $mail->Body = "$body";
            $mail->addAddress("benjarmoun123@gmail.com");//sent To
            $mail->Send() ;
            $mail->smtpClose();
        }
    }

    public function getProducts(){

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // product read query
        $result = $product->read();

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }

    public function getProductsAdmn(){

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // product read query
        $result = $product->getProductsAdmin();

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }

    public function getOrdersSum(){

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $order = new Products($db);

        // product read query
        $result = $order->getOredrSum();

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(
                array('message' => 'No orders Found')
            );
        }
    }

    // //get single product
    // public function getProductID(){

    //     // Instantiate DB & connect
    //     $database = new Database();
    //     $db = $database->connect();

    //     // Instantiate product object
    //     $product = new Products($db);

    //     // Get raw posted data
    //     $data = json_decode(file_get_contents("php://input"));

    //     if($data){
    //         $product->id = $data->id;
    //     }

    //     // product read query
    //     $result = $product->getProductByID();

    //     if ($result) {
    //         echo json_encode($result);
    //     } else {
    //         echo json_encode(
    //             array('message' => 'No product Found')
    //         );
    //     }
    // }

    //get single product with params
    public function getProductID($id){

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get raw posted data
        // $data = json_decode(file_get_contents("php://input"));

        // if($data){
            $product->id = $id;
        // }

        // product read query
        $result = $product->getProductByID();

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(
                array('message' => 'No product Found')
            );
        }
    }



    // add product
    public function addProduct(){
        // Instantiate DB & connect
        if($_SERVER['REQUEST_METHOD'] != 'POST') return;
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        if($data) {
            $product->seller_id = $data->seller_id;
            $product->category_id = $data->category_id;
            $product->name = $data->name;
            $product->price = $data->price;
            $product->description = $data->description;
            $product->picture = $data->picture;
        }

        // Create product
        if($product->createProduct()) {
            echo json_encode(
            array('message' => 'Product Created')
            );
        } else {
            echo json_encode(
            array('message' => 'Product Not Created')
            );
        }
    }

    // update product
    public function updateProduct($id){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        $product->id = $id;

        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        if($data) {
            // $product->id = $data->id;
            $product->seller_id = $data->seller_id;
            $product->category_id = $data->category_id;
            $product->name = $data->name;
            $product->price = $data->price;
            $product->description = $data->description;
            $product->picture = $data->picture;
        }

        // Update product
        if($product->updateProduct()) {
            echo json_encode(
            array('message' => 'Product Updated')
            );
        } else {
            echo json_encode(
            array('message' => 'Product Not Updated')
            );
        }
    }

    // delete product
    public function deleteProduct($id){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        $product->id = $id;

        // Delete product
        if($product->deleteProduct()) {
            echo json_encode(
            array('message' => 'Product Deleted')
            );
        } else {
            echo json_encode(
            array('message' => 'Product Not Deleted')
            );
        }
    }

    // get product by category
    public function getProductByCategory($id){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get id
        {
            $product->category_id = $id;
        }

        // Get product by category
        $result = $product->getProductByCategory();

        if ($result) {
            // Turn to JSON & output
            echo json_encode($result);
        } else {
            // No products
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }

    // get product by seller
    public function getProductBySeller($id){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get id
        $product->seller_id = $id;

        // Get product by seller
        $result = $product->read_seller();

        if ($result) {
            // Turn to JSON & output
            echo json_encode($result);
        } else {
            // No products
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }

    public function getProductByCategoryName($C_Name){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get id
        // {
        //     $product->category_id = $id;
        // }

        // Get product by category
        $result = $product->getProductByCategoryName($C_Name);

        if ($result) {
            // Turn to JSON & output
            echo json_encode($result);
        } else {
            // No products
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }
}