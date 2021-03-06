<?php

session_start();

try{
    $db = new PDO("");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['pseudo']) && isset($_POST['password']))
    {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM utilisateur where pseudo = ?";
        $result = $db->prepare($sql);
        $result->execute(array($pseudo));
        $data = $result->fetch();


        if ($data != null) {

          if(password_verify($password,$data['password']))
          {
            $_SESSION['pseudo'] = $pseudo;
            header('Location:index.php');
          }
        }
        else
        {
            header('Location:connexion.php');
        }
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
