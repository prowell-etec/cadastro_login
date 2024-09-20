# cadastro_login
Exemplo de código em PHP para cadastro e login de usuários em DB com criptografia de senha
## Criando o db

```SQL
CREATE DATABASE loja_online;

use loja_online

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
