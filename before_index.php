<?php
include_once("conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "diseno";
if (isset($_POST["tipo"])) {
    $conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
    $id_cont = 1;
    $contenedor = $_POST["tipo"];
    $prioridad = $_POST["prioridad"];
    $texto = $_POST["texto"];
    $imagen = $_POST["imagen"];
    $titulo = $_POST["titulo"];
    // El 'id' es de auto-incremento asi que no hace falta ponerlo abajo

    $conexion->hacer_consulta("INSERT INTO contenedor (id_cont, contenedor, prioridad, texto, imagen, titulo) VALUES (?,?,?,?,?,?)", "iiisss", [$id_cont, $contenedor, $prioridad, $texto, $imagen, $titulo]);
}

$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);

/* $datos = $conexion->recibir_datos("SELECT * FROM contenedor WHERE id='1' ORDER BY prioridad") */

$datos = $conexion->recibir_datos("SELECT * FROM contenedor ORDER BY prioridad");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="index.php">
        Tipo
        <select name="tipo">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        Prioridad
        <select name="prioridad">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        Titulo
        <input type="text" name="titulo">
        Imagen
        <input type="text" name="imagen">
        Comentario
        <textarea name="texto"></textarea> 
        <button>Enviar</button>
    </form>
    <main>
        <?php
        if ($datos) {
            /* for ($i=0; $i<count($datos);$i++){ 
            if($datos[$i]["contenedor"]==1){
                echo '<h1>'.$titulo.'</h1><p>'.$texto.'</p>
                <img src="'.$imagen.'" alt="'.$titulo.'">';
            }
            if($datos[$i]["contenedor"]==2){
                echo "<h1>EL CONTENEDOR ES DE TIPO 2</h1>";
            }
        }
            
            */

            //Mostrar datos de la tabla
            foreach ($datos as $datos) {

                //$titulo = $datos[$i]["titulo"];
                $titulo = $datos["titulo"];
                //$texto = $datos[$i]["texto"];
                $texto = $datos["texto"];
                //$imagen = $datos[$i]["imagen"];
                $imagen = $datos["imagen"];
                //$contenedor = $datos[$i]["contenedor"];
                $contenedor = $datos["contenedor"];
                // echo $datos[$i]["contenedor"];
                if ($contenedor == 1) {
                    echo '<h1>' . $titulo . '</h1><p>' . $texto . '</p><img src="' . $imagen . '" alt="' . $titulo . '">';
                } elseif ($contenedor == 2) {
                    echo "<h1>EL CONTENEDOR ES DE TIPO 2</h1>";
                }
            }
        } else {
            echo '<p>No hay datos disponibles</p>';
        }
        ?>
    </main>
</body>

</html>