<?php
include "conexaoMysql.php";
$pdo = mysqlConnect();

$modelo = $_GET["modelo"] ?? "";

$sql = $pdo->prepare("SELECT modelo, ano, cor, quilometragem FROM veiculo WHERE modelo = ?");
$sql->execute([$modelo]);

$veiculos = [];

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $veiculos[] = $linha;
}

echo json_encode($veiculos);
?>
