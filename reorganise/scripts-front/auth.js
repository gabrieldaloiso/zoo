// auth.js

// Sélectionne le formulaire et le champ de message
const loginForm = document.getElementById("loginForm");
const loginMessage = document.getElementById("loginMessage");

loginForm.addEventListener("submit", async function(e) {
    e.preventDefault(); // Empêche le rechargement de la page

    // Récupère les valeurs des champs email et mot de passe
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        // Envoie une requête POST vers l'API de login
        const response = await fetch("http://localhost/backend/login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        });

        // Analyse la réponse JSON
        const result = await response.json();

        if (result.success) {
            // Si la connexion est réussie
            loginMessage.textContent = "Login successful! Redirecting...";
            loginMessage.style.color = "green";
            // Redirection vers la page de profil après 2 secondes
            setTimeout(() => {
                window.location.href = "profile.html";
            }, 2000);
        } else {
            // Si la connexion échoue
            loginMessage.textContent = "Login failed: " + result.message;
            loginMessage.style.color = "red";
        }
    } catch (error) {
        // Gestion des erreurs
        loginMessage.textContent = "An error occurred: " + error.message;
        loginMessage.style.color = "red";
    }
});
