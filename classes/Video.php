<?php
    class Video {
        private $id_video;
        private $suported_video_formats = ["files/mp4", "files/mpeg"];
        private $name;
        private $description;

        public function __construct(string $fileTitle, string $fileDescription)
        {
            $this->name = $fileTitle;
            $this->description = $fileDescription;
        }

        public function getId_video(){
            return $this->id_video;
        }

        public function setId_video($id_video){
            $this->id_video = $id_video;
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


        public function uploadVideoFile($file){
            if (is_array($file)) {
                if (in_array($file['type'], $this->suported_video_formats)) {
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