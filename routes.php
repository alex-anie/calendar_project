<?php

require_once 'models/router.php';

//Pages
router('/', 'views/home.php');
router('/name', 'views/name.php');
router('/username', 'views/username.php');
router('/more', 'views/more.php');

// Resolve the current URL
resolve();