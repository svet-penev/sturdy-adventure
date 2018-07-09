# SPA using Laravel + VueJS
 SPA using Laravel + VueJS starter project template.
 
![Login Page](https://raw.githubusercontent.com/svet-penev/sturdy-adventure/master/public/img/login.png
![User Page](https://raw.githubusercontent.com/svet-penev/sturdy-adventure/master/public/img/users.png

## Overview

  * [Requirements](#requirements)
  * [Feature](#feature)
  * [Installation](#installation)
  * [Testing](#testing)
  * [Usage](#usage)

## Requirements

| Requirement | Version
| :--- | :---
| PHP | 7.x
| Laravel | 5.6.x

## Feature
* Laravel 5.6
* Vue + VueRouter + Vuex
* Sass
* [Authentication with JWT](https://github.com/tymondesigns/jwt-auth/)
* [Bootstrap-Vue 4](https://bootstrap-vue.js.org/)
* [Material design icons](https://materialdesignicons.com/)
* [Bootstrap theme integrate - Purple Admin Free](http://www.bootstrapdash.com/demo/purple-admin-free/index.html)
* [VueJS notifications](https://github.com/euvl/vue-notification/)
* Login page
* User - create/edit/delete/list 
* PHP Unit test
* Browser Tests (Laravel Dusk)

## Installation

Clone repo to your local machine:
```
git clone git@github.com:svet-penev/sturdy-adventure.git
```

Run composer
```
composer install
```

Configure your .env file
```
vim .env
```

Run 
```
php artisan key:generate
```


Connect and create a new database. Seed your new `databse` by migrating sample data.
```
php artisan migrate --seed
```

Install needed dependencies
```
yarn install
```

Build 
```
yarn run dev
```

Generate jwt ket
```
php artisan jwt:generate
```

Run application
```
php artisan serve
```

Login Credentials
```
email: admin@admin.com
pass:  123456
```

## Testing
Unit test
```
vendor/bin/phpunit
```

Dusk test 
Create new database that will be used only for testing purpose.
```
#create local env for dusk
vim .env.dusk.local

#run dusk test
php artisan dusk
```

## Usage
Development
```
# build and watch
yarn run watch

# serve with hot reloading
yarn run hot
```

Production
```
yarn run production
```

