#!make
WEB_SERVICE_NAME=web
EXEC_USER=www-data

.PHONY: build
build:
	docker-compose up -d --build

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

.PHONY: bash
bash:
	docker-compose exec -w /var/www/html -u ${EXEC_USER} ${WEB_SERVICE_NAME} bash

.PHONY: cbash
cbash:
	docker-compose exec ${WEB_SERVICE_NAME} bash
