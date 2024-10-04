<?php
$host = "127.0.0.1";
$usuario = "root";
$senha= "";
$db="tavelaavaliacao";
$conn = new mysqli($host,$usuario, $senha, $db);

if ($conn->connect_error) 
{
    die("Falha na conexão: " . $conn->connect_error);
}
?> 


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <php?>

    </php>   
</body>
</html>