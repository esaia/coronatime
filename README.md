# Coronatime

website is a website that provides up-to-date information and statistics related to the COVID-19 pandemic. It typically includes data on the total number of confirmed cases, active cases, recoveries, and deaths due to COVID-19 at global, regional, and country levels.

### Table of Contents

-   [Database](#database)
-   [Tech Stack](#tech-stack)
-   [Resources](#resources)
-   [Getting Started](#getting-started)
-   [Environment Variables](#environment-variables)
-   [Screenshots](#screenshots)

### Database

To view the database structure, go to the following link: [drawsql](https://drawsql.app/teams/my-team-704/diagrams/coronatime)

![App Screenshot](/readme/corona_db.jpg)

### Tech Stack

-   [Laravel@10.x](https://laravel.com/docs/10.x) - back-end framework
-   [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
-   [MySQL](https://www.mysql.com/) - for database

### Resources

-   [Assignment](https://redberry.gitbook.io/coronatime/)
-   [figma](https://www.figma.com/file/O9A950iYrHgZHtBuCtNSY8/Coronatime?node-id=0-1)
-   [Git semantic commits](https://redberry.gitbook.io/resources/other/git-is-semantikuri-komitebi)

### Getting Started

1\. Clone the repository to your local machine

```sh
https://github.com/RedberryInternship/esaia-gaprindashvili-coronatime
```

2\. Run composer install to install the dependencies

```sh
composer install
```

3\. Configure your database credentials in the .env file

4\. And start the local development server

```sh
php artisan serve
```

### Environment Variables

To run this project, you will need to add the following environment variables to your .env file

**MYSQL:**

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=**\***

> DB_USERNAME=**\***

> DB_PASSWORD=**\***

### Screenshots

#### Log In

![App Screenshot](/readme/login.jpg)

#### Worldwide statistics

![App Screenshot](/readme/dashboard.jpg)

#### Statistics by country

![App Screenshot](/readme/table.jpg)
