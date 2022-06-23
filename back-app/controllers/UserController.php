<?php



class UserController
{
    //get all users
    public function getUsers()
    {
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // Get users
        $result = $user->read();

        // Get row count
        $num = $result->rowCount();

        // Check if any users
        if ($num > 0) {
            // Cat array
            $user_arr = array();
            $user_arr['data'] = array();

            // Loop through results
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Extract row
                extract($row);

                $user_item = array(
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'password' => $password,
                    'seller' => $seller
                );

                // Push to "data"
                array_push($user_arr['data'], $user_item);
            }

            // Turn to JSON & output
            echo json_encode($user_arr);
        } else {
            // No users
            echo json_encode(
                array('message' => 'No users Found')
            );
        }
    }

    //get all sellers and products number
    public function getSellers()
    {
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // Get users
        $result = $user->getSeller();

        // Get row count
        $num = $result->rowCount();

        // Check if any users
        if ($num > 0) {
            // Cat array
            $user_arr = array();
            $user_arr['data'] = array();

            // Loop through results
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Extract row
                extract($row);

                $user_item = array(
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'somme' => $Somme,
                    // 'seller' => $seller
                );

                // Push to "data"
                array_push($user_arr['data'], $user_item);
            }

            // Turn to JSON & output
            echo json_encode($user_arr);
        } else {
            // No users
            echo json_encode(
                array('message' => 'No users Found')
            );
        }
    }

    //register user
    public function registerUser()
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST') return;

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // Get data
        $data = json_decode(file_get_contents('php://input'));

        // Set data
        if ($data) {
            $user->fname = $data->fname;
            $user->lname = $data->lname;
            $user->email = $data->email;
            $user->password = password_hash($data->password, PASSWORD_DEFAULT);
            $user->seller = $data->seller;
        }
        // Create user
        if ($user->create()) {
            // User created
            echo json_encode(
                array('message' => 'User Created')
            );
        } else {
            // User not created
            echo json_encode(
                array('message' => 'User Not Created')
            );
        }
    }

    //delete user by user_id
    public function deleteUser($id)
    {
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // send id to delete
            $user->user_id = $id;

        // Delete user
        if ($user->remove()) {
            // User deleted
            echo json_encode(
                array('message' => 'User Deleted')
            );
        } else {
            // User not deleted
            echo json_encode(
                array('message' => 'User Not Deleted')
            );
        }
    }

    //get single user by user_id
    public function getSingleUser()
    {
        // Get data
        $data = json_decode(file_get_contents('php://input'));

        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // Set data
        if ($data) {
            $user->user_id = $data->user_id;
        }
        // echo $data;

        // Get user
        $result = $user->read_single($user->user_id);

        // Get row count
        $num = $result->rowCount();

        // Check if any users

        if ($num > 0) {
            // Cat array
            $user_arr = array();
            $user_arr['data'] = array();

            // Loop through results
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Extract row
                extract($row);

                $user_item = array(
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'password' => $password,
                    'seller' => $seller
                );

                // Push to "data"
                array_push($user_arr['data'], $user_item);
            }

            // Turn to JSON & output
            echo json_encode($user_arr);
        } else {
            // No users
            echo json_encode(
                array('message' => 'No users Found')
            );
        }
    }

    //login user
    // public function login()
    // {
    //     // Instantiate DB & connect
    //     $database = new Database();
    //     $db = $database->connect();

    //     // Instantiate user object
    //     $user = new User($db);

    //     // Get data
    //     $data = json_decode(file_get_contents('php://input'));

    //     // Set data
    //     if ($data) {
    //         $user->email = $data->email;
    //         $user->password = $data->password;
    //     }
    //     // echo $data;

    //     // Login user
    //     if ($user->loginUser()) {
    //         // User logged in
    //         echo json_encode(
    //             array($user)
    //             //   array('message' => 'User Logged In')
    //         );
    //     } else {
    //         // User not logged in
    //         echo json_encode(
    //             array('message' => 'User Not Logged In')
    //         );
    //     }
    // }


    public function login()
    {
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // Get data
        $data = json_decode(file_get_contents('php://input'));

        $user->email=$data->email;
        $res=$user->loginuser();
        if ($res->email === $data->email && password_verify($data->password, $res->password)) {
            echo json_encode(
                array('data' => $user->loginuser())
            );
        }else{
            echo json_encode(
                array('message' => 'User Not Logged In')
            );
        }
    }

    public function loginAdmin()
    {
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate user object
        $user = new User($db);

        // Get data
        $data = json_decode(file_get_contents('php://input'));
        // print_r($data);

        $user->username=$data->user;
        // print_r($user->username);

        $res=$user->loginAdmin();
        if($res){
            if ($res->username === $data->user && password_verify($data->password, $res->password)) {
                echo json_encode(
                    array(
                        'message' => 'success',
                        'data' => $user->loginAdmin())
                );
            }else{
                echo json_encode(
                    array('message' => 'Wrong password')
                );
            }
        }else{
            echo json_encode(
                array('message' => 'Username not found')
            );
        }
    }
}
