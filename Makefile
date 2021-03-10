setup:
	composer install
		cp -n .env.example .env|| true
		touch database/database.sqlite
		docker run --rm -v $(shell pwd):/opt -w /opt -u $(shell id -u) laravelsail/php80-composer:latest composer install

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
	composer phpcbf	

deploy:
	git push heroku main	