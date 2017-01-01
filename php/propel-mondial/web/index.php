<?php

// setup the autoloading
require_once __DIR__ . '/../vendor/autoload.php';

// setup Propel
require_once __DIR__ . '/../generated-conf/config.php';

use Model\CountryQuery;

$countries = CountryQuery::create()->find();
foreach ($countries as $country) {
    echo $country->getName() . "<br>";
}
