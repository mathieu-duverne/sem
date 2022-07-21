# SEM

Centralisation d'indicateur clé 

## Requis :

Important : lancer les commandes pour checker les versions

  - Symfony = 6.0.8 `php bin/console about`
  - PHP >= 8.0 `php -v`
  - postgresql >= 14 `psql --version`

## Symfony

Avant tout vous devez checker les modules php nécessaires à symfony avec la commande : 
  - `symfony check:requirements` 
Tant que vous n'obtenez pas le message "your system is ready to run Symfony projects" en vert : 
  - vous devez ajoutez / mettre à jour les modules listé necessaires aux bon fonctionnements de Symfony.

Conseil : Vous pouvez listé les modules PHP actifs avec la commande `php -m`

## PostgreSQL

Téléchargez la bonne version : https://www.postgresql.org/download/ 

### Ubuntu

  - Lancez `sudo su postgres`
  - Connect `psql -U postgres`
  - Aide & commande `\?`
  
### Windows

### Mac

## Configuration & lancement :

  - Création de la base de données via la commande `php bin/console doctrine:database:create` 
  - Migrations de la base de données : `php bin/console doctrine:migrations:migrate`
  - Lancer le server Symfony : `symfony server:start / server:stop`

## Pratiques :

## Gitignore :
