<?php

echo "OLÁ, MUNDO!<br><br>"; # Exibe "OLÁ, MUNDO!"

# O restante do código é de conexão e consulta ao banco de dados

$servername = "mysql"; # Define o nome do servidor MySQL. No Docker Compose, pode ser o nome do serviço.

# Obtendo o usuário, senha e nome do banco de dados MySQL a partir de variáveis de ambiente.
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');


# Exibe uma mensagem na página Web
echo "Nomes buscados na tabela do banco: <br><br>";


# Estabelece uma conexão PDO segura com o banco de dados MySQL
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# Executa uma consulta SQL para selecionar todos os registros da tabela 'names'
    $stmt = $conn->query("SELECT * FROM names");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

# Itera sobre os resultados da consulta e os exibe na página web
    if ($results) {
        foreach ($results as $row) {
            echo "ID: " . $row['id'] . " - Name: " . $row['name'] . "<br>";
        }
    } else {
        echo "No records found.";
    }
} catch(PDOException $e) {
    # Em caso de erro na conexão ou consulta, exibe uma mensagem de erro
    echo "Connection failed: " . $e->getMessage();
}
?>