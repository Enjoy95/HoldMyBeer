<?php
  $title="Accueil";
  require_once "./include/functions.inc.php";
  require "./include/header.inc.php"; 
?>

    <section class="home" id="home">
      <div class="content">
        <h2>Let's beer up</h2>
        <p>
          Sur ce site, viens trouver à ta guise le bar ou la bière qui
          correspond à tes goûts et surtout ta soif !
        </p>
        
        <?php 
          if(isset($_SESSION['pseudo'])){
            echo "Bonjour " . $_SESSION['pseudo'];
          }
        ?>

      </div>
      <!----Search bar--->
      <div class="searchBar">
        <input
          id="searchQueryInput"
          type="text"
          name="searchQueryInput"
          placeholder="Que recherchez vous ?.."
          value=""
        />
        <button
          id="searchQuerySubmit"
          type="submit"
          name="searchQuerySubmit"
          class="fas fa-search"
        ></button>
      </div>
    </section>

<?php
  require "./include/footer.inc.php";
?>
