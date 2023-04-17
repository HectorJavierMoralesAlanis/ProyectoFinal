<?php
    include_once './parametros.php';
    class DAO{
        private $cadenaConexion;
        private $conexion;
        
        public function __construct(){
            try{
                $this->cadenaConexion="mysql:host=".BD_SERVIDOR.";dbname=".BD_NOMBRE;
                $this->conexion = new PDO($this->cadenaConexion,BD_USUARIO,BD_PASS);
                echo "conexion";
            }catch (Exception $ex){
                echo $ex->getMessage();
            }
        }
/*
        public function ejecutarConsulta($sql="",$valores=array()){
            if($sql!=""&&strlen($sql)>0){
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute($valores);
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }
        }
    */
    }
    
    $aux=new DAO();
?>