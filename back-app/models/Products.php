<?php
  class Products
  {
      // DB Stuff
      private $conn;
      private $table = 'product';

      // Properties
      public $id;
      public $seller_id;
      public $categorie_id;
      public $name;
      public $price;
      public $description;
      public $picture;

      // Constructor with DB
      public function __construct($db)
      {
          $this->conn = $db;
      }


      // Get products
      public function read()
      {
          // Create query
            $query = 'SELECT
                id,
                seller_id,
                categorie_id,
                name,
                price,
                description,
                picture
            FROM
                ' . $this->table . '
            ORDER BY
                price';


          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Execute query
          $stmt->execute();

          return $stmt;
      }




}