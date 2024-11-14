<?php
require ("../include/header.php");
?>

<body>
<?php
    require("../include/navbar.php");
    ?>
    <div class="container">
    <h2>Détails de l'Enclos Id <? echo $_GET['id']; ?></h2>
    <div class="carousel">
        <!-- Carrousel de photos ici -->
    </div>
    <p>Description complète de l'enclos.</p>
    <h3>Notes et Avis</h3>
    <form id="review-form">
        <textarea placeholder="Laissez un avis..."></textarea>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    require("../include/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>