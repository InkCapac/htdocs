<?php
class Conectar{
    private $conexion;
    function __construct($servidor, $usuario, $contrasena, $bbdd)
    {

        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
    }

    function hacer_consulta($consulta, $tipos, $variables){
        $sentencia = $this->conexion->prepare($consulta);
        $array_completo = array_merge([$tipos], $variables);
        $referencias = [];
        foreach($array_completo as $clave => $valor){
            $referencias[$clave] = &$array_completo[$clave];
        }
        call_user_func_array([$sentencia, 'bind_param'], $referencias);
    
        
        //$sentencia->bind_param($v1,$v2,$v3, ....); Convierte el array en una lista de todas las variables de array separadas por comas
        
        $sentencia->execute();
        echo "Se han actualizado los datos correctamente";
        $this->conexion->close();
    }    
    
    function recibir_datos($consulta){
        $sentencia = $this->conexion->query($consulta);
        $filas = [];
        //var_dump($sentencia->fetch_array());
        while( $row = $sentencia->fetch_assoc()){
            $filas[] = $row;
        }
        $this->conexion->close();
        return $filas;
    }

}
?>