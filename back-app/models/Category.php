<?php
class Category
{
    // DB Stuff
    private $conn;
    private $table = 'category';

    // Properties
    public $category_id;
    public $name;
    

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read categories
    public function read()
    {
        // Create query
        $query = 'SELECT
            category_id,
            name
        FROM
            ' . $this->table . '
        ORDER BY
            name';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    //add category
    public function add()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));

        // Bind data
        $stmt->bindParam(':name', $this->name);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    //delete category
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE category_id = :category_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // Bind data
        $stmt->bindParam(':category_id', $this->category_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
