<?php
require_once "../config/database.php";
require "../model/Usuario.php";

class LoginController{
    private $conexao;

    public function __construct(){
        $bd =  new Banco();
        $this->conexao = $bd->conectar();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($email, $senha) {
        if (isset($_SESSION['usuario_email'])) {
            header("Location: /home.php");
            exit();
        }

        $consulta = "SELECT * FROM usuario WHERE email = ? LIMIT 1";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 0) {
            echo 'false';
        }

        $usuario = $resultado->fetch_assoc();

        if ($usuario['senha'] == $senha) {
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            header("Location: /home.php");
            exit();
        } else {
            echo 'false';
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

$login = new LoginController();
$login->login('agatha@email.com', '123456');
$login->logout();
