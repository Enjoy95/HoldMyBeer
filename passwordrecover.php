<?php

    $db = new PDO("");
    if(isset($_GET['u']) && !empty($_GET['u']) && isset($_GET['token']) && !empty($_GET['token'])){
      $u = htmlspecialchars(base64_decode($_GET['u']));
      $token = htmlspecialchars(base64_decode($_GET['token']));

      $check = $db->prepare("SELECT * FROM password_recover WHERE token_user = ? AND token = ? ");
      $check->execute(array($u,$token));
      $row = $check->rowCount();

      if($row){
        $get = $db->prepare("SELECT token FROM utilisateur WHERE token = ?");
        $get->execute(array($u));
        $data_u = $get->fetch();

        if(hash_equals($data_u['token'],$u)){
          header("Location:passwordchange.php?u=".base64_encode($u));
        }else{
          echo "lien non valide";
        }
      }else{
        echo "lien non valide";
      }
    }else{
      echo "lien non valide";
      //lien non valide
    }


    ?>
