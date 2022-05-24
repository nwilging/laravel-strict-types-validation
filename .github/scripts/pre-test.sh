#!/bin/sh -v
find ./vendor/orchestra/testbench-core/laravel/storage -type d -exec chgrp -v www-data {} +
find ./vendor/orchestra/testbench-core/laravel/storage -type d -exec chmod ug+rw {} +
find ./vendor/orchestra/testbench-core/laravel/bootstrap/cache -type d -exec chgrp -v www-data {} +
find ./vendor/orchestra/testbench-core/laravel/bootstrap/cache -type d -exec chmod ug+rw {} +
chgrp -v www-data ./vendor/orchestra/testbench-core/laravel/bootstrap/cache/services.php
chmod ug+rw ./vendor/orchestra/testbench-core/laravel/bootstrap/cache/services.php
