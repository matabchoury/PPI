<?php

class Produto
{
    // Método estático para criar um novo produto no banco de dados
    static function Create($pdo, $nome, $marca, $descricao)
    {
        $stmt = $pdo->prepare(
            <<<SQL
            INSERT INTO produto (nome, marca, descricao)
            VALUES (?, ?, ?)
            SQL
        );

        $stmt->execute([$nome, $marca, $descricao]);

        return $pdo->lastInsertId();
    }

    // Método para buscar um produto pelo ID
    static function Get($pdo, $id)
    {
        $stmt = $pdo->prepare(
            <<<SQL
            SELECT id, nome, marca, descricao
            FROM produto
            WHERE id = ?
            SQL
        );

        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0)
            throw new Exception("Produto não localizado");

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Retorna os 30 primeiros produtos cadastrados
    static function GetFirst30($pdo)
    {
        $stmt = $pdo->query(
            <<<SQL
            SELECT id, nome, marca, descricao
            FROM produto
            LIMIT 30
            SQL
        );

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para remover um produto pelo ID
    public static function Remove($pdo, $id)
    {
        $stmt = $pdo->prepare(
            <<<SQL
            DELETE FROM produto WHERE id = ? LIMIT 1
            SQL
        );
        
        $stmt->execute([$id]);
    }
}
