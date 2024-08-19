<?php
require_once 'geo.php';

// Example 
$ip  = '191.221.12.108';  // coloque aqui o ip que vocë deseja, se deixar em branco ira pega o ip da sua internet
$geo = new Geo($ip);
echo "IP: $ip " .$geo->get();

