<?php

    class Usuario {
        private $id;
        private $name;
        private $lastName;
        private $password;
        private $email;

        public function __construct(string $userName, string $userLastName, string $userPassword, string $userEmail)
        {
            $this->name= $userName;
            $this->lastName= $userLastName;
            $this->password= $userPassword;
            $this->email= $userEmail;
            
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($userName){
            $this->name= $userName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setLastName($userLastName){
            $this->lastName= $userLastName;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($userPassword) {
			$this->password = password_hash($userPassword, PASSWORD_DEFAULT);
		}

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($userEmail){
            $this->email= $userEmail;
        }
    }

?>