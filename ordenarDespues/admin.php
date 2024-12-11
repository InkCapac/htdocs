<?php
//  if (isset($_GET["headers"])) {
if (isset($_GET["footers"])) {
    include_once("./conectar.php");
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bbdd = "diseno";
    $conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
    $header = 1;
    $footer = 2;
    
    // $datos = $conexion->hacer_consulta("UPDATE pagina SET header=? WHERE id='1'", "i", [$_GET["headers"]]);
    $datos = $conexion->hacer_consulta("UPDATE pagina SET footer=?, header=? WHERE id=?", "ii", [$_GET["footers"]. $_GET["headers"]]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./admin.php" method="get">
        <form>
            <label for="headers">¿Qué header quieres cargar?</label>
            <select name="headers" id="headers">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <label for="footers">¿Qué footer quieres cargar?</label>
            <select name="footers" id="footers">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <hr>
        <?php
        include_once("./index.php");
        ?>
</body>

</html>