up: down-containers kill-containers up-containers composer clear-cache copy-files migrations-seeds node node_modules generate-key create-final-assets

down-containers:
	@docker-compose down

kill-containers:
	@docker-compose kill

up-containers:
	@docker-compose up -d

clear-cache:
	@docker exec -it sandbox-app php artisan clear-compiled
	@docker exec -it sandbox-app composer dump-autoload

node:
	@docker exec -it sandbox-app sudo apk update
	@docker exec -it sandbox-app sudo apk add --update nodejs nodejs-npm

node_modules:
	@docker exec -it sandbox-app rm -rf node_modules
	@docker exec -it sandbox-app npm install

composer:
	@docker exec -it sandbox-app rm -rf vendor/
	@docker exec -it sandbox-app composer install

copy-files:
	@docker exec -it sandbox-app cp .env.example .env

generate-key:
	@docker exec -it sandbox-app php artisan key:generate

migrations-seeds:
	@docker exec -it sandbox-app php artisan migrate:refresh --seed

bash:
	@docker exec -it sandbox-app /bin/bash

create-symlink:
	@docker exec -it sandbox-app php artisan storage:link

create-final-assets:
	@docker exec -it sandbox-app npm run dev

# For CI
up-ci: down-containers kill-containers up-containers add-to-group project-permissions composer clear-cache copy-files migrations-seeds node node_modules generate-key create-final-assets

add-to-group:
	@docker exec -it sandbox-app sudo apk --no-cache add shadow
	@docker exec -it sandbox-app sudo usermod -a -G www-data ambientum

project-permissions:
	@docker exec -it sandbox-app sudo chmod -R 777 /var/www