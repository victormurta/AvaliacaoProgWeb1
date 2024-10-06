<?php

session_start();

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inferno</title>
    <link rel="stylesheet" href="personagem.css" />
    <link rel="icon" href="imagens/iconeInferno.jpg" />
</head>
<body>
    <div class="container-conteudo">
        <div class="cabecalho">
          <h1>Inferno</h1>
        </div>
        <div class="forms">
            <form action="ficha_personagem" method="POST">
                <h1 class="titulo_ficha">Ficha Personagem</h1>

                <label for="nome" class="nome_personagem">Nome: </label>
                <input type="text" id="nome" name="nome" maxlength="80"required><br>

                <label for="imagem" class="imagem_personagem">Imagem: </label>
                <input type="file" id="imagem" name="imagem" accept="image/*" onchange="previewImage(event)" required><br><div id="preVizualizarID" class="preVizualizacao">
                    <h3 class="vizuImagem">Sua Imagem:</h3>
                    <img id="preVizuliazarImagem" src="" style="max-width: 100%; height: auto;">
                </div>

                

                <label for="historia" class="historia_personagem">Historia: </label>
                <textarea id="historia" rows="4" maxlength="1000" placeholder="Sua história..." oninput="autoResize(this)"></textarea><br>

                <label for="item" class="item_personagem">Item: </label>
                <textarea id="item" rows="4" maxlength="200" placeholder="Explique seu item..." oninput="autoResize(this)"></textarea><br>

                <div class="classe_div">
                    <p class="classe_personagem">Classe: </p>
                    <label for="luxuria" class="classe"> <input type="radio" id="luxuria" name="classe" required> Luxuria</label> 
                    <label for="gula" class="classe"> <input type="radio" id="gula" name="classe"> Gula</label>
                    <label for="avareza" class="classe"> <input type="radio" id="avareza" name="classe"> Avareza</label>
                    <label for="ira" class="classe"> <input type="radio" id="ira" name="classe"> Ira</label>
                    <label for="heresia" class="classe"> <input type="radio" id="heresia" name="classe"> Heresia</label>
                    <label for="violencia" class="classe"> <input type="radio" id="violencia" name="classe"> Violência</label>
                    <label for="fraude" class="classe"> <input type="radio" id="fraude" name="classe"> Fraude</label>
                    <label for="traicao" class="classe"> <input type="radio" id="traicao" name="classe"> Traição</label>
                </div>

                <button type="submit" class="btn-enviar">Enviar</button>

            </form> 
            <script src="personagem.js"></script>
        </div>   
    </div>
    
</body>
<footer class="rodape">
    <h3>Autores:</h3>
    <p>Alícia Ribeiro</p>
    <p>Ana Cajuela</p>
    <p>Anthenor Fernandes</p>
    <p>Rillory Teodora</p>
    <p>Victor Murta</p>
</footer>
</html>