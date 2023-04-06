#!/bin/bash

## Install maker.
ddev . drush si -y --site-name=maker && ddev . drush en -y maker && ddev . drush theme:enable maker_theme && ddev . drush config-set -y system.theme default maker_theme

## Enable devel and devel_generate.
ddev . drush en -y devel devel_generate

## Create terms.
ddev . drush devel-generate:terms --bundles=tags 100

## Create dummy menus for testing.
ddev . drush devel-generate:menus 10

## Create dummy content for testing.
ddev . drush devel-generate:content 100

## Run cron twice to ensure all content is indexed.
ddev . drush cron && ddev . drush cron

## Output the login link.
ddev . drush uli
