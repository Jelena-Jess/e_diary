<?php
define("DB", "e_diary");
define("DBHOST", "localhost");
define("DBUSER", "");
define("DBPASS", "");
define("APP_DIR","diary");


function autoloadCore($class){
  require_once "core/{$class}.php";
}
spl_autoload_register("autoloadCore");
