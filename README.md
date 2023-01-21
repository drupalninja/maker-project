## Overview
This composer project is used for testing the Creator install profile for Drupal 10+.

Gitpod link: https://gitpod.io/#https://github.com/drupalninja/creator-project/

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

2. **Enable the Creator Core module**

   ```shell
   ddev . drush en -y creator
   ```

3. **Enable the Creator Themee**

   ```shell
   ddev . drush theme:enable creator_theme
   ddev . drush config-set -y system.theme default creator_theme
   ```

4. **Login to test**

   ```shell
   ddev . drush uli
   ```
