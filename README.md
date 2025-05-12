     Site Éducatif pour Enfants
     Présentation
Ce projet est un site éducatif destiné aux enfants, proposant différentes activités ludiques pour accompagner leur apprentissage.
Le site offre une navigation simple entre plusieurs catégories

     Technologies utilisées
Laravel (Framework PHP)

HTML / CSS (Frontend)

MySQL (Base de données)

     Fonctionnalités principales
Navigation entre différentes catégories d'activités éducatives.

Espace administrateur sécurisé permettant :

L'ajout de nouvelles catégories.

L'ajout de nouveaux contenus (objets éducatifs).

La modification et la suppression du contenu existant.

     Partie technique
Le projet suit l'architecture MVC (Modèle - Vue - Contrôleur) de Laravel :

Modèles : pour interagir avec la base de données.

Contrôleurs : pour la logique de traitement des données.

Vues : pour l'affichage des interfaces utilisateur.

La base de données repose sur deux tables principales :

Category : stocke les catégories d'activités.

CategoryObject : stocke les contenus liés à chaque catégorie.

Une authentification Laravel protège l’accès à l’espace administrateur.
Pour acceder à l'interface admin: on ajoute "/admin" dans l'url.

     Évolution du projet
Initialement développé comme un site statique avec des pages et catégories codées en dur.

Progressivement transformé en site dynamique administrable grâce à l’intégration d’un tableau de bord d'administration.

     Répartition des rôles dans l'équipe:

JAMAI Salma :

Développement du backend avec Laravel : création des modèles, des contrôleurs et des routes pour la gestion des données.

Création de la page administrateur : interfaces pour l’ajout, la modification et la suppression des catégories et objets éducatifs. 
Mise en place du système d'authentification pour sécuriser l’accès à l'administration.

EL-BAGRAJ Yousra:

Développement du frontend et design du site.
Création des pages principales : affichage des données, des objets éducatifs et de la page d'accueil.
Création des quiz et des jeux
Collecte des données nécessaires pour le contenu éducatif.

ABOURI Saad
Mise en place du design des pages login et register.
Mise en place du design des catégories pour une meilleure expérience utilisateur.

Collecte des données nécessaires pour le contenu éducatif.

    Améliorations futures possibles

Mise en place d'un système de niveaux de difficulté pour les activités.

Ajout d'animations pour améliorer l'interactivité avec les enfants.

Optimisation pour les supports mobiles.

