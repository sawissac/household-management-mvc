<?php

use Core\RoutesProvider;
use Models\User;

RoutesProvider::server(function ($method, $request) {
  if ($method === 'GET') {
    $data = [];
    if (
      isset($request->username) &&
      isset($request->email) &&
      isset($request->password)
    ) {
      $data = User::get($request->email);
    } else {
      redirect('/page404');
      exit();
    }
    if (!$data) {
      User::new([
        'username' => $request->username,
        'email' => $request->email,
        'password' => password_hash($request->password, PASSWORD_BCRYPT)
      ]);
      redirect('/login');
    } else {
      redirect('/signup?auth=denied');
    }
  }
});
