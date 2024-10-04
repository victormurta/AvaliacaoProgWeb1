<?php
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$db = "tabelaavaliacao";

$conn = new mysqli($host, $usuario, $senha, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT classe, vantagem FROM classes";
$result = $conn->query($sql);

$classeSelecionada = isset($_POST['classe']) ? $_POST['classe'] : ''; // Atribuição fora do loop para uso global
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Personagem</title>
    <script>
        function validarVantagens() {
            const inputs = document.querySelectorAll('input[name="vantagens[]"]');
            let total = 0;
            inputs.forEach(input => {
                total += parseInt(input.value) || 0;
            });

            if (total > 10) {
                const excedente = total - 10;
                alert("O total de pontos excede o limite em ${excedente} pontos.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <form action="" method="post" onsubmit="return validarVantagens()">
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
            <select id="classe" name="classe">
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['classe']}'>{$row['classe']}</option>";
                    }                
                }
            ?>
            </select>
        </div>

        <div>
            <label for="historia">História:</label>
            <input type="text" id="historia" name="historia" required>
        </div>

        <div>
            <label for="item">Item:</label>
            <input type="text" id="item" name="item" required>
        </div>

        <div>
            <h3>Vantagens</h3>
            <p>Distribua até 10 pontos entre as vantagens:</p>
            <?php
                // Aqui estamos selecionando a classe, e após a seleção, buscamos as vantagens correspondentes
                $vantagemSql = "SELECT vantagem FROM classes WHERE classe = '$classeSelecionada'";
                $vantagemResult = $conn->query($vantagemSql);

                if ($vantagemResult->num_rows > 0) {
                    $row = $vantagemResult->fetch_assoc();
                    $vantagens = explode(',', $row['vantagem']);  // Separar as vantagens pelo delimitador (vírgula)

                    foreach ($vantagens as $vantagem) {
                        echo "<div>
                                <label for='$vantagem'>$vantagem</label>
                                <input type='number' id='$vantagem' name='vantagens[]' min='0' max='10'>
                              </div>";
                    }
                } else {
                    echo "<p>Não há vantagens disponíveis para esta classe.</p>";
                }
            ?>
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>