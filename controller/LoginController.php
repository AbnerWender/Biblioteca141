<?php
require_once "../config/database.php";

class LoginController{
    private $conexao;

    public function __construct(){
        $bd =  new Banco();
        $this->conexao = $bd->conectar();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Valida o login e manda pra home :)
    public function login($email, $senha) {
        // se tiver login vai pra home.php
        if (isset($_SESSION['usuario_email'])) {
            header("Location: /home.php");
            exit();
        }

        // fazendo a busca no banco de dados
        $consulta = "SELECT * FROM usuario WHERE email = ? LIMIT 1";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 0) {
            // redireciona para cadastroUusuario.php se o usuário não for encontrado
            header("Location: /cadastroUsuario.php");
            exit();
        }

        $usuario = $resultado->fetch_assoc();

        if ($usuario['senha'] == $senha) {
            // inicia a sessão e manda para home.php
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            header("Location: /home.php");
            exit();
        } else {
            // manda de volta para o login.php com a mensagem de erro
            $_SESSION['erro_login'] = "Senha ou email incorretos!";
            header("Location: /login.php");
            exit();
        }
    }

    // Função para deslogar
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}