<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login to Your Account</h2>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p id="loginMessage"></p> <!-- Message d'erreur ou de succès -->
        <p>Don't have an account? <a href="register.html">Register</a></p>
    </div>
    <script src="auth.js"></script>
</body>
</html>

