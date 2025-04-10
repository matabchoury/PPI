<?php
class Paciente {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Create($nome, $sexo, $email, $peso, $altura, $tipo_sanguineo) {
        try {
            $this->conexao->beginTransaction();
            
            // Inserção na tabela Pessoa
            $stmtPessoa = $this->conexao->prepare("INSERT INTO Pessoa (nome, email) VALUES (?, ?)");
            $stmtPessoa->execute([$nome, $email]);
            $idPessoa = $this->conexao->lastInsertId();
            
            // Inserção na tabela Paciente
            $stmtPaciente = $this->conexao->prepare("INSERT INTO Paciente (idPessoa, sexo, peso, altura, tipo_sanguineo) VALUES (?, ?, ?, ?, ?)");
            $stmtPaciente->execute([$idPessoa, $sexo, $peso, $altura, $tipo_sanguineo]);
            
            $this->conexao->commit();
            return true;
        } catch (Exception $e) {
            $this->conexao->rollBack();
            return false;
        }
    }
}
?>
