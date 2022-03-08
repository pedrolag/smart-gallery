## 🤙 Hello there!

This is my project called **Smart Gallery** ✨

#

## 🔎 About this project

I've decided to create this to better organize some image folders that I have on my PC since the beggining of time. By "organize" I mean:

- Create categories of images and group them if needed
- Upload/Edit images, adding some informations about it (such as "name" or "description")


### 👓 What am I using in this?

For the **front-end** I've decided to stick with Vue CLI + Vuetify + SASS

<a target="_blank" href="https://vuejs.org/"><img alt="vue.js logo" src="https://img.shields.io/badge/Vue%20js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D" /></a>
<a target="_blank" href="https://vuetifyjs.com/"><img alt="vuetify logo" src="https://img.shields.io/badge/Vuetify-1867C0?style=for-the-badge&logo=vuetify&logoColor=white" /></a>
<a target="_blank" href="https://sass-lang.com/"><img alt="sass logo" src="https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white" /></a>

As for the **back-end** I've created an REST API with Laravel/Lumen in PHP

<a target="_blank" href="https://www.php.net/"><img alt="php logo" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" /></a>
<a target="_blank" href="https://laravel.com/docs"><img alt="laravel logo" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" /></a>

At last, for the **database** I've decided to use a MySQL database

<a target="_blank" href="https://www.mysql.com/"><img alt="mysql logo" src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" /></a>

### 🤔 How to setup this thing?

#### 1. Creating the database
You are going to need a MySQL database for this application. I recommend that you create one using your terminal or the MySQL Workbench 8.0. Your goal here is just to create a database called `smart_gallery`.

#### 2. Setting the `.env` file
Inside the `/backend` folder you probably have a `.env` or a `.env.example` file. If you have the `.env.example` file, just rename it to `.env`. Now you should have a file named `.env` that looks like this:

```
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

In this file you need to apply your connection information, so the application can be able to access the database that you have just created a moment ago. For this, we can change this `.env` file to something like this:

```
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart_gallery
DB_USERNAME=<your mysql username>
DB_PASSWORD=<your mysql password>

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

It is necessary to change the `<your mysql username>` and `<your mysql password>` values with the real information.

#### 3. Preparing the database

Go into the `/backend` folder and type the following command into the terminal:

```
composer install
```

After everything is installed, you can now run this other command: 

```
php artisan migrate
```

If the last command was successful, your database now should have all the tables that the application needs.

#### 4. Installing the front-end

For the **front-end**, go into the `/frontend` directory and run the command:

```
npm install
```

After everything is installed, we can now run the project.

### 🤔 Yeah, but how do I run the project?

For the **back-end**, go into the `/backend` directory and run
```
composer serve
```

For the **front-end**, <ins>with another terminal</ins> go into the `/frontend` directory and run the command:

```
npm run serve
```

You should now see in the terminal something like this:

```
 DONE  Compiled successfully in 21065ms                             23:50:02


  App running at:
  - Local:   http://localhost:8080/
  - Network: http://192.168.0.19:8080/
```

You can now access the "Local" that your app is running at using your browser. 👌
#
