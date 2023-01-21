#!/bin/bash

## Install Creator.
ddev . drush si -y --site-name=Creator && ddev . drush en -y creator_core && ddev . drush theme:enable creator_theme && ddev . drush config-set -y system.theme default creator_theme

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
