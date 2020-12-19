start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env || true
	php artisan key:gen --ansi
	touch database/database.sqlite || true
	php artisan migrate
	php artisan db:seed
	npm install @rails/ujs
	npm install

setup-local:
	composer install
	cp -n .env.example .env || true
	php artisan key:gen --ansi
	php artisan migrate
	php artisan db:seed
	npm install @rails/ujs
	npm install

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

test-coverage:
	composer phpunit tests -- --coverage-clover build/logs/clover.xml

test-stop:
	php artisan test --testsuite=Feature --stop-on-failure

deploy:
	git push heroku main

lint:
	composer phpcs

lint-fix:
	composer phpcbf

clean:
	php artisan cache:clear
	php artisan optimize
	php artisan route:clear
	php artisan view:clear
	php artisan config:clear

watch:
	npm run watch