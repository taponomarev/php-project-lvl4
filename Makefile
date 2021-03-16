setup:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
	npm install

install:
	docker run --rm -v $(shell pwd):/opt -w /opt -u $(shell id -u) laravelsail/php80-composer:latest composer install
	stat .env || cp .env.example .env

start:
	./vendor/bin/sail up -d

stop:
	./vendor/bin/sail down

lint:
	./vendor/bin/sail composer phpcs
	./vendor/bin/sail composer phpstan

test:
	./vendor/bin/sail artisan test

lint-fix:
	./vendor/bin/sail composer phpcbf

deploy:
	git push heroku main
