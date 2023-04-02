<?php

view('header', [
  'username' => $username, 
  'view'=>$view,
  'currentDate' => $currentDate,
  'totalBalance' => $totalBalance
]);
view('table', [
  'username' => $username, 
  'totalBalance' => $totalBalance,
  'dataSet'=>$dataSet,
  'view'=>$view,
  'currentDate' => $currentDate,
  'databaseDate' => $databaseDate
 ]);

?>


