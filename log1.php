<?php
$log = file('/home/craftsrv/servers/S01/logs/latest.log');

switch($_SERVER["REQUEST_METHOD"]){
  case 'GET':
    $log = json_encode(array_slice(array_reverse($log, true), 0, 500, true));
    echo $log;
    break;
  case 'POST':
    $log = json_encode(array_reverse(array_slice($log, (int) $_POST['start'] + 1, null, true), true));
    echo $log;
    break;
}
