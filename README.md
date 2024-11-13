## Descrição do Projeto 

### Visão Geral
Este projeto visa desenvolver um sistema de gerenciamento de biblioteca em PHP utilizando programação orientada a objetos (POO). O sistema será web e terá como objetivo principal automatizar as operações de uma biblioteca, como cadastro de livros e usuários, gerenciamento de empréstimos e devoluções.

### Funcionalidades
#### Gerenciamento de Livros
* **Cadastro:** Título (obrigatório), autor (obrigatório), ISBN (único, obrigatório), gênero. Validação de ISBN duplicado.
* **Consulta:** Por título, autor, ISBN, gênero. Busca individual ou em lote.
* **Atualização:** Verificação de existência do livro. Validação de campos a serem atualizados. ISBN não pode ser alterado.
* **Exclusão:** Impede a exclusão de livros emprestados.

#### Gerenciamento de Usuários
* **Cadastro:** Nome completo, email (único, com formato válido), senha, CPF (único). Identificação de usuários administradores.
* **Consulta:** Somente para administradores. Por nome, email ou ID. Busca individual ou em lote.
* **Atualização:** Usuários podem atualizar seus próprios dados. Administradores podem atualizar qualquer usuário. CPF não pode ser alterado.
* **Exclusão:** Somente administradores e o próprio usuário podem excluir. Impede a exclusão de usuários com empréstimos ativos.

#### Gerenciamento de Empréstimos
* **Realização:** Limite de 3 livros por usuário. Verificação da disponibilidade do livro.
* **Devolução:** Atualização do status do livro e da quantidade de livros emprestados pelo usuário.
* **Consulta:** Por nome do usuário ou título do livro.

#### Login
* Validação de usuário e senha.
* Acesso restrito a usuários logados.

#### Telas
* **Login:** Campos para email e senha. Opção de cadastro.
* **Home:** Acessível somente para usuários logados. Listagem de livros por categoria. Links para páginas individuais dos livros.
* **Livro:** Detalhes do livro. Opção para empréstimo.
* **Usuário:** Informações pessoais do usuário. Histórico de empréstimos.
* **Admin:** Painel administrativo para gerenciar usuários, livros e empréstimos.
