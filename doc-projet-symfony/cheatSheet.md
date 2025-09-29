## Server

```
symfony serve
symfony server:start
symfony server:stop
```

## Après clonage d'un repo

```
composer install
(Si dépendences JS - npm install)
```

## GIT

```
git add .
git commit -m "message du commit"
git remote add origin https://repogit... # rejouter un repo remote
git remote origin # effacer le lien avec un repo remote
```

## Symfony

Après avoir configuré le fichier .env avec la connexion

```
# Rajouter les packages pour l'ORM

symfony composer req symfony/orm-pack
symfony composer req symfony/maker-bundle --dev
```

```
#Lancer la creation de la base de données
symfony console doctrine:database:create
```

# Création/update des entités

```
symfony console make:entity
```

(valable pour créer une nouvelle ou rejouter à une éxistante)

# Création des migrations, la lancer

```
symfony console make:migration
symfony console doctrine:migrations:migrate
```