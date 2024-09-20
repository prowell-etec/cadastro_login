<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="php/cadastro_usuario.php">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Cadastrar</button>
        </form>
        <a href="login.php">Já tem uma conta? Faça login</a>
    </div>
</body>
</html>
