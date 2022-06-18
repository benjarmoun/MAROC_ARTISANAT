<?php
  class User
  {
      // DB stuff
      private $conn;
      private $table = 'user';

      // user Properties
      public $user_id;
      public $fname;
      public $lname;
      public $password;
      public $email;
      public $seller;
      public $username;

      // Constructor with DB
      public function __construct($db)
      {
          $this->conn = $db;
      }

        // Get all users
        public function read()
        {
            // Create query
            $query = 'SELECT user_id, fname, lname, password, email, seller
                                 FROM ' . $this->table . '';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Get user by user_id
        public function read_single($user_id)
        {
            // Create query
            $query = 'SELECT user_id, fname, lname, password, email, seller
                                 FROM ' . $this->table . ' WHERE user_id = :user_id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(':user_id', $user_id);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Get sellers with products number
        public function getSeller()
        {
            // Create query
            $query = 'SELECT u.*,COUNT(p.id) Somme FROM user u 
                                left JOIN product p on u.user_id=p.seller_id GROUP BY u.user_id';
                                

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();
            
            return $stmt;
        }

        
        //remove user
        public function remove()
        {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE user_id = :user_id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));

            // Bind data
            $stmt->bindParam(':user_id', $this->user_id);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        // create user
        public function create()
        {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET fname = :fname, lname = :lname, password = :password, email = :email, seller = :seller';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->lname = htmlspecialchars(strip_tags($this->lname));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->seller = htmlspecialchars(strip_tags($this->seller));

            // Bind data
            $stmt->bindParam(':fname', $this->fname);
            $stmt->bindParam(':lname', $this->lname);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':seller', $this->seller);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        //login user
        // public function loginUser()
        // {
        //     // Create query
        //     $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';

        //     // Prepare statement
        //     $stmt = $this->conn->prepare($query);

        //     // Clean data
        //     $this->email = htmlspecialchars(strip_tags($this->email));

        //     // Bind data
        //     $stmt->bindParam(':email', $this->email);

        //     // Execute query
        //     $stmt->execute();
            
        //     $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //     // set properties
        //     $this->user_id = $row['user_id'];
        //     $this->fname = $row['fname'];
        //     $this->lname = $row['lname'];
        //     // $this->password = $row['password'];
        //     $this->email = $row['email'];
        //     $this->seller = $row['seller'];

            
        //     // echo $this->password;
            
        //     if(password_verify($this->password, $row['password'])){
        //         // return user array
        //         return $row;

        //         // return true;
        //     }
        //     else{
        //         return false;
        //     }
            
            
        //     // return user
        //     // return $stmt;
        // }

        public function loginuser()
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';
            $stm=$this->conn->prepare($query);
            $stm->bindParam(':email', $this->email);
            if($stm->execute())
            {
                return $stm->fetch(PDO::FETCH_OBJ);
            }
            return false;
        }

        public function loginAdmin()
        {
            $query = 'SELECT * FROM admin WHERE username = :username';
            $stm=$this->conn->prepare($query);
            $stm->bindParam(':username', $this->username);
            if($stm->execute())
            {
                return $stm->fetch(PDO::FETCH_OBJ);
            }
            return false;
        }
      
}