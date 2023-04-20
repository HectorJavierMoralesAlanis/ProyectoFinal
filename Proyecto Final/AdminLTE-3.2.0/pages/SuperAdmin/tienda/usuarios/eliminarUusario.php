<?php
include_once("../../PDO/DAO.php");
$id=$_GET['id'];
$dao=new DAO();
$consulta="SELECT * FROM usuarios WHERE id=:id";
$parametros=array("id"=>$id);
$usuarios=$dao->ejecutarConsulta($consulta,$parametros);
    //
if(isset($_POST['borrar'])){
    $dao2=new DAO();
    $consulta2="DELETE FROM usarios WHERE id=:idU";
    $parametros2=array("idU"=>$id);
    $resultados=$dao->insertarConsulta($consulta2,$parametros2);
    if($resultados>=0){
        foreach($usuarios as $id => $l){
        header("Location: http://134.122.77.182/Proyecto%20Final/AdminLTE-3.2.0/pages/SuperAdmin/tienda/usuarios/usuarios2.php?id=$l[tiendaId]");
        }
    }else{
        echo "error";
    }
}

?>
