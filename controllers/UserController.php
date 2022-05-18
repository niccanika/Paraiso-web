<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/database/Settings.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/models/User.php";

class UserController
{
    public function register(User $user):bool {
        try {
            $pdo = Settings::getPDO();
            $sql = "INSERT INTO users (name, email, password, age, role) VALUES (:name, :email, :password, :age, :role)";
            $passwordHash = password_hash($user->getPassword(), PASSWORD_ARGON2ID);
            $stmnt = $pdo->prepare($sql);

            $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $query->bindParam(':email', $_POST['email']);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result and count($result) != 0)
            {
                header("location:/views/register-form.php?msg=failed");
                return false;
            }
            else {


                $stmnt->bindValue(':name', $user->getName());
                $stmnt->bindValue(':age', $user->getAge());
                $stmnt->bindValue(':email', $user->getEmail());
                $stmnt->bindValue(":password", $passwordHash);
                $stmnt->bindValue(":role", $user->getRole());

                $stmnt->execute();
                return true;
            }
        } catch (Exception $e) {
            throw new Exception("Registration error");
        }
    }


}