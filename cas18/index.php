<?php

use App\Core\Request;
use App\Core\Router;

require 'vendor/autoload.php';
require 'functions.php';
require 'core/bootstrap.php';

Router::load('app/routes.php')
			->direct(Request::uri(), Request::method());

