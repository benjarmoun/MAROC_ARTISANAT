<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST, DELETE, PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class ProductsController{

    public function getProducts(){

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // product read query
        $result = $product->read();

        // Get row count
        // $num = $result->rowCount();

        // Check if any categorys
        /* if($num > 0) {
            // Cat array
            $prod_arr = array();
            $prod_arr['data'] = array();

            // while($row = $result->fetch(PDO::FETCH_DEFAULT)) {
            //     extract($row);

            //     $prod_item = array(
            //     'id' => $id,
            //     'seller_id' => $seller_id,
            //     'category_id' => $category_id,
            //     'name' => $name,
            //     'price' => $price,
            //     'description' => $description,
            //     'picture' => $picture,
            //     );

            //     // Push to "data"
            //     array_push($prod_arr['data'], $prod_item);
            // }
            die(print_r($prod_arr));
        
            // Turn to JSON & output
            // echo json_encode($data);

        } else {
            // No products
            echo json_encode(
                array('message' => 'No products Found')
            );
        } */

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }

    // add product
    public function addProduct(){
        // Instantiate DB & connect
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
    public function updateProduct(){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        if($data) {
            $product->id = $data->id;
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
    public function deleteProduct(){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        if($data) {
            $product->id = $data->id;
        }

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
    public function getProductByCategory(){
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate product object
        $product = new Products($db);

        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));

        if($data) {
            $product->category_id = $data->category_id;
        }

        // Get product by category
        $result = $product->getProductByCategory();

        // Get row count
        $num = $result->rowCount();

        // Check if any products
        if($num > 0) {
            // Cat array
            $prod_arr = array();
            $prod_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $prod_item = array(
                'id' => $id,
                'seller_id' => $seller_id,
                'category_id' => $category_id,
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'picture' => $picture,
                );

                // Push to "data"
                array_push($prod_arr['data'], $prod_item);
            }
            die(print_r($prod_arr));

            // Turn to JSON & output
            echo json_encode($prod_arr);

        } else {
            // No products
            echo json_encode(
                array('message' => 'No products Found')
            );
        }
    }
}