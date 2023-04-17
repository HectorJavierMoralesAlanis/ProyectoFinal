<?php
    class DAO{
        private $conexion;
        public function __construct(){
            try{
                $this->conexion = new PDO("mysql:host=localhost;dbname=proyecto","admin","2e19c301ddae0c83a59446303955909e093fd240fe36561b");
            }catch (Exception $ex){
                echo $ex->getMessage();
            }
        }

        public function ejecutarConsulta($sql="",$valores=array()){
            if($sql!=""&&strlen($sql)>0){
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute($valores);
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }
        }
        
        public function insertarConsulta($sql="",$valores=array()){
            if($sql!=""&&strlen($sql)>0){
                try{
                    $this->conexion->beginTransaction();
                    $consulta=$this->conexion->prepare($sql);
                    $consulta->execute($valores);
                    if(intval($consulta->errorCode())===0){
                        $this->conexion->commit();//confirma la accion realizada
                        $filasAfectadas=$consulta->rowCount();
                        return $filasAfectadas;
                    }else{
                        $this->conexion->rollBack();
                        return -1;
                    }
                }catch(Exception $ex){
                    $this->conexion->rollBack();//regresa a un estado anterior
                    return $this->conexion->errorInfo();
                }
            }else{
                return 0;
            }
        }
    }
    
?>