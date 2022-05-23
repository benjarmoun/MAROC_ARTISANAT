<?php
class Products
{
    // DB Stuff
    private $conn;
    private $table = 'product';

    // Properties
    public $id;
    public $seller_id;
    public $category_id;
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
            category_id,
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

    // Get products of one seller
    public function read_seller($seller_id)
    {
        // Create query
        $query = 'SELECT
            id,
            seller_id,
            category_id,
            name,
            price,
            description,
            picture
        FROM
            ' . $this->table . ' where seller_id = :seller_id
        ORDER BY
            price';
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':seller_id', $seller_id);

        // Execute query
        $stmt->execute();

        return $stmt;
    }


    
    //create product
    public function createProduct() {
        // Create Query
        $query = 'INSERT INTO ' .
        $this->table . '
        SET
        seller_id = :seller_id,
        category_id = :category_id,
        name = :name,
        price = :price,
        description = :description,
        picture = :picture';
        
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        
        // Clean data
        $this->seller_id = htmlspecialchars(strip_tags($this->seller_id));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->picture = htmlspecialchars(strip_tags($this->picture));

        
        // Bind data
        $stmt-> bindParam(':seller_id', $this->seller_id);
        $stmt-> bindParam(':category_id', $this->category_id);
        $stmt-> bindParam(':name', $this->name);
        $stmt-> bindParam(':price', $this->price);
        $stmt-> bindParam(':description', $this->description);
        $stmt-> bindParam(':picture', $this->picture);
        
        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);
        
        return false;
    }
    
    //update product
    public function updateProduct() {
        // Create Query
        $query = 'UPDATE ' .
        $this->table . '
        SET
        seller_id = :seller_id,
        category_id = :category_id,
        name = :name,
        price = :price,
        description = :description,
        picture = :picture
        WHERE
        id = :id';
        
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        
        // Clean data
        $this->seller_id = htmlspecialchars(strip_tags($this->seller_id));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->picture = htmlspecialchars(strip_tags($this->picture));
        $this->id = htmlspecialchars(strip_tags($this->id));

        
        // Bind data
        $stmt-> bindParam(':seller_id', $this->seller_id);
        $stmt-> bindParam(':category_id', $this->category_id);
        $stmt-> bindParam(':name', $this->name);
        $stmt-> bindParam(':price', $this->price);
        $stmt-> bindParam(':description', $this->description);
        $stmt-> bindParam(':picture', $this->picture);
        $stmt-> bindParam(':id', $this->id);
        
        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);
        
        return false;
    }

    //delete product
    public function deleteProduct() {
        // Create Query
        $query = 'DELETE FROM ' .
        $this->table . '
        WHERE
        id = :id';
        
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        
        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        
        // Bind data
        $stmt-> bindParam(':id', $this->id);
        
        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);
        
        return false;
    }

    // getProductBycategory
    public function getProductByCategory() {
        // Create Query
        $query = 'SELECT
            id,
            seller_id,
            category_id,
            name,
            price,
            description,
            picture
        FROM
            ' . $this->table . ' where category_id = :category_id
        ORDER BY
            price';
        
        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':category_id', $this->category_id);

        // Execute query
        $stmt->execute();

        return $stmt;
    }


    


    

}