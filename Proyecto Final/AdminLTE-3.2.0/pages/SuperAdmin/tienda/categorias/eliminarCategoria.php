<?php
include_once("../../PDO/DAO.php");

//Se obtiene el id de la categoria
$id=$_GET['id'];

//Se crea la variable dao que permite la conexion a la base de datos
$dao=new DAO();

//Se crea la variable consulta donde guardara la consulta
$consulta="SELECT * FROM categoria WHERE id=:id";

//Variable donde se guardan los parametros que usaran
$parametros=array("id"=>$id);

//Varaible donde se guarda el resultado de la consulta
$usuarios=$dao->ejecutarConsulta($consulta,$parametros);

//Variable de la conexion a la base de datos
$dao2=new DAO();

//Variable que guarda la consulta
$consulta2="DELETE FROM categoria WHERE id=:idU";

//Variable que guarda los parametros que se utilizaran
$parametros2=array("idU"=>$id);

//Variable que guarda los resultados de la consulta
$resultados=$dao2->insertarConsulta($consulta2,$parametros2);

//Condicional donde si resultados regresa 0 o mas valores en el array 
if($resultados>=0){
    //Bucle para recorrer los valores de usuarios
    foreach($usuarios as $id => $l){
        //Funcion para cambiar el url
    header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/categorias/categoria.php?id=$l[tiendaId]");
    }
}else{
    //Mensaje de error
    echo "error";
}

?>
