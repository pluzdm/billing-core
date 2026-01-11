APP_SERVICE=app

up:
	docker compose up -d --build

down:
	docker compose down

restart:
	docker compose down
	docker compose up -d --build

ps:
	docker compose ps

logs:
	docker compose logs -f

bash:
	docker compose exec $(APP_SERVICE) bash

artisan:
	docker compose exec $(APP_SERVICE) php artisan $(filter-out $@,$(MAKECMDGOALS))

composer:
	docker compose exec $(APP_SERVICE) composer $(filter-out $@,$(MAKECMDGOALS))

migrate:
	docker compose exec $(APP_SERVICE) php artisan migrate

fresh:
	docker compose exec $(APP_SERVICE) php artisan migrate:fresh --seed

test:
	docker compose exec $(APP_SERVICE) php artisan test

%:
	@:
