#!/bin/bash

## Install maker.
ddev . drush si -y --site-name=maker && ddev . drush en -y maker && ddev . drush theme:enable maker_theme && ddev . drush config-set -y system.theme default maker_theme

## Output the login link.
ddev . drush uli
