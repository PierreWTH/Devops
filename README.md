# docker-symfony-phpmyadmin

Créer un nouveau projet Symfony avec Docker.

Lancer la stack :

- `docker-compose up`

Vous devez être le propriétaire des fichier (utilisateur courant) :

- `sudo chown -R $USER ./`

Si besoin, connexion au container www_docker_symfony :

- `docker exec -it www_docker_symfony bash`

URL :

- [site](http://127.0.0.1:8741)
- [pma](http://127.0.0.1:8080) (login:root, pwd:vide)
- [maildev](http://127.0.0.1:8081)

Note :

- le fichier `docker-compose.yml` fonctionne de pair avec `/php/Dockerfile`

Source :
[YoanDev.co](https://yoandev.co/un-environnement-de-developpement-symfony-5-avec-docker-et-docker-compose)

Avant de lancer les tests :

```
php bin/console doctrine:database:create --env=test
php bin/console doctrine:schema:update --force --env=test
php bin/console doctrine:fixtures:load --env=test

```
