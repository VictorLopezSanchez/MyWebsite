# MyWebsite

### Let’s start Docker !

Execute all configurations that we set up: `docker-compose build`

Launch your containers: `docker-compose up -d`

Container have one root access by default:
 - PHP access: `docker exec -it -u dev sf4_php bash`
 - MySQL access: `docker exec -it -u sf4_mysql bash`