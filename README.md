# RusiruD Activity Package Installation Guide
## Package Description
This Laravel activity package is designed to create activities which are happen in your project.  
Go throught the installation process and install the package into your project.

## Installation

Add your package with tag in project composer.json file

```php
"require": {
        "php": "^8.1",
        "guzzlehttp/guzzle": "^7.2",
        "laravel/framework": "^10.10",
        "laravel/sanctum": "^3.2",
        "laravel/tinker": "^2.8",
        "rusirud/activity": "^1.0"
    },
```

Add the repository which package is located

```php
"repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:ucodefusion/package-menu.git" 
        }
    ],
```

Run the command `composer update`

## How To Use

There is a Helper file (ActivityLog.php) which help you to create activities and fetch created activities. You can call this helper functions anywhere from your project.  
There will be all the migrations in the migration directory and you just need to run those migrations.  
You can execute the migration for customer table according to your will.  
You can create your own view in the resources\views directory.
