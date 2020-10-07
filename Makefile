up:
	docker-compose up -d
build:
	docker-compose up --build -d
down:
	docker-compose down
bash:
	docker-compose exec php bash
cc:
	docker-compose exec php php artisan config:cache
migrate:
	docker-compose exec php php artisan migrate
migrate-refresh:
	docker-compose exec php php artisan migrate:refresh
show-containers: #show all working containers
	@docker ps
