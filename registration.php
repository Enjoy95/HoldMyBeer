<?php

session_start();

try{

    $db = new PDO("mysql:host=localhost;dbname=db_holdmybeer","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['pseudo']) && isset($_POST['pass'])){
        
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_retype = $_POST['pass-retype'];

        $sql = "SELECT * FROM users where pseudo = '$pseudo'";
        $result = $db->prepare($sql);
        $result->execute();

        if($result->rowCount()  > 0){
            header('Location:inscription.php');
        }else
        {
            if($pass == $pass_retype)
            {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (pseudo,email,password) VALUES (?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($pseudo,$email,$pass));
                
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