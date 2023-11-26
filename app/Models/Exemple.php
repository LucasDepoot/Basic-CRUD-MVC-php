<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Exemple extends CoreModel
{
    private $name;
    private $email;

    // Cherche toutes les donnees
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `exemple`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }
    // Ajoute un ligne de donnee
    public function exempleAdd()
    {
        $pdo = Database::getPDO();
        $sql = "INSERT INTO `exemple` (name, email)
        VALUE ( :name, :email )
        ";
        $pdoStatement = $pdo->prepare($sql);
        $insertExemple = $pdoStatement->execute(
            [
                'name'=> $this->name,
                'email'=>$this->email
            ]
        );
        return $insertExemple ;
    }
    // Cherche les donnees d un emxemple par l id  
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `exemple` WHERE `id` ='.$id;
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }
    // Mets a jour un exemple
    public function exempleUpdate()
    {
        $pdo = Database::getPDO();
        $sql = "UPDATE `exemple` SET
        `name` = :name,
        `email` = :email,
        `updated_at` = now()
        WHERE `id` = :id;
        ";
        $pdoStatement = $pdo->prepare($sql);
        $updateExemple = $pdoStatement->execute(
            [
            'name'=> $this->name,
            'email'=>$this->email,
            'id'=>$this->id 
            ]
            );
    }  
    // efface un exemple
    public static function delete($id)
    {
        $pdo = Database::getPDO();
        
        $sql = 'DELETE FROM `exemple`
        WHERE `id` = :id;';

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $deleteOk = $pdoStatement->execute();
    }





//-------------Geters & Setters------------//
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}