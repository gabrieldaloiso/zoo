<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <h2>Inscription</h2>
    <form id="register-form">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form>
    <script src="js/auth.js"></script>
</body>
</html>