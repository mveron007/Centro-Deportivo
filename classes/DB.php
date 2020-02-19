<?php

    abstract class DB {

        public static function saveUsuario(Usuario $usuario){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO usuarios (u_name, last_name, u_password, email)
                VALUES(:u_name, :last_name, :phone, :email)");

                $stmt->bindValue(':u_name', $usuario->getName());
                $stmt->bindValue(':last_name', $usuario->getLastName());
                $stmt->bindValue(':u_password', $usuario->getPassword());
                $stmt->bindValue(':email', $usuario->getEmail());

                $stmt->execute();

                return true;
            } catch (PDOException $exception) {
                return false;
            }
        }

        public static function saveVideo(Video $video_file){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO video (m_name, m_description)
                VALUES(:m_name, :m_description)");

                $stmt->bindValue(':m_name', $video_file->getName());
                $stmt->bindValue(':m_description', $video_file->getDescription());

                $stmt->execute();

                return true;
            } catch (PDOException $exception) {
                return false;
            }
        }

        public static function saveImage(Imagen $image_file){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO image_file (m_name, m_description)
                VALUES(:m_name, :m_description)");

                $stmt->bindValue(':m_name', $image_file->getName());
                $stmt->bindValue(':m_description', $image_file->getDescription());

                $stmt->execute();

                return true;
            } catch (PDOException $exception) {
                return false;
            }
        }

        public static function getAllUsuarios(){
            global $connection;
    
            $stmt = $connection->prepare("SELECT * FROM usuarios AS u");
    
            $stmt->execute();
    
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $usuariosObject = [];
    
            foreach ($usuarios as $usuario) {
                $final_usuarios = new Usuario($usuario['u_name'], $usuario['last_name'], $usuario['phone'], $usuario['email']);
            }

            $final_usuarios->setId($usuarios['user_id']);

            $usuariosObject[] = $final_usuarios;
            
            return $usuariosObject;
        }

        public static function getAllVideos(){
            global $connection;
    
            $stmt = $connection->prepare("SELECT * FROM video AS v");
    
            $stmt->execute();
    
            $video_files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $video_filesObject = [];
    
            foreach ($video_files as $files) {
                $final_files = new Imagen($files['name'], $files['description']);
            }


            $video_filesObject[] = $final_files;
            
            return $video_filesObject;
        }

        public static function getAllImages(){
            global $connection;
    
            $stmt = $connection->prepare("SELECT * FROM image_file AS i");
    
            $stmt->execute();
    
            $image_files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $image_filesObject = [];
    
            foreach ($image_files as $files) {
                $final_files = new Imagen($files['name'], $files['description']);
            }


            $image_filesObject[] = $final_files;
            
            return $image_filesObject;
        }
    }

?>
