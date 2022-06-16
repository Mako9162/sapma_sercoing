<?php

    class Usuario extends Conectar{
        
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();

            if(isset($_POST["enviar"])){
                $usuario = $_POST["Login"];
                $clave1   = $_POST["Clave"];
                $clave = md5($clave1);
                if (empty($usuario) or empty($clave)) {
                    header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
                } else {
                    $sql = "SELECT * FROM Usuarios WHERE Login = ? and Clave = ? AND Activo = 1";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $usuario);
                    $stmt->bindValue(2, $clave);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) and count($resultado)>0) {
                        $_SESSION["Id"] = $resultado["Id"];
                        $_SESSION["Login"] = $resultado["Login"];
                        $_SESSION["Id_Cliente"] = $resultado["Id_Cliente"];
                         header("Location:".conectar::ruta()."vistas/HOME/");
                        exit();           
                    }else{
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();

                    }
                }
                
            }
        }
    }

?>