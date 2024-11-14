<?php
require ("../include/header.php");
?>

<body>
<?php
    require("../include/navbar.php");
    ?>
    <div class="container">
    <h2 id="name"></h2>
    <div id="carousel">
        <!-- Carrousel de photos ici -->
        
    </div>
    <p id="description">Description complète de l'animal.</p>
    

    <?php
    require("../include/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Function to load and display data in a table format
        async function loadEnclosures() {
      try {
        // Fetch the JSON data from the external file
        const response = await fetch('../scripts-front/crocodile.json');// replacer par l'url du script php qui genere l'info sur les animaux
        const data = await response.json();

        const titreCont = document.getElementById('name');
        titreCont.text=data.animal.name;

        const descriptionCont = document.getElementById('description');
        descriptionCont.innerHTML=data.animal.desc;

        const carousel = document.getElementById('carousel');
        const img = document.createElement('img');
        img.src="../assets/img/" + data.animal.img;
        img.className="img-fluid";
        carousel.appendChild(img);

      } catch (error) {
        console.error('Error loading JSON data:', error);
      }
    }

    // Load enclosures on page load
    document.addEventListener('DOMContentLoaded', loadEnclosures);
    </script>
  </body>
</html>