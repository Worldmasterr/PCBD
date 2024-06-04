<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "monorail.proxy.rlwy.net";
$username = "root";
$password = "qylvMiklHKdPNvVHRfDpaveQoXZWIfvM";
$dbname = "railway";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $DataNascimento = $_POST['DataNascimento'];

    $sql = "INSERT INTO funcionario (CPF, Nome, Endereco, DataNascimento)
            VALUES ('$cpf', '$nome', '$endereco', '$DataNascimento')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Novo Funcionário</title>
    <style>
        form {
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #f2f2f2;
            color: black;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Adicionar Novo Funcionário</h1>
    <form method="post" action="create.php">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br>
        <label for="DataNascimento">Data de Nascimento:</label>
        <input type="date" id="DataNascimento" name="DataNascimento" required><br>
        <input type="submit" value="Adicionar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
