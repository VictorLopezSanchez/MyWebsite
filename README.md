# MyWebsite

### Let’s start Docker !

Launch your containers: `docker-compose up -d`

Container have one root access by default:
 - PHP access: `docker exec -it -u dev sf4_php bash`
 - MySQL access: `docker exec -it -u sf4_mysql bash`
 
Install Portainer (https://portainer.io/) to visualize containers from Docker.

### Start Symfony

To install:
 - Add to /etc/hosts: `127.0.0.1 symfony-docker.localhost`
 - Copy .env.dist to .env files
 - Get permissions to `var` folder 
 - Execute: `composer install`