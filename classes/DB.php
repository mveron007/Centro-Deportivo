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

        public static function updateUsuario($userID, $userName, $userLastname, $userPass, $userEmail)
        {
            global $connection;

            $stmt = $connection->prepare("UPDATE usuarios SET u_name = '$userName', last_name = '$userLastname', u_password = '$userPass', email = '$userEmail' WHERE id = '$userID'");

            $stmt->execute();
        }

        public static function checkLogin($email, $pass) {
            global $connection;

            $stmt = $connection->prepare("SELECT id FROM usuarios AS u WHERE u_password = '$pass' AND email = '$email'");
            $stmt->execute();
            $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rows = $stmt->rowCount();



            if ($rows == 1) {
                $_SESSION['login_user']= true; // Initializing Session
                $_SESSION['id'] = $user_data['id'];

                return true;
                } else {
                    return false;
                }

            // $stmt->execute();

            // $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        public static function checkEmail($emailName)
        {
            global $connection;

            $stmt = $connection->prepare("SELECT id FROM usuarios WHERE email = '$emailName'");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }else {
                return false;
            }

        }

        public static function get_session(){
            // $_SESSION['login_user'] = $session;
            return isset($_SESSION['login_user']);
        }

        public static function user_logout() {
            $_SESSION['login_user'] = FALSE;
            session_destroy();
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

        public static function updateImage($id, $ID, $name, $title, $description)
        {
            global $connection;

            $stmt = $connection->prepare("UPDATE imagen SET id_image = '$ID', image_path = '$name', m_name = '$title', m_description = '$description' WHERE id_image = '$id'");

            $stmt->execute();
        }

        public static function deleteImage($id){
            global $connection;

            $stmt = $connection->prepare("DELETE FROM imagen WHERE id_image = '$id';");
            
            $stmt->execute();
        }

        public function getImageByID($id){

			$allImages = DB::getAllImages();

			// Recorro el array de usuarios
			foreach ($allImages as $oneImage) {
				// Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
				if ($oneImage['id_image'] == $id) {

					return $oneImage;
				}
			}
        }

        public static function getAllUsuarios(){
            global $connection;

            $stmt = $connection->prepare("SELECT * FROM usuarios AS u");

            $stmt->execute();

            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        }

        public static function getUserByEmail($email){

			$allUsers = DB::getAllUsuarios();

			// Recorro el array de usuarios
			foreach ($allUsers as $oneUser) {
				// Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
				if ($oneUser['email'] == $email) {

					return $oneUser;
				}
			}
        }

        public static function emailExist($email) {
            // Traigo a todos los usuarios
            $allUsers = DB::getAllUsuarios();

            // Recorro el array de usuarios
            foreach ($allUsers as $oneUser) {
                // Si la posición "email" del usuario en la iteración coincide con el email que pasé como parámetro
                if ($oneUser['email'] == $email) {
                    return true;
                }
            }

            // Si termino de recorrer el array y no se encontró al email que pasé como parámetro
            return false;
        }

        public function getUserByID($id){

			$allUsers = DB::getAllUsuarios();

			// Recorro el array de usuarios
			foreach ($allUsers as $oneUser) {
				// Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
				if ($oneUser['id'] == $id) {

					return $oneUser;
				}
			}
        }

        public static function login($user){
            unset($user['u_password']);

            // Guardo en sesión al usuario que recibo por parámetro
            $_SESSION['login_user'] = $user;

            // $_SESSION['name'] = $user['u_name'];


            // Redirecciono al perfil del usuario
            header('location: profile.php');
            exit;
        }

        public static function loginValidate($email, $pass)
        {
            global $connection;
            $exist= DB::emailExist($email);

            if (empty($email)) {
                $errors['email'] = 'El campo email es obligatorio';
            }elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $errors['email'] = 'Introducí un formato de email válido';
            } elseif (!($exist)) {
                $errors['email'] = 'Las credenciales no coinciden';
            } else {

                $theUser = DB::getUserByEmail($email);

                if (!password_verify($pass, $theUser['u_password'])) {
                    $errors['pass'] = 'Las credenciales no coinciden';
                }
            if ( empty($pass) ) {
                $errors['pass'] = 'El campo password es obligatorio';
            }

            return $errors;
            }
        }

        public static function getVideoByID($id){

			$allVideos = DB::getAllVideos();

			foreach ($allVideos as $oneVideo) {
	
				if ($oneVideo['id_video'] == $id) {

					return $oneVideo;
				}
			}
        }

        public static function deleteVideo($id){
            global $connection;

            $stmt = $connection->prepare("DELETE FROM video WHERE id_video = '$id';");
            
            $stmt->execute();
        }

        public static function getAllVideos() {

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

        public static function updateVideo($id, $ID, $name, $title, $description)
        {
            global $connection;

            $stmt = $connection->prepare("UPDATE video SET id_video = '$ID', video_path = '$name', v_name = '$title', v_description = '$description' WHERE id_video = '$id'");

            $stmt->execute();
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
