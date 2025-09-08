<?php

$conexao = new mysqli('localhost', "root", '', 'bd_devexp-exec2');

if ($conexao->connect_error){
    die("erro na conexao com o banco $conexao->connect_error");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['produtoNome'], $_POST['nota'], $_POST['comentario'])){
    $nomeProduto = $_POST['produtoNome'];
    $nota = $_POST['nota'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO avaliacoes (nomeProduto, nota, comentario) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sis", $nomeProduto, $nota, $comentario);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Erro ao preparar statement: " . $conexao->error);
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações</title>
    <link rel="stylesheet" href="avaliacoes.css">
</head>
<body>
    <div class="container">

        <a href="feedback.php" class="botao-link">Avaliar um produto</a>
        <h1>Avaliações dos Produtos</h1>


        <div class="cards">

        <?php 

        $resultado = $conexao->query("SELECT * FROM avaliacoes");

        if ($resultado->num_rows > 0) {
            while($linha = $resultado->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<h2>" . $linha['nomeProduto'] . "</h2>";
                echo "<p> ⭐" . $linha["nota"] ."/5</p>";
                echo "<p>" . $linha["comentario"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "nenhum registro no banco";
        }
        ?>
        
        </div>

    </div>
</body>
</html>