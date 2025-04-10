<?php
include "conexaoMysql.php";
$pdo = mysqlConnect();

$sql = $pdo->query("SELECT DISTINCT marca FROM veiculo");
$marcas = [];

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $marcas[] = $linha["marca"];
}

echo json_encode($marcas);
?>

