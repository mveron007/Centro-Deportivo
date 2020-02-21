<?php

    abstract class DB {

        public static function saveUsuario(Usuario $usuario){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO usuarios (u_name, last_name, u_password, email)
                VALUES(:u_name, :last_name, :u_password, :email)");

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
                $stmt = $connection->prepare("INSERT INTO video (video_path, v_name, v_description)
                VALUES(:video_path, :v_name, :v_description)");

                $stmt->bindValue(':video_path', $video_file->getVideo_path());
                $stmt->bindValue(':v_name', $video_file->getName());
                $stmt->bindValue(':v_description', $video_file->getDescription());

                $stmt->execute();

                return true;
            } catch (PDOException $exception) {
                return false;
            }
        }

        public static function saveImage(Imagen $image_file){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO imagen (image_path, m_name, m_description)
                VALUES(:image_path, :m_name, :m_description)");

                $stmt->bindValue(':image_path', $image_file->getImage_path());
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
    
            // $usuariosObject = [];
    
            // foreach ($usuarios as $usuario) {
            //     $final_usuarios = new Usuario($usuario['u_name'], $usuario['last_name'], $usuario['u_password'], $usuario['email']);
            // }

            // $final_usuarios->setId($usuarios['id']);

            // $usuariosObject[] = $final_usuarios;
            
            // return $usuariosObject;
            return $usuarios;
        }

        public function getUserByEmail($email){

			$allUsers = $this->getAllUsuarios();

			// Recorro el array de usuarios
			foreach ($allUsers as $oneUser) {
				// Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
				if ($oneUser['email'] == $email) {
					
					$theUser = new Usuario($oneUser['u_name'], $oneUser['last_name'], $oneUser['u_password'], $oneUser['email']);
                    $theUser->setId($oneUser['id']);
                    
					return $theUser;
				}
			}
		}

        public static function getAllVideos(){
            global $connection;
    
            $stmt = $connection->prepare("SELECT * FROM video AS v");
    
            $stmt->execute();
    
            $video_files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // $video_filesObject = [];
    
            // foreach ($video_files as $files) {
            //     $final_files = new Video($files['video_path'], $files['v_name'], $files['v_description']);
            // }


            // $video_filesObject[] = $final_files;
            
            // return $video_filesObject;
            return $video_files;
        }

        public static function getAllImages(){
            global $connection;
    
            $stmt = $connection->prepare("SELECT * FROM imagen AS i");
    
            $stmt->execute();
    
            $image_files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // $image_filesObject = [];
    
            // foreach ($image_files as $files) {
            //     $final_files = new Imagen($files['image_path'], $files['m_name'], $files['m_description']);
            // }


            // $image_filesObject[] = $final_files;
            
            // return $image_filesObject;
            return $image_files;
        }
    }

?>
