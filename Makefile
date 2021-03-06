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
postgres:
	docker exec -it postgres psql -U root postgres
seed:
	@docker-compose exec php php artisan db:seed
test:
	docker-compose exec php php artisan test
composer-dump:
	docker-compose exec php composer dump-auto
tinker:
	docker-compose exec php php artisan tinker
