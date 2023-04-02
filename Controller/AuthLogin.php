<?php

use Core\RoutesProvider;
use Core\SessionProvider;
use Models\User;

RoutesProvider::server(function ($method, $request) {
  if ($method === 'GET') {
    $data = [];
    if (
      isset($request->email) &&
      isset($request->password)
    ) {
      $data = User::get($request->email);
    } else {
      redirect('/page404');
      exit();
    }

    if (!empty($data) && password_verify($request->password, $data['PASSWORD'])) {
      SessionProvider::set('user', $data);
      $secUser = SessionProvider::get('user');
      redirect('/app?user=' . $secUser->USER_NAME . '&view=overall');
    } else {
      redirect('/login?auth=denied&email=' . $request->email . '&password=' . $request->password);
    }
  }
});
