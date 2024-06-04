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

$sql = "SELECT * FROM funcionario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Funcionários</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Lista de Funcionários</h1>
    <a href="create.html">Adicionar Novo Funcionário</a>
    <table>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['CPF']}</td>
                        <td>{$row['Nome']}</td>
                        <td>{$row['Endereco']}</td>
                        <td>{$row['DataNascimento']}</td>
                        <td>
                            <a href='update.php?CPF={$row['CPF']}'>Editar</a>
                            <a href='delete.php?CPF={$row['CPF']}'>Deletar</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum funcionário encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
