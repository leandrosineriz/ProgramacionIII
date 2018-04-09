<?php
    echo var_dump($_GET);
    
    
    $color=$_GET["cboColor"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body bgcolor="<?php echo $color; ?>">

<form action="">
<select name="cboColor">
<option value="FF3333">Rojo</option>
<option value="FFF933">Amarillo</option>
<option value="6BFF33">Verde</option>
<option value="3374FF">Azul</option>
</select>

<input type="button" value="Cambiar Color" onclick="submit()">
<button type="submit">Enviar</button>

</form>

    
</body>
</html>