Projet de OGOUCHINA Nora (MIAD1)

Ce projet est une application de gestion de projets développée avec Laravel et Bootstrap. Il permet aux utilisateurs de :
✔️ Créer et gérer des projets
✔️ Assigner des tâches aux membres
✔️ Gérer les rôles et permissions
✔️ Recevoir des notifications par e-mail
✔️ Suivre l’évolution des tâches

Pour cloner le projet voici les étapes suivantes 
1. Installation et Configuration
🔹 Cloner le projet
Ouvrez un terminal et exécutez la commande :
git clone https://github.com/votre-utilisateur/gestion-projets.git
cd gestion-projets

🔹 Installer les dépendances
composer install
npm install

🔹 Configurer l’environnement
Copier le fichier .env
cp .env.example .env


Générer la clé d’application Laravel
php artisan key:generate

🔹 Configurer la base de données
Ouvrir .env et configurer votre base de données MySQL :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_projets
DB_USERNAME=root
DB_PASSWORD=

Créer la base de données :

CREATE DATABASE gestion_projets;
Lancer les migrations :
php artisan migrate --seed

 2. Lancer l’Application
🔹 Démarrer Laravel
php artisan serve
