
<p align="center">
    <img src="https://github.com/rukshn/hypertables/blob/main/logo.png?raw=true" width="256" />
</p>

<p align="center">
  <h1>Hypertables Flavour PHP</h1>
</p>

[![MIT License](https://img.shields.io/badge/license-MIT-green)](https://github.com/rukshn/hypertables-flavour-php/blob/main/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/rukshn/hypertables-flavour-php)](https://github.com/rukshn/hypertables-flavour-php/issues)
[![GitHub stars](https://img.shields.io/github/stars/rukshn/hypertables-flavour-php)](https://github.com/rukshn/hypertables-flavour-php/stargazers)


Hypertables creates a simple UI to perform CURD actions on your database and tables, inspired by AirTable and Excel.

Hypertables Flavour PHP provides the PHP backend that will work with the database executing the actions.

The project is based on Larvel, one of the most popular PHP frameworks out there.


## Documentation

You can easily incoporate Hypertable Flavour PHP to your existing Laravel project by including the Hypertables controller, model and migration file.

Please refer the Wiki for more information.

Please see the HyperTables repo at https://github.com/rukshn/hypertables


## Setup

To deploy this project run

**Clone the hypertables-flavour-php to your local machine or server**

```bash
  git clone
```

**Go to your hypertables-flavour-php directory**

```bash
  cd hypertables-flavour-php
```

**Install the dependencies using composer**

```bash
  composer install
```

**Edit the .env files and add database connection variables**

```vim
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= ADD YOUR DATABASE NAME
DB_USERNAME= MYSQL USERNAME
DB_PASSWORD= MYSQL PASSWORD
```
**Run the migration**

```bash
  php artisan migrate
```

Having trouble running the migration? Please reffer the [Wiki](https://github.com/rukshn/hypertables-flavour-php/wiki/Common-issues)

*This will create a table called hypertables in your database, this table is mandetory for HyperTables*

**Run your larvel server**

```vim
  php artisan serve
```

This will run your HyperTables php backend at **localhost:8000**. Navigate to localhost:8000 to see if your backend is running smoothly.

If you want to run the HyperTables Flavour PHP on a shared hosting, then rename the `htaccess_example` file to `.htaccess` and you will be able to run the server by simply visiting the hosted URL

## Contributing

Contributions are always welcome!

Feel free to check our code, provide any pull requests with improvements.

If you have any issues, please create an issue on GitHub.

