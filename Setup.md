Setup manual
=================

# Setting up the dependencies

This project uses [composer](https://getcomposer.org/) for dependencies management. In order to install the dependencies needed to run the Metrics daemon just run in the terminal:

```
composer install
```

# Setting up the database

This projects uses its own database. Once you have configured the `phinx.yml` file, you may create all the necessary tables and seed the initial data using the following commands:

```
./vendor/bin/phinx migrate
./vendor/bin/phinx seed:run
```
