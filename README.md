## Overview
This composer project is used for testing the Maker install profile for Drupal 10+.

Gitpod link: https://gitpod.io/#https://github.com/drupalninja/maker-project/

## Quick start

1. **Enable DDEV**

   ```shell
   ddev start
   ```

2. **Install Composer**

   ```shell
   ddev composer install
   ```

3. **Install Standard install profile**

   ```shell
   ddev . drush si -y
   ```

2. **Enable the maker Core module**

   ```shell
   ddev . drush en -y maker
   ```

3. **Enable the maker Themee**

   ```shell
   ddev . drush theme:enable maker_theme
   ddev . drush config-set -y system.theme default maker_theme
   ```

4. **Login to test**

   ```shell
   ddev . drush uli
   ```
