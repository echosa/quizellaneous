# Quizellaneous!

This is just a little personal hobby project for me to work on creating a Symfony application from scratch.

### Dev Set Up

1. Clone the repository
2. `composer install --dev` to install dependencies
3. `bin/console doctrine:migrations:migrate` to setup the database (SQLite)
4. `symfony console doctrine:fixtures:load` to load test data into the database
5. `symfony server:start -d` to start the web server
6. `npm install` or `yarn install` to install webpack-encore dependencies
7. `npm run watch` to start webpack-encore and recompile assets automatically
