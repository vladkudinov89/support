##Laravel Forum

## Getting started

Install the following packages prior to standing up your development environment:

- [Git](https://git-scm.com/)
- [docker](https://docs.docker.com/engine/installation/)
- [docker-compose](https://docs.docker.com/compose/install/)

Set your .env vars and then type:
```
git clone <this_repo>
cp .env.example .env
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan passport:install
docker-compose exec app php artisan migrate:fresh --seed
docker-compose exec frontend npm install
docker-compose exec frontend npm run watch-poll
```
## Usage

To start your containers you have only type next command:
```
make docker-up
