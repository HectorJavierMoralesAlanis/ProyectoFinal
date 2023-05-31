<?php
include_once("../PDO/DAO.php");

//Recibe el valor de la id de la tienda
$id=$_GET['id'];

//Se crea la variable dao2 que permite la conexion a la base de datos
$dao2=new DAO();

//Se crea la variable consulta2 donde se guardara la variable
$consulta2="DELETE FROM tienda WHERE id=:idT";

//Se crea la variable parametros2 que enviara los parametros
$parametros2=array("idT"=>$id);

//Se creara la variable resultados donde se guardar5a el resultado de la consulta 
$resultados=$dao2->insertarConsulta($consulta2,$parametros2);

//Condicional donde si resultados regresa 0 o mas valores
if($resultados>=0){
    //Funcion para cambiar la url
    header("Location: http://64.226.114.50/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/dashboardSA/dashboard.php");
}else{
    //Mensaje de error
    echo "error";
}
?>
