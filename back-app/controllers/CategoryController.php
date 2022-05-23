<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST, DELETE, PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class CategoryController{
    
        public function getCategories(){
    
            // Instantiate DB & connect
            $database = new Database();
            $db = $database->connect();
    
            // Instantiate category object
            $category = new Category($db);
    
            // category read query
            $result = $category->read();
    
            // Get row count
            $num = $result->rowCount();
    
            // Check if any categories
            if($num > 0) {
                // Cat array
                $cat_arr = array();
                $cat_arr['data'] = array();
    
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
    
                    $cat_item = array(
                    'id' => $id,
                    'name' => $name,
                    );
    
                    // Push to "data"
                    array_push($cat_arr['data'], $cat_item);
                }
                die(print_r($cat_arr));
    
                // Turn to JSON & output
                echo json_encode($cat_arr);
    
            } else {
                // No categories
                echo json_encode(
                    array('message' => 'No categories Found')
                );
            }
        }
    
        // add category
        public function addCategory(){
    
            // Instantiate DB & connect
            $database = new Database();
            $db = $database->connect();
    
            // Instantiate category object
            $category = new Category($db);
    
            // Get raw posted data
            $data = json_decode(file_get_contents("php://input"));
    
            $category->name = $data->name;
    
            // Create category
            if($category->add()) {
                echo json_encode(
                array('message' => 'Category Created')
                );
            } else {
                echo json_encode(
                array('message' => 'Category Not Created')
                );
            }
        }
    
        // delete category
        public function deleteCategory(){
    
            // Instantiate DB & connect
            $database = new Database();
            $db = $database->connect();
    
            // Instantiate category object
            $category = new Category($db);
    
            // Get raw posted data
            $data = json_decode(file_get_contents("php://input"));
    
            $category->id = $data->id;
    
            // Delete category
            if($category->delete()) {
                echo json_encode(
                array('message' => 'Category Deleted')
                );
            } else {
                echo json_encode(
                array('message' => 'Category Not Deleted')
                );
            }
        }
}