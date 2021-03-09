setup:
	docker run --rm -v $(shell pwd):/opt -w /opt -u $(shell id -u) laravelsail/php80-composer:latest composer install
	cp .env.example .env

start:
	./vendor/bin/sail up -d

stop:
	./vendor/bin/sail down

lint:
	./vendor/bin/sail composer phpcs
	./vendor/bin/sail composer phpstan

test:
	./vendor/bin/sail artisan test	