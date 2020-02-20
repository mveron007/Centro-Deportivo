<?php
    class MultimediaFile {
        private $id_file;
        private $title;
        private $name;
        private $comments;

        public function __construct(string $fileTitle, string $fileName, string $fileComments)
        {
            $this->title = $fileTitle;
            $this->name = $fileName;
            $this->comments = $fileComments;
        }

        public function getId_file(){
            return $this->id_file;
        }

        public function setId_file($id_file){
            $this->id_file = $id_file;
        }

        


    }
?>