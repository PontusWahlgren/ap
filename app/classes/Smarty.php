<?php

require_once __DIR__ . "/../libraries/smarty/libs/Smarty.class.php";

$smarty = new Smarty;
$smarty->template_dir = "../../views/templates/";
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;



