<?php
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$db = "tabelaavaliacao";

$conn = new mysqli($host, $usuario, $senha, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT classe,vantagem,desvantagem FROM classes";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">
        </div>

        <div>
            <label for="nome">Nome do personagem:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="classe">Classe:</label> 
            <select id="opcao" name="opcao">
            <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['classe']}'>{$row['classe']}</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhuma classe disponível</option>";
                    }
                ?>
            </select>
        </div>

        <div>
            <label for="historia" class="form-label">História:</label>
            <input type="text" id="historia" name="historia" required>
        </div>

        <div>
            <label for="item" class="form-label">Item:</label>
            <input type="text" id="item" name="item" required>
        </div>

        <div>
            <label for="item" class="form-label">Vantagem:</label>
            <p>Coloque até 10 pontos Distribuídos como desejar</p>
            <div>
            <p>Vantagens - Distribua até 10 pontos</p>
            <?php
                foreach ($vantagens as $vantagem) {
                    echo "<label for='{$vantagem}'>{$vantagem}:</label>";
                    echo "<input type='number' id='{$vantagem}' name='vantagens[{$vantagem}]' class='vantagem-input' min='0' max='10' value='0'><br>";
                }
            ?>
        </div>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
