<?php
require ("../include/header.php");
?>
<body>
<?php
    require("../include/navbar.php");
    ?>
    <header>
        <h1>Nos Services</h1>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="enclosures.html">Enclos</a>
            <a href="services.html">Services</a>
            <a href="login.html">Connexion</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Restaurants</h2>
            <article class="service-card">
                <h3>Le Snack du Parc</h3>
                <p>Snack proposant des sandwichs, boissons et glaces.</p>
            </article>
            <article class="service-card">
                <h3>Le Restaurant La Forêt</h3>
                <p>Restaurant avec une vue sur la forêt, proposant des plats locaux.</p>
            </article>
        </section>

        <section>
            <h2>Boutiques</h2>
            <article class="service-card">
                <h3>Boutique Souvenirs</h3>
                <p>Souvenirs, jouets et cadeaux pour toute la famille.</p>
            </article>
        </section>

        <section>
            <h2>Autres Services</h2>
            <article class="service-card">
                <h3>Zone de Jeux pour Enfants</h3>
                <p>Espace de jeux sécurisé pour les enfants.</p>
            </article>
            <article class="service-card">
                <h3>Espace de Détente</h3>
                <p>Zone de détente avec bancs et espaces ombragés.</p>
            </article>
        </section>
    </main>
    <?php
    require("../include/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>