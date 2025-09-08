<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Reserva</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h1>Confirmação de Reserva</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars($_POST['nome']); 
            $data = htmlspecialchars($_POST['data']);
            $horario = htmlspecialchars($_POST['horario']);
            $horario = str_replace("T", " ", $horario) . ":00";

            $sql = "INSERT INTO reservas (nome, data_reuniao, hora_reuniao) VALUES ('$nome', '$data', '$horario')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='confirmacao-box'>";
                echo "<h2>Reserva Realizada com Sucesso!</h2>";
                echo "<p>Olá <strong>" . $nome . "</strong>,</p>";
                echo "<p>Sua solicitação de reserva para a sala foi registrada com os seguintes detalhes:</p>";
                echo "<ul>";
                echo "<li><strong>Data:</strong> " . date('d/m/Y', strtotime($data)) . "</li>";
                echo "<li><strong>Horário:</strong> " . $horario . "</li>";
                echo "</ul>";
                echo "<p>Aguarde a aprovação da sua reserva.</p>";
                echo "</div>";
            } else {
                echo "<div class='erro-box'>";
                echo "<p>Erro ao salvar a reserva: " . $conn->error . "</p>";
                echo "</div>";
            }

            $conn->close();
        } else {
            echo "<div class='erro-box'>";
            echo "<p>Nenhum dado de formulário foi enviado. Por favor, <a href='reserva.php'>volte e preencha o formulário</a>.</p>";
            echo "</div>";
        }
        ?>

        <a href="reserva.php" class="btn-voltar">Fazer Nova Reserva</a>
    </div>
</body>
</html>
