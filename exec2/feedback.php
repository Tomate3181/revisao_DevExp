<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Produtos</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        function avaliacaoEnviada(){
            Swal.fire({
                title: "Avaliação Enviada",
                text: "Seu feedback foi enviado com sucesso!",
                icon: "success"
            });
        }
    </script>

        <form action="./processar_feedback.php" method="POST">
            <h1 class="titulo">Avaliar um Produto</h1>
            <label for="produtoNome">Nome do produto:</label>
            <input type="text" name="produtoNome">

            <label for="nota">Nota (1 a 5):</label>
            <input type="range" name="nota" min="1" max="5">

            <label for="comentario">Escreva um comentário:</label>
            <input type="text" name="comentario">

            
            <button type="submit" onclick="avaliacaoEnviada()">Enviar</button>
            
            <a href="processar_feedback.php" class="botao-link">Ver Avaliações</a>


        </form>


</body>
</html>