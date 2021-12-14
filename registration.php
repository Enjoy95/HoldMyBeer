<?php

session_start();

try{

    $db = new PDO("");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['pseudo']) && isset($_POST['password'])){

        $pseudo = $_POST['pseudo'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $pass_retype = $_POST['pass-retype'];

        $sql = "SELECT * FROM Utilisateur where pseudo = '$pseudo'";
        $result = $db->prepare($sql);
        $result->execute();

        if($result->rowCount()  > 0){
            header('Location:inscription.php');
        }else
        {
            if($password == $pass_retype)
            {
                $password = password_hash($password,  PASSWORD_BCRYPT);
                $sql = "INSERT INTO Utilisateur (pseudo,mail,password) VALUES (?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($pseudo,$mail,$password));

                echo $sql;
                print_r(array($pseudo,$mail,$password));

                $_SESSION['pseudo'] = $pseudo;

                header('Location:index.php');
            }

        }


    }

}catch(PDOException $e){
    echo $e->getMessage();
    exit;
}



?>
