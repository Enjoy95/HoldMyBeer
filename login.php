<?php

session_start();

try{
    $db = new PDO("mysql:host=localhost;dbname=db_holdmybeer","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo"je suis là";
        
    if(isset($_POST['pseudo']) && isset($_POST['pass']))
    {
        echo"g raté le NNN";
        $pseudo = $_POST['pseudo'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM users where pseudo = ?";
        $result = $db->prepare($sql);
        $result->execute(array($pseudo));
            
        if($result->rowCount() > 0)
        {
            
            $data = $result->fetch();

            if(password_verify($pass,$data['password']))
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