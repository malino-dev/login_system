<?php
    class DBHandler
    {
        private $servername = "127.0.0.1";
        private $dbuser = "root";
        private $dbpassword = "";
        private $dbname = "marino";
    
        private $connection;

        private function OpenConnection()
        {
            $this->connection = new mysqli($this->servername, $this->dbuser, $this->dbpassword, $this->dbname);

            if($this->connection->connect_errno)
            {
                return false;
            }

            return true;
        }
    
        private function CloseConnection()
        {
            $this->connection->close();
        }
    
    
        public function InsertNewUser($username, $email, $vorname, $nachname, $password)
        {
            if(!$this->OpenConnection()) return false;
    
            $sql = file_get_contents(BASE_DIR. "/sql/InsertNewUser.sql");

            $statement = $this->connection->prepare($sql);
            $statement->bind_param("sssss", $username, $email, $vorname, $nachname, md5($password));
            $statement->execute();
    
            $this->CloseConnection();
            return true;
        }

        public function Login($username, $password, &$id)
        {
            if(!$this->OpenConnection()) return false;

            $sql = file_get_contents(BASE_DIR. "/sql/LoginUser.sql");

            $hashedPassword = md5($password);

            $statement = $this->connection->prepare($sql);
            $statement->bind_param("ss", $username, $hashedPassword);
            $statement->execute();
            $statement->store_result();

            $result = "UnknownError";

            $numRows = $statement->num_rows();
            //echo $numRows;

            if($numRows > 0)
            {
                $result = "OK";
                $statement->bind_result($id);
                $statement->fetch();
            }
            else
            {
                $result = "UserNotFound";
            }

            $this->CloseConnection();

            return $result;
        }

        public function GetAllUsers()
        {
            if(!$this->OpenConnection()) return false;
            
            $sql = file_get_contents(BASE_DIR. "/sql/GetAllUsers.sql");

            $queryResult = $this->connection->query($sql);

            $result = $queryResult->fetch_all(MYSQLI_ASSOC);

            $this->CloseConnection();

            return $result;
        }

        public function GetProfileInfo($id)
        {
            $profileInfo = array(
                'firstname' => "",
                'surname' => ""
            );

            $this->OpenConnection();

            $sql = file_get_contents(BASE_DIR. "/sql/GetProfileInfo.sql");
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->store_result();

            $stmt->bind_result($profileInfo['firstname'], $profileInfo['surname']);
            $stmt->fetch();

            //print_r($profileInfo);

            $this->CloseConnection();

            return $profileInfo;
        }

        public function EditProfile($id, $firstname, $surname)
        {
            $this->OpenConnection();

            $sql = file_get_contents(BASE_DIR. "/sql/EditProfile.sql");
            
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("ssi", $firstname, $surname, $id);
            $stmt->execute();

            $this->CloseConnection();
            return true;
        }
    }