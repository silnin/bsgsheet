# Project bsgsheet: https://github.com/silnin/bsgsheet
2015-04-05: This personal project should provide functionality to host a platform where users can create and maintain their tabletop Battlestar Galactica RPG character sheets




# Setup instructions

Create parameters.yml
  Make sure you have a parameters.yml in app/config. You can copy parameters.yml.dist

Edit parameters.yml
  Edit the new parameters.yml and fill in the correct database parameters

Start vagrant
  vagrant up

Log into vagrant
  vagrant ssh

Go to the project dir
  cd /vagrant

Download composer
  curl -sS https://getcomposer.org/installer | php

Update project
  php composer.phar update

Create database scheme:
  php app/console doctrine:schema:update --dump-sql --force

Create a fresh ACL
  php app/console init:acl


