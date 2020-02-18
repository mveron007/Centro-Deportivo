<?php
    class MultimediaFile {
        private $id_file;
        private $suported_images_formats = ["files/png", "files/jpg", "files/jpeg", "files/gif"];
        private $suported_video_formats = ["files/mp4", "files/mpeg"];
        private $name;
        private $description;

        public function __construct(string $fileTitle, string $fileDescription)
        {
            $this->name = $fileTitle;
            $this->description = $fileDescription;
        }

        public function getId_file(){
            return $this->id_file;
        }

        public function setId_file($id_file){
            $this->id_file = $id_file;
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
                    move_uploaded_file($file['tmp_name'],'uploads/'.$file['name']);
                    echo "El archivo fue subido";
                }else {
                    echo "Formato invalido";
                }
            }
        }

        public function uploadVideoFile($file){
            if (is_array($file)) {
                if (in_array($file['type'], $this->suported_video_formats)) {
                    # code...
                    move_uploaded_file($file['tmp_name'],'uploads/'.$file['name']);
                    echo "El archivo fue subido";
                }else {
                    echo "Formato invalido";
                }
            }
        }


    }
?>