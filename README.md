# Task manager

Task Manager is a task management system similar to http://www.redmine.org/. It allows you to set tasks, assign performers and change their statuses. Registration and authentication are required to work with the system.

[![Actions Status](https://github.com/taponomarev/php-project-lvl4/workflows/hexlet-check/badge.svg)](https://github.com/taponomarev/php-project-lvl4/actions)
[![Tests Status](https://github.com/taponomarev/php-project-lvl4/workflows/Tests/badge.svg)](https://github.com/taponomarev/php-project-lvl4/actions)
[![Build Status](https://github.com/taponomarev/php-project-lvl4/workflows/Build/badge.svg)](https://github.com/taponomarev/php-project-lvl4/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/f3eb6ec6a70fe35f3d21/maintainability)](https://codeclimate.com/github/taponomarev/php-project-lvl4/maintainability)

## Requirements

* Docker and docker-compose

## Setup and Run

```sh
$ make install
$ ./vendor/bin/sail up -d
$ ./vendor/bin/sail php artisan key:generate --ansi
$ ./vendor/bin/sail php artisan migrate:fresh --seed

* Open address: http://127.0.0.1
```

## Demo

[heroku](https://ancient-spire-20616.herokuapp.com)
