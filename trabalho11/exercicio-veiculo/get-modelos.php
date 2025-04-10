<?php
include "conexaoMysql.php";
$pdo = mysqlConnect();

$marca = $_GET["marca"] ?? "";

$sql = $pdo->prepare("SELECT DISTINCT modelo FROM veiculo WHERE marca = ?");
$sql->execute([$marca]);

$modelos = [];

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $modelos[] = $linha["modelo"];
}

echo json_encode($modelos);
?>
