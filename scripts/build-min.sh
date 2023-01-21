#!/bin/bash

## Install Creator.
ddev . drush si -y --site-name=Creator && ddev . drush en -y creator && ddev . drush theme:enable creator_theme && ddev . drush config-set -y system.theme default creator_theme

## Delete all content.
ddev . drush entity:delete node

## Create min content.
ddev . drush scr scripts/create-min-content.php

## Run cron to ensure all content is indexed.
ddev . drush cron

## Output the login link.
ddev . drush uli
