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

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) 
    {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
        }
} 
$conn->close();

//$nome = $_POST['nome'];
//$sql = "INSERT INTO usuarios (nome) VALUES ('$nome')";
// Se o usuário inserir "Joana D'arc", a consulta se torna:
// INSERT INTO usuarios (nome) VALUES ('Joana 'D'Arac')
// Isso pode causar um erro SQL ou ser explorado em um ataque.

//$nome = $conn->real_escape_string($_POST['nome']);
//$sql = "INSERT INTO usuarios (nome) VALUES ('$nome')";
// A string é segura, pois "Joana D'arc" será transformado em "Joana \D'Arc'".
// A consulta se torna segura:
// INSERT INTO usuarios (nome) VALUES ("Joana \D'Arc")

?>