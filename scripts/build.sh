#!/bin/bash

## Install Creator.
ddev . drush si -y --site-name=Creator && ddev . drush en -y creator_core && ddev . drush theme:enable creator_theme && ddev . drush config-set -y system.theme default creator_theme

## Output the login link.
ddev . drush uli
