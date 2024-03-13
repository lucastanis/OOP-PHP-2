<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans

    class User{

        // Eigenschappen 
        public $username;
        public $email;
        private $password;
        
        function SetPassword($password){
            $this->password = $password;
        }
        function GetPassword(){
            return $this->password;
        }

        public function ShowUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
        }

        public function RegisterUser(){
            $status = false;
            $errors=[];
            if($this->username != "" || $this->password != ""){

                // Check user exist
                if(true){<?php

                    class User
                    {
                        public $username;
                        public $email;
                        private $password;
                    
                        // Database connection properties
                        private static $dbHost = 'localhost';
                        private static $dbUser = 'root';
                        private static $dbPassword = '';
                        private static $dbName = 'loginopdrachten';
                        private static $dbCharset = 'utf8mb4';
                        private static $conn; // PDO connection object
                    
                        public function __construct()
                        {
                            $this->initializeDatabase();
                        }
                    
                        private function initializeDatabase()
                        {
                            if (!isset(self::$conn)) {
                                $dsn = "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName . ";charset=" . self::$dbCharset;
                    
                                try {
                                    self::$conn = new PDO($dsn, self::$dbUser, self::$dbPassword);
                                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                } catch (PDOException $e) {
                                    die("Connection failed: " . $e->getMessage());
                                }
                            }
                        }
                    
                        function SetPassword($password)
                        {
                            $this->password = $password;
                        }
                    
                        public function ShowUser()
                        {
                            echo "<br>Username: $this->username<br>";
                            echo "Email: $this->email<br>";
                        }
                    
                        public function RegisterUser()
                        {
                            $errors = $this->ValidateUser();
                            if (!empty($errors)) {
                                return $errors;
                            }
                    
                            $sanitizedUsername = $this->conn->quote($this->username);
                            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
                            $sanitizedEmail = $this->conn->quote($this->email);
                    
                            // Check if the user already exists
                            $checkUserQuery = "SELECT * FROM `users` WHERE `username` = $sanitizedUsername";
                            $result = self::$conn->query($checkUserQuery);
                    
                            if ($result && $result->rowCount() > 0) {
                                array_push($errors, "Username bestaat al.");
                            } else {
                                // If the user doesn't exist, insert into the database
                                $insertQuery = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ($sanitizedUsername, '$hashedPassword', $sanitizedEmail)";
                    
                                try {
                                    self::$conn->exec($insertQuery);
                                } catch (PDOException $e) {
                                    array_push($errors, "Error registering user: " . $e->getMessage());
                                }
                            }
                    
                            return $errors;
                        }
                    
                        function ValidateUser()
                        {
                            $errors = [];
                    
                            if (empty($this->username)) {
                                array_push($errors, "Invalid username");
                            } elseif (empty($this->password)) {
                                array_push($errors, "Invalid password");
                            } elseif (strlen($this->username) < 3 || strlen($this->username) > 50) {
                                array_push($errors, "Username must be between 3 and 50 characters");
                            }
                    
                            return $errors;
                        }
                    
                        public function LoginUser()
                        {
                            $sanitizedUsername = self::$conn->quote($this->username);
                    
                            // Search for the user in the database
                            $selectQuery = "SELECT * FROM `users` WHERE `username` = $sanitizedUsername";
                            $result = self::$conn->query($selectQuery);
                    
                            if ($result && $result->rowCount() > 0) {
                                $userData = $result->fetch(PDO::FETCH_ASSOC);
                    
                                if (password_verify($this->password, $userData['password'])) {
                                    // Start session
                                    session_start();
                                    $_SESSION['username'] = $this->username;
                                    header('location: index.php');
                                    exit();
                                } else {
                                    echo "Incorrect password";
                                }
                            } else {
                                echo "User not found";
                            }
                    
                            return false;
                        }
                    
                        public function IsLoggedin()
                        {
                            return isset($_SESSION['username']);
                        }
                    
                        public function GetUser($username)
                        {
                            $sanitizedUsername = self::$conn->quote($username);
                    
                            // Search for the user in the database
                            $selectQuery = "SELECT * FROM `users` WHERE `username` = $sanitizedUsername";
                            $result = self::$conn->query($selectQuery);
                    
                            if ($result && $result->rowCount() > 0) {
                                $userData = $result->fetch(PDO::FETCH_ASSOC);
                                $this->username = $userData['username'];
                                $this->email = $userData['email'];
                                return $this;
                            } else {
                                return NULL;
                            }
                        }
                    
                        public function Logout()
                        {
                            session_start();
                            session_unset();
                            session_destroy();
                            header('location: index.php');
                            exit();
                        }
                    }
                    
                    // Initialize the session
                    session_start();
                    ?>
                    array_push($errors, "Username bestaat al.");
                } else {
                    // username opslaan in tabel login
                    // INSERT INTO `user` (`username`, `password`, `role`) VALUES ('kjhasdasdkjhsak', 'asdasdasdasdas', '');
                    // Manier 1
                    
                    $status = true;
                }
                            
                
            }
            return $errors;
        }

        function ValidateUser(){
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            }

            // Test username > 3 tekens en < 50 tekens
            
            return $errors;
        }

        public function LoginUser(){

            // Connect database

            // Zoek user in de table user
           echo "Username:" . $this->username;


            // Indien gevonden dan sessie vullen


            return true;
        }

        // Check if the user is already logged in
        public function IsLoggedin() {
            // Check if user session has been set
            
            return false;
        }

        public function GetUser($username){
            
		    // Doe SELECT * from user WHERE username = $username
            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
            } else {
                return NULL;
            }   
        }

        public function Logout(){
            session_start();
            // remove all session variables
           

            // destroy the session
            
            header('location: index.php');
        }


    }

    

?>