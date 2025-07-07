<?php

require_once 'nodels/router.php';

//Pages
router('/', 'views/home.php');


// Resolve the current URL
resolve();