<?php
    include('./conexion.php');
    
    function login(){
        global $pdo;
        
        //Consulta para traer las filas que coincidan
        $consulta="SELECT * FROM usuarios WHERE usuario='$_REQUEST[usuario]' and contrasena='$_REQUEST[contrasena]'";
        
        //Ejecuta la consulta
        $statement=$pdo->prepare($consulta);
        $statement->execute();

        //Cuenta las filas 
        $filas=$statement->rowCount();

        //Si coincide mas de una 
        if($filas>0){
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
        }else{
            header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/login.php");
        }
    }
    function getlogin(){
        global $pdo;

        $sql = "SELECT * from usuarios";

        $statements=$pdo->prepare($sql);

        $statements->execute();
        $results=$statements->fetchAll();
        return $results;
    };

    function addTienda(){
        if(!empty($_POST['nombre'])&&!empty($_POST['estado'])){
            global $pdo;

            //Variable para guardar los valores del nombre y el estado de la tienda
            $nombre=$_REQUEST['nombre'];
            $estado=$_REQUEST['estado'];
            
            //Definir la consulta
            $sql = "INSERT INTO tienda (nombre) VALUES (:nombre,:estado)";
            $statement = $pdo->prepare($sql);

            //Se agrega a la consulta los valores de las variables
            $statement->bindParam(":nombre",$nombre);
            $statement->bindParam(":estado",$estado);

            //Condicional donde si se ejecuta la consulta exitosa te redirecciona al dashboard y guarda los valores si es falsa se manda un mensaje de error
            if($statement->execute()){
                header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
            }else {        
                print("Error en la consulta");
            }
        }
    }

    function mostrarTienda(){
        global $pdo;

        $sql = "SELECT * FROM tienda";

        $statements = $pdo->prepare($sql);

        $statements->execute();

        $results=$statements->fetchAll();
        return $results;
    }
?>