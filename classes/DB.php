<?php

    abstract class DB {

        public static function saveUsuario(Usuario $usuario){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO usuarios (u_name, last_name, phone, email)
                VALUES(:u_name, :last_name, :phone, :email)");

                $stmt->bindValue(':u_name', $usuario->getName());
                $stmt->bindValue(':last_name', $usuario->getLastName());
                $stmt->bindValue(':phone', $usuario->getPhone());
                $stmt->bindValue(':email', $usuario->getEmail());

                $stmt->execute();

                return true;
            } catch (PDOException $exception) {
                return false;
            }
        }

        public static function saveFile(MultimediaFile $m_file){
            global $connection;

            try {
                $stmt = $connection->prepare("INSERT INTO multimedia_file (m_name, m_description)
                VALUES(:m_name, :m_description)");

                $stmt->bindValue(':m_name', $m_file->getName());
                $stmt->bindValue(':m_description', $m_file->getDescription());

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
                $final_usuarios = new Usuario($usuarios['u_name'], $usuarios['last_name'], $usuarios['phone'], $usuarios['email']);
            }

            $final_usuarios->setId_file($usuarios['user_id']);

            $usuariosObject[] = $final_usuarios;
            
            return $usuariosObject;
        }

        public static function getAllFiles(){
            global $connection;
    
            $stmt = $connection->prepare("SELECT * FROM multimedia_file AS m");
    
            $stmt->execute();
    
            $m_files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $m_filesObject = [];
    
            foreach ($m_files as $files) {
                $final_files = new MultimediaFile($m_files['name'], $m_files['description']);
            }


            $m_filesObject[] = $final_files;
            
            return $m_filesObject;
        }
    }

?>
