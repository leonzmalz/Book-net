<?php
require_once ('../db/Conexao.php');
require_once ("../util/bcrypt.php");
require_once ("../db/UsuarioDAO.php");

class Login extends Conexao {


    public static function logar($usuario) {
        $usuarioBD = UsuarioDAO::getUsuarioByLogin($usuario);
        //se existe esse usuario
        if ($logar->rowCount() == 1) {
            $senhaDigitada = $usuario->getSenha();
            $senhaBanco = $usuarioBD->getSenha();
            if (Bcrypt::check($senhaDigitada, $senhaBanco)) {
                $_SESSION['id_usuario'] = $dados->idUsuario;
                $_SESSION['user'] = $dados->user;
                $_SESSION['logado'] = true;
                $_SESSION['tipo_usuario'] = $dados->tipo;
                return true;
            } else {
                $_SESSION['erro_login'] = 'Senha incorreta';
                return false;
            }

        } else {
            $_SESSION['erro_login'] = 'Não existe essse usuário';
            return false;
        }
    }

    public function alterarSenha($usuario,$novaSenha) {
        $usuarioBD = UsuarioDAO::getUsuarioByLogin($usuario);
        $senhaDigitada = $usuario->getSenha();
        $senhaBanco = $usuarioBD->getSenha();
        if (Bcrypt::check($senhaDigitada, $senhaBanco)) {
            $usuario->setSenha($novaSenha,true);
            
            if (UsuarioDAO::AtualizaValores($usuario)) {
                return true;
            } else
                return false;
        } else
            return false;
    }


    public static function deslogar() {
        if (isset($_SESSION['logado'])) {
            unset($_SESSION['logado']);
            session_destroy();
            header('Location:../index.html');
        }
    }

    public static function isLogado(){
        if (isset($_SESSION['logado']))
            return true;
        else
            return false;
    }

}

?>
