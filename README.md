# api_plateform_jwt

### installation

## dans le terminal du projet :

 - docker-compose up -d

## une fois les container creer :
 - docker exec -ti www_api_project bash
 - cd api_project

## itinialisation des dependances :
- composer install
- php bin/console lexik:jwt:generate-keypair

## configuration de la bdd :
- creer un .env.local avec :
### DATABASE_URL="mysql://root:@db_dev_docker:3306/api?serverVersion=8&charset=utf8mb4"
puis dans le terminal
- php bin/console d:d:c
- php bin/console d:m:m
- php bin/console d:f:l

Ensuite :
- Api accessible sur localhost:8000/api
- Php My Admin sur localhost:8000 , user Root / pas de password (dev uniquement)
- pour se logger : localhost:8000/api/login_check (Json attendu {email:"admin@admin.fr",password:"admin"})
- les routes accessible sont visible dans la doc de api_plateform / token obligatoire

Tester avec Postman