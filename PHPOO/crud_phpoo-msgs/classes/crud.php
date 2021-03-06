<?php
require_once 'connection.php';
$conn = new Connection();
$pdo = $conn->pdo;

/* Classe que trabalha com um crud, lidando com uma tabela por vez, que é fornecida a cada instância, desde a conexão com o banco */

class Crud extends Connection
{
	public $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

    function validateDate($date, $format = 'Y-m-d'){
        $b = DateTime::createFromFormat($format, $date);
        return $b && $b->format($format) === $date;
    }

    public function insert(){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nascimento = $_POST['nascimento'];
        $cpf = $_POST['cpf'];

        if(!$this->validateDate($nascimento)){
		    header("location: index.php?msg=Esta data é inválida&color=red&data=$nascimento");  
            exit;
        }

       try{
           $stmte = $this->pdo->prepare("INSERT INTO clientes(nome,email,nascimento,cpf) VALUES (?, ?, ?, ?)");
           $stmte->bindParam(1, $nome , PDO::PARAM_STR);
           $stmte->bindParam(2, $email , PDO::PARAM_STR);
           $stmte->bindParam(3, $nascimento , PDO::PARAM_STR);
           $stmte->bindParam(4, $cpf , PDO::PARAM_INT);
           $executa = $stmte->execute();
         
           if($executa){
               return true;
           }else{
               return false;
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
    }

    public function delete($id){
        $sql = "DELETE FROM clientes WHERE id = :id";
        try{
            $sth = $this->pdo->prepare($sql);
            $sth->bindParam(':id', $id, PDO::PARAM_INT);   

            if( $sth->execute()){
                return true;
            }else{
                return false;
            }
        }
        catch(PDOException $e){
           echo $e->getMessage();
        }
    }

    public function update(){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nascimento = $_POST['nascimento'];
        $cpf = $_POST['cpf'];

        $sql = "UPDATE clientes SET nome = :nome, email = :email, nascimento = :nascimento, cpf = :cpf WHERE id = :id";

        try{
            $sth = $this->pdo->prepare($sql);
            $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
            $sth->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);   
            $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);   
            $sth->bindParam(':nascimento', $_POST['nascimento'], PDO::PARAM_STR);   
            $sth->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_INT);   

            if($sth->execute()){
                return true;
            }else{
                return false;
            }
        }
        catch(PDOException $e){
           echo $e->getMessage();
        }

    }
}
