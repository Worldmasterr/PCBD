<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CPF = $_POST['CPF'];
    $Nome = $_POST['Nome'];
    $Endereco = $_POST['Endereco'];
    $DataNascimento = $_POST['DataNascimento'];

    $sql = "UPDATE funcionario SET Nome='$Nome', Endereco='$Endereco', DataNascimento='$DataNascimento' WHERE CPF='$CPF'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $CPF = $_GET['CPF'];
    $sql = "SELECT * FROM funcionario WHERE CPF='$CPF'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Funcionário não encontrado";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
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
    <h1>Editar Funcionário</h1>
    <form method="post" action="update.php">
        <input type="hidden" name="CPF" value="<?php echo $row['CPF']; ?>">
        <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" value="<?php echo $row['Nome']; ?>" required><br>
        <label for="Endereco">Endereço:</label>
        <input type="text" id="Endereco" name="Endereco" value="<?php echo $row['Endereco']; ?>" required><br>
        <label for="DataNascimento">Data de Nascimento:</label>
        <input type="date" id="DataNascimento" name="DataNascimento" value="<?php echo $row['DataNascimento']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
