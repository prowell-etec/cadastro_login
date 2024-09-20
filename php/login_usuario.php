<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (empty($email) || empty($senha)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $nome, $senha_hashed);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($senha, $senha_hashed)) {
                echo "Login realizado com sucesso. Bem-vindo, $nome!";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }

        $stmt->close();
    }
}
$conn->close();
?>
