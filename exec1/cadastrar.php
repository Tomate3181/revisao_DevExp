<?php 

include_once './conexao.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = isset($_POST['nome']);
    $email = isset($_POST['email']);
    $telefone = isset($_POST['telefone']);

    $sql = 'INSERT INTO usuario (nome, email, telefone) VALUES (?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $nome, $email, $telefone);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link rel="stylesheet" href="./styles.css">
    <style>
        table{
           margin: 1px;
           color: black;
           border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="sidenav">
        <div class="icon">🛒</div>
        <a href="./form.php">Home</a>
    </div>
    <main style="margin-left: 140px;">
        <h1>Cadastros</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = 'SELECT * FROM usuario';
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Nenhum registro no banco";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>