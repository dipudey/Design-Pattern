<?php 

spl_autoload_register(function ($className) {
    require_once './' . $className . '.php';
});

print_r((new User())->getUser());