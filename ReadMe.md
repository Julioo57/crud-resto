# 🍽️ Restaurant Administratif - Projet de Gestion

## 🚀 Description

Le projet **Restaurant Administratif** est une application web développée pour la gestion des prestations et des utilisateurs dans un restaurant administratif. L'application permet de séparer les accès entre les clients, qui peuvent consulter les prestations et tarifs, et les administrateurs, qui ont la possibilité de gérer les prestations, les utilisateurs et les commandes.

## 🛠️ Technologies utilisées

- **Backend** : PHP, MySQL
- **Frontend** : HTML, CSS, Bootstrap, JavaScript
- **Base de données** : MySQL
- **Serveur local** : XAMPP (Apache, PHP, MySQL)
- **Authentification** : Sécurisation avec hachage des mots de passe et gestion des rôles

## 🎯 Fonctionnalités

### Côté client
- **Authentification** : Les utilisateurs doivent s'authentifier pour consulter les prestations et tarifs.
- **Consultation des prestations** : Les clients peuvent consulter le menu, les prix, et les descriptions des plats.

### Côté administrateur
- **Authentification sécurisée** : L’accès administrateur est protégé et permet de gérer l’application de manière sécurisée.
- **Gestion des prestations** : Ajout, modification, et suppression des plats (CRUD).
- **Gestion des utilisateurs** : Les administrateurs peuvent gérer les comptes des utilisateurs (clients), en les ajoutant, modifiant ou supprimant.
- **Gestion des commandes** : Suivi des commandes passées par les clients, avec statut et détails.

---

## 📝 Installation

### Prérequis
- **Serveur local** : XAMPP ou autre serveur avec support PHP et MySQL.
- **Navigateur** : Chrome, Firefox, ou autre compatible.

### Étapes d'installation

1. **Télécharger le code source** : Clonez ou téléchargez le projet depuis [GitHub](https://github.com/Julioo57/crud-resto).
2. **Installer XAMPP** : Si vous ne l'avez pas encore, installez XAMPP pour exécuter le serveur local.
3. **Configurer la base de données** : Importez le fichier de la base de données dans PHPMyAdmin en suivant les identifiants fournis.
   - **Base de données** : `restaurant_admin`
   - **Identifiants PHPMyAdmin** :
     - **Utilisateur** : `2p549h_examenBts`
     - **Mot de passe** : `Ex@m2025`
4. **Lancer XAMPP** : Démarrez Apache et MySQL via le panneau de contrôle XAMPP.
5. **Accéder à l'application** : Ouvrez un navigateur et allez à `http://localhost/restaurant/` pour consulter le site en local.

---

## 🌐 Accès en ligne

L'application est également accessible en ligne à l'adresse suivante :  
**[restaurant.julesanduze.fr](https://restaurant.julesanduze.fr/)**

### Identifiants d'administration
- **Utilisateur** : `examen2025@gmail.com` (adresse fictive)
- **Mot de passe** : `Examen2025`

---

## 📊 Structure de la base de données

1. **Utilisateurs** : Stocke les informations des clients et administrateurs.
2. **Plats** : Contient les informations sur les plats, y compris les prix et descriptions.
3. **Commandes** : Suivi des commandes passées, avec état et détails.

---

## 🔐 Sécurisation

- **Mots de passe** : Stockés de manière sécurisée avec un algorithme de hachage.
- **Contrôle d'accès** : Séparation des accès entre utilisateurs et administrateurs.

---

## 💡 Guide d'utilisation

### Côté Client :
1. **Inscription et connexion** via formulaire sécurisé.
2. **Consultation du menu et des tarifs.**
3. **Passer une commande** et suivre son état en temps réel.

### Côté Administrateur :
1. **Connexion sécurisée** via l'interface d'administration.
2. **Gestion des prestations** (CRUD : Créer, Lire, Modifier, Supprimer).
3. **Gestion des utilisateurs** : Ajouter, modifier ou supprimer des utilisateurs.
4. **Suivi des commandes** et gestion des statuts des commandes.

---

## 📂 Ressources supplémentaires

- **PHP Documentation** : [php.net](https://www.php.net/)
- **MySQL Documentation** : [dev.mysql.com](https://dev.mysql.com/)
- **Bootstrap Documentation** : [getbootstrap.com](https://getbootstrap.com/)

---

## 📞 Contact

**Auteur** : Jules Anduze  
**Email** : [examen2025@gmail.com](mailto:examen2025@gmail.com)  
**GitHub** : [https://github.com/Julioo57/crud-resto](https://github.com/Julioo57/crud-resto)

---