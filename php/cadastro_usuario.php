<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        // Verifica se o e-mail já está registrado
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Este e-mail já está registrado. Tente outro.";
        } else {
            // Hash da senha
            $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

            // Insere os dados no banco de dados
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $senha_hashed);

            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso.";
            } else {
                echo "Erro: " . $stmt->error;
            }
        }

        $stmt->close();
    }
// Exibe o botão de retorno à página inicial
echo '<br><br><a href="../index.php"><button>Voltar à página inicial</button></a>';
}

$conn->close();
?>
