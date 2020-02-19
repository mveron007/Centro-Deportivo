<?php
    class Imagen {
        private $id_image;
        private $suported_images_formats = ["files/png", "files/jpg", "files/jpeg", "files/gif"];
        private $name;
        private $description;

        public function __construct(string $fileTitle, string $fileDescription)
        {
            $this->name = $fileTitle;
            $this->description = $fileDescription;
        }

        public function getId_image(){
            return $this->id_image;
        }

        public function setId_image($id_image){
            $this->id_image = $id_image;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function uploadImageFile($file){
            if (is_array($file)) {
                if (in_array($file['type'], $this->suported_images_formats)) {
                    # code...
                    move_uploaded_file($file['tmp_name'],'files/'.$file['name']);
                    echo "El archivo fue subido";
                }else {
                    echo "Formato invalido";
                }
            }
        }
    }

?>