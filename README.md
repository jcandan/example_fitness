An example Drupal 8 fitness module which features custom content entities, 
composer dependencies, and a custom Entity Reference Field Type plugin.

This repository is meant to acompany the presentation:

### MODULE ARCHITECTURE DEVELOPMENT IN D8:
##### DRUPAL COMPOSER, CUSTOM ENTITIES, AND COMPLEX RELATIONSHIPS VIA PLUGINS

Given at

- [Florida Drupalcamp 2018](https://www.fldrupal.camp/sessions/development-performance/module-architecture-development-d8-drupal-composer-custom-entities)

## See it in action

#### Download Drupal 8

Run the following in an Apache/PHP environment to download Drupal 8.

```bash
$ composer create-project drupal-composer/drupal-project proj_name --stability dev --no-interaction
```

#### Require this Example Fitness module

Add my github repository and package to your project composer.json.

```bash
$ cd proj_name/
$ composer config repositories.example_fitness vcs https://github.com/jcandan/example_fitness
$ composer require jcandan/example_fitness:dev-master
```

#### Install Drupal

At this point, you may visit the site and install it via the web interface or 
use `drush site-install`. Here is an example using a postgres database:

```bash
$ cd web/
$ ../vendor/bin/drush site-install standard --db-url=pgsql://[DB_USER]:[DB_PASSWORD]@127.0.0.1:5432/proj_name
```

> Note: take note of the generated admin password.

#### Enable the module

```bash
$ cd proj_name/web/
$ drush en example_fitness -y
```

Visit `/admin/structure/workout/add` to see and manage the Workout and Exercise entities.