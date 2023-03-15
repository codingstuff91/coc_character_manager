## A propos

Cette application web a pour objectif de faciliter la gestion des fiches de personnages de jeux de roles, pour le jeu "Chroniques Oubliées Contemporain"

## Technologies

Cette application a été crée grace aux technologies suivantes: 

- Laravel 9
- InertiaJs 2
- Vue js 3 / Vite / Pinia

Les outils d'analyse suivants ont été utilisés : 
- Laravel PINT : verification et correction des conventions de codage
- Larastan : outil d'analyse statique de code PHP

## Lancer le projet en local

Pour utiliser le projet en local il faut réaliser les taches suivantes : 

- Créer un fichier .env à la racine du projet en se basant sur le fichier .env.example
- Mettre le chemin absolu du fichier database.sqlite dans le fichier  .env dans la clé "DB_DATABASE"
- Executer la commande artisan : ``php artisan migrate:fresh --seed``
- Exécuter la commande : `npm run dev`
- Exécuter la commande : `php artisan serve`



