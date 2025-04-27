🎯 Site Éducatif pour Enfants
Introduction
Ce projet est un site éducatif interactif destiné aux enfants, proposant différentes activités ludiques pour accompagner leur apprentissage. Développé avec Laravel et MySQL, il vise à offrir une expérience utilisateur simple et agréable pour les jeunes.

Features
Navigation intuitive entre différentes catégories d'activités éducatives.

Espace administrateur sécurisé pour la gestion du contenu.

Ajout, modification et suppression de catégories et d'objets éducatifs.

Quiz et jeux éducatifs interactifs.

Authentification protégée avec Laravel.

Installation
Clonez le dépôt et configurez votre environnement Laravel pour commencer à utiliser le site :

bash
Copier
Modifier
git clone https://github.com/ton-projet/site-educatif-enfants
Puis suivez les étapes classiques d'installation Laravel :

bash
Copier
Modifier
composer install
npm install && npm run dev
php artisan migrate
php artisan serve
Usage
Le site est structuré autour d'une architecture MVC (Modèle-Vue-Contrôleur) :

Les modèles gèrent l'interaction avec la base de données.

Les contrôleurs assurent la logique métier et le traitement des données.

Les vues présentent l'interface utilisateur.

L'espace administrateur permet aux responsables de créer de nouvelles catégories et d'ajouter des contenus éducatifs facilement sans toucher au code.

Structure and Components
routes/web.php : Définit les routes principales du site.

app/Models/Category.php : Modèle pour les catégories d'activités.

app/Models/CategoryObject.php : Modèle pour les objets éducatifs.

app/Http/Controllers/CategoryController.php : Contrôleur pour la gestion des catégories et objets.

resources/views/ : Contient toutes les vues du frontend et de l'administration.

database/migrations/ : Migrations des tables Category et CategoryObject.

Detailed Functionality
L'espace administrateur est protégé par le système d'authentification de Laravel.

La base de données repose sur deux tables principales : Category (catégories d’activités) et CategoryObject (contenus éducatifs).

Les quiz et jeux sont intégrés directement dans les catégories pour rendre l'apprentissage plus engageant.

Optimisation de l'affichage pour une utilisation sur PC et tablette.

Team and Responsibilities
JAMAI Salma :

Développement backend avec Laravel (modèles, contrôleurs, routes).

Création de l'espace administrateur et du système d'authentification.

EL-BEGRAJ Yousra :

Développement frontend et design du site.

Création des pages principales et des jeux éducatifs.

Collecte des données pour le contenu éducatif.

ABOURI Saad :

Design des pages d'authentification (login/register) et des catégories.

Amélioration de l'expérience utilisateur.

Participation à la collecte de données éducatives.

Future Improvements
Mise en place d'un système de niveaux de difficulté pour les activités.

Ajout d'animations pour améliorer l'interactivité avec les enfants.

Optimisation du site pour les supports mobiles.
