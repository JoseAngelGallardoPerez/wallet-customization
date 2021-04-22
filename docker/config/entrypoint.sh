#!/bin/bash

INIT_DIR="/init.d"
if [ -d "$INIT_DIR" ]; then
    # Run all executables from $INIT_DIR if exist. #
  for file in $INIT_DIR/*; do
      [ -f "$file" ] && [ -x "$file" ] && "$file"
  done
fi
chmod 777 /var/www/html/public/assets/img
chmod 777 /var/www/html/public/assets/css
php-fpm7.2
nginx -g 'daemon off;'