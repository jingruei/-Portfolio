<?php

include_once('corb.php');
include_once('DB.php');

foreach (glob(__DIR__ . "/*.class.php") as $file) {
    include_once($file);
}