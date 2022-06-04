#!/bin/sh
set -e

APP_PATH="/application"

userdel www-data
useradd -U -u $UID -M www-data
chown www-data:www-data -R $APP_PATH
