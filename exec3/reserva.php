<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Sala de Reunião</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Reserva de Sala de Reunião</h1>
        <p>Preencha os campos abaixo para solicitar a reserva da sala.</p>

        <form action="processar_reserva.php" method="POST" class="form-reserva">
            <div class="form-group">
                <label for="nome">Nome do Solicitante:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="data">Data da Reunião:</label>
                <input type="date" id="data" name="data" required>
            </div>

            <div class="form-group">
                <label for="horario">Horário da Reunião:</label>
                <input type="time" id="horario" name="horario" required>
            </div>

            <button type="submit" class="btn-submit">Reservar Sala</button>
            
        </form>
    </div>
</body>
</html>