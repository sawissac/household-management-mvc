<?php

use Core\RoutesProvider;

RoutesProvider::server(function ($method, $request) {

  $error = [];

  if ($method === 'POST') {
    if (!$request->email) {
      $error['email'] = 'Email can\'t be empty!';
    }
    if (!$request->password) {
      $error['password'] = "Password can't be empty!";
    }
    if (
      $request->email &&
      !filter_var($request->email, FILTER_VALIDATE_EMAIL)
    ) {
      $error['email'] = "Invalid email!";
    }

    #if there is no error, go to /auth-login
    if (count($error) === 0) {
      redirect(
        '/auth-login'
          . '?email=' . $request->email
          . '&password='  . $request->password
      );
      exit;
    }
  }

  if ($method === 'GET') {
    if (
      isset($request->auth) &&
      $request->auth === 'denied'
    ) {
      $error['auth'] = 'denied';
    }
  }

  view('login', ['error' => $error,'request' => $request]);
});
