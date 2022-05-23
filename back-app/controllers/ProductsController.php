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
        $num = $result->rowCount();

        // Check if any categories
        if($num > 0) {
            // Cat array
            $prod_arr = array();
            $prod_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $prod_item = array(
                'id' => $id,
                'seller_id' => $seller_id,
                'categorie_id' => $categorie_id,
                'name' => $name,
                'price' => $price,
                'description' => $descripption,
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