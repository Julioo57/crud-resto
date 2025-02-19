<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<form action="/AdminResto/index.php?action=login" method="POST">
    <h2>Connexion</h2>
    <!-- Email -->
    <label for="email">Email</label>
    <input type="email" id="mail" name="mail" required>
    <!-- Mot de passe -->
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>
    
    <button type="submit">Se connecter</button>
</form>
    <p>Pas encore de compte ? <a href="../front/register.php">Inscrivez-vous ici</a></p>
</body>
</html>
