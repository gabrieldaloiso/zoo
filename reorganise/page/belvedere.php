<?php
require ("../include/header.php");
?>
<body>
<?php
    require("../include/navbar.php");
    ?>
    <div class="container">
        <h1> les animaux du belvedere</h1>
        <div id="enclosures-container"></div>
</div>
    <?php
    require("../include/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Function to load and display data in a table format
        async function loadEnclosures() {
      try {
        // Fetch the JSON data from the external file
        const response = await fetch('../scripts-front/test-belvedere.json'); // replacer par l'url du script php qui genere l'affichage des enclos et animaux du biome
        const data = await response.json();

        const container = document.getElementById('enclosures-container');

        data.enclosures.forEach(enclosure => {
          // Create a table for each enclosure
          const table = document.createElement('table');
          table.className = 'table table-striped';

          // Create a header for the enclosure
          const header = document.createElement('thead');
          header.innerHTML = `
            <tr class="table-primary">
              <th colspan="3">${enclosure.name} - <a href="enclosure_detail.php?id=${enclosure.enclosureId}">Voir détails</a></th>
            </tr>
            <tr>
              <th>Animaux</th>
              <th>Heure des repas</th>
              <th>Plus d'infos</th>
            </tr>
          `;
          table.appendChild(header);

          // Create table body for animal data
          const tbody = document.createElement('tbody');
          enclosure.animals.forEach(animal => {
            const row = document.createElement('tr');
            row.innerHTML = `
              <td>${animal.species}</td>
              <td>${animal.horaires}</td>
              <td><a href="animal_detail.php?id=${animal.animalId}">Voir détails</a></td>
            `;
            tbody.appendChild(row);
          });
          table.appendChild(tbody);

          // Append the table to the container
          container.appendChild(table);
        });
      } catch (error) {
        console.error('Error loading JSON data:', error);
      }
    }

    // Load enclosures on page load
    document.addEventListener('DOMContentLoaded', loadEnclosures);
    </script>
  </body>
</html>