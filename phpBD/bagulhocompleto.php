<?php
  
class DaoUsuario {
  
    public static $instance;
  
    private function __construct() {
        //
    }
  
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoUsuario();
  
        return self::$instance;
    }
  
    public function getNextID() {
        try {
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='usuario'";
            $result = Conexao::getInstance()->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC);
            return $final_result['Auto_increment'];
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function Inserir(PojoUsuario $usuario) {
        try {
            $sql = "INSERT INTO usuario (    
                nome,
                email,
                senha,
                ativo,
                cod_perfil)
                VALUES (
                :nome,
                :email,
                :senha,
                :ativo,
                :cod_perfil)";
  
            $p_sql = Conexao::getInstance()->prepare($sql);
  
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":senha", $usuario->getSenha());
            $p_sql->bindValue(":ativo", $usuario->getAtivo());
            $p_sql->bindValue(":cod_perfil", $usuario->getPerfil()->getCod_perfil());
  
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function Editar(PojoUsuario $usuario) {
        try {
            $sql = "UPDATE usuario set
    nome = :nome,
                email = :email,
                ativo = :ativo,
                cod_perfil = :cod_perfil WHERE cod_usuario = :cod_usuario";
  
            $p_sql = Conexao::getInstance()->prepare($sql);
  
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":ativo", $usuario->getAtivo());
            $p_sql->bindValue(":cod_perfil", $usuario->getPerfil()->getCod_perfil());
            $p_sql->bindValue(":cod_usuario", $usuario->getCod_usuario());
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
     
        public function EditarComSenha(PojoUsuario $usuario) {
        try {
            $sql = "UPDATE usuario set
                nome = :nome,
                email = :email,
                ativo = :ativo,
                senha = :senha,
                cod_perfil = :cod_perfil WHERE cod_usuario = :cod_usuario";
  
            $p_sql = Conexao::getInstance()->prepare($sql);
  
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":ativo", $usuario->getAtivo());
            $p_sql->bindValue(":senha", $usuario->getSenha());
            $p_sql->bindValue(":cod_perfil", $usuario->getPerfil()->getCod_perfil());
            $p_sql->bindValue(":cod_usuario", $usuario->getCod_usuario());
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
     
    public function AlterarSenhaAlreadyCripted($cod_usuario, $senha_nova_md5) {
        try {
  
                $sql = "UPDATE usuario set
                senha = :senha_nova
                WHERE
                cod_usuario = :cod_usuario";
  
                $p_sql = Conexao::getInstance()->prepare($sql);
  
                $p_sql->bindValue(":senha_nova", $senha_nova_md5);
                $p_sql->bindValue(":cod_usuario", $cod_usuario);
  
                return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }
  
    public function AlterarSenha($cod_usuario, $senha_antiga, $senha_nova) {
        try {
  
            $pojoUsuario = $this->BuscarPorCOD($cod_usuario);
            if ($pojoUsuario->getSenha() == md5(trim(strtolower($senha_antiga)))) {
  
                $sql = "UPDATE usuario set
                senha = :senha_nova
                WHERE
                cod_usuario = :cod_usuario
                and senha = :senha_antiga";
  
                $p_sql = Conexao::getInstance()->prepare($sql);
  
                $p_sql->bindValue(":senha_nova", md5(trim(strtolower($senha_nova))));
                $p_sql->bindValue(":senha_antiga", md5(trim(strtolower($senha_antiga))));
                $p_sql->bindValue(":cod_usuario", $cod_usuario);
  
                return $p_sql->execute();
            }
            else
                return false;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM usuario WHERE cod_usuario = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function BuscarPorEmailSenha($email, $senha) {
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email and senha = :senha";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->bindValue(":senha", $senha);
            $p_sql->execute();
            return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function BuscarPorCOD($cod) {
        try {
            $sql = "SELECT * FROM usuario WHERE cod_usuario = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function BuscarPorEmail($email) {
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();
            return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM usuario order by nome";
            $result = Conexao::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
  
            foreach ($lista as $l)
                $f_lista[] = $this->populaUsuario($l);
  
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    public function BuscarTodos_Ativo() {
        try {
            $sql = "SELECT * FROM usuario WHERE ativo = 's' order by nome";
            $result = Conexao::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
  
            foreach ($lista as $l)
                $f_lista[] = $this->populaUsuario($l);
  
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
  
    private function populaUsuario($row) {
        $pojo = new PojoUsuario;
        $pojo->setCod_usuario($row['cod_usuario']);
        $pojo->setNome($row['nome']);
        $pojo->setEmail($row['email']);
        $pojo->setSenha($row['senha']);
        $pojo->setAtivo($row['ativo']);
        $pojo->setPerfil(ControllerPerfil::getInstance()->BuscarPorCOD($row['cod_perfil']));
        return $pojo;
    }
  
}
?>