install:
	docker run --rm -v $(shell pwd):/opt -w /opt -u $(shell id -u) laravelsail/php80-composer:latest composer install
	./vendor/bin/sail up -d
	./vendor/bin/sail php artisan key:generate
	./vendor/bin/sail php artisan migrate:fresh --seed

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
