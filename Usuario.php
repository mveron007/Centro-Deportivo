<?php

    class Usuario {
        private $id;
        private $name;
        private $lastName;
        private $phone;
        private $email;

        public function __construct(string $userName, string $userLastName, string $userPhone, string $userEmail)
        {
            $this->name= $userName;
            $this->lastName= $userLastName;
            $this->phone= $userPhone;
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

        public function getPhone(){
            return $this->phone;
        }

        public function setPhone($userPhone){
            $this->phone= $userPhone;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($userEmail){
            $this->email= $userEmail;
        }
    }

?>