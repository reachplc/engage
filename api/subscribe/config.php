<?php

# Config File for production environment

//error_reporting(0);

# Config

// CONFIG: Enable debug mode. This means we'll log requests
// into 'nominate.log' in the same directory.
// Set this to 0 once you go live or don't require logging.
//
error_reporting(0);

define("DEBUG", 1);

if( DEBUG ) {
  // Turn error reporting on
  error_reporting(E_ALL);
  mysqli_report(MYSQLI_REPORT_ERROR);
}

define("LOG_FILE", "./nominate.log");

# Settings

$config = array(
  "year" => "2015"
 ,"email" => array(
    "webmaster"     =>    "engage@trinitymirror.com, jonathan.masters@trinitymirror.com"
   ,"host"   =>    "tdkb-2ywy.accessdomain.com" // SMTP Host address
   ,"username" => "no.reply@engage.trinitymirror.com"
   ,"password" => "TAxid(Tcdzu9das8RK@n"
   ,"port" => 587
  )
);
