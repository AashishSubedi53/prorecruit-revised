#!/bin/bash

# Laravel project root directory
#LARAVEL_ROOT="/home/dell/Documents/pro-recruit"

# Laravel Tinker command to create admin account
#php artisan tinker
use App\Models\User;
$admin = new User;
$admin->name = \"admin\";
$admin->email = \"admin@gmail.com\";
$admin->user_type = \"admin\";
$admin->password = bcrypt(\"password\");
$admin->save();


# Change to Laravel project directory
#cd $LARAVEL_ROOT

# Run Tinker command
#eval $TINKER_COMMAND

