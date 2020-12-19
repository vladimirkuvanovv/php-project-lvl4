### Hexlet tests and linter status:
[![Actions Status](https://github.com/vladimirkuvanovv/php-project-lvl4/workflows/hexlet-check/badge.svg)](https://github.com/vladimirkuvanovv/php-project-lvl4/actions?query=workflow%3Ahexlet-check)

[![Laravel-CI](https://github.com/vladimirkuvanovv/php-project-lvl4/workflows/Laravel-CI/badge.svg)](https://github.com/vladimirkuvanovv/php-project-lvl4/actions?query=workflow%3ALaravel-CI)

[![Maintainability](https://api.codeclimate.com/v1/badges/703a70696038b44dd407/maintainability)](https://codeclimate.com/github/vladimirkuvanovv/php-project-lvl4/maintainability)

[![Test Coverage](https://api.codeclimate.com/v1/badges/703a70696038b44dd407/test_coverage)](https://codeclimate.com/github/vladimirkuvanovv/php-project-lvl4/test_coverage)

Ссылка на проект: https://shrouded-ravine-40892.herokuapp.com/

### Requirements

* PHP ^7.3.0
* Extensions: mbstring, curl, dom, xml,zip, psql_pdo
* Composer
* Node.js & npm
* PostgreSQL for local
* [heroku cli](https://devcenter.heroku.com/articles/heroku-cli#download-and-install)

### Configure database

Include this in your `.env` with appropriate settings for PostgreSQL:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=password
```
Create a database using PostgreSQL and check it from console

Include this in your `.env` with appropriate settings for SQLite:
```
DB_CONNECTION=sqlite
```

### Setup

If you use PostgreSQL run:

```sh
$ make setup-local
```

If you work with SQLite run:

```sh
$ make setup
```

### Run server

```sh
$ make start
```