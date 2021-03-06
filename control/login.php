<?php
require_once (realpath(dirname(__FILE__) . '/../db/Conexao.php'));
require_once (realpath(dirname(__FILE__) . '/../util/bcrypt.php'));
require_once (realpath(dirname(__FILE__) . '/../db/UsuarioDAO.php'));

class Login extends Conexao {


    public static function logar($usuario) {
        $usuarioBD = UsuarioDAO::getUsuarioByLogin($usuario);
        //se existe esse usuario
        if ($usuarioBD->getId() != null) {
            $senhaDigitada = $usuario->getSenha();
            $senhaBanco = $usuarioBD->getSenha();
            if (Bcrypt::check($senhaDigitada, $senhaBanco)) {
                $_SESSION['id_usuario'] = $usuarioBD->getId();
                $_SESSION['user'] = $usuarioBD->getUser();
                $_SESSION['logado'] = true;
                $_SESSION['tipo_usuario'] = $usuarioBD->getTipo();
                //Defino cookies que serão usados no jsf
                setcookie("user",$_SESSION['id_usuario'],time() + 5000,"/","localhost");
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
            setcookie("user","","/","localhost");
            session_destroy();
        }
    }

    public static function isLogado(){
        if (isset($_SESSION['logado']))
            return true;
        else
            return false;
    }

    public static function userLogado(){
        return $_SESSION['user'];
    }

    public static function tipoUserLogado(){
        return $_SESSION['tipo_usuario'];
    }

}

?>
