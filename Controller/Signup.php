<?php

use Core\RoutesProvider;

RoutesProvider::server(function ($method, $request) {

  $error = [];

  if ($method === 'POST') {
    if (!$request->username) {
      $error['username'] = 'Username can\'t be empty!';
    }
    if (!$request->email) {
      $error['email'] = 'Email can\'t be empty!';
    }
    if (!$request->password) {
      $error['password'] = "Password can't be empty!";
    }
    if (!$request->confirmPassword) {
      $error['confirmPassword'] = "Confirm password can't be empty!";
    }
    if (
      $request->email &&
      !filter_var($request->email, FILTER_VALIDATE_EMAIL)
    ) {
      $error['email'] = "Invalid email!";
    }
    if (
      $request->password &&
      $request->confirmPassword &&
      $request->password !== $request->confirmPassword
    ) {
      $error['confirmPassword'] = "Password doesn't match";
    }
    #if there is no error
    if (count($error) === 0) {
      redirect(
        '/auth-signup'
          . '?username=' . $request->username
          . '&email=' . $request->email
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
      $error['email'] = 'Please use another account!';
    }
  }

  view('signup', ['error' => $error,'request' => $request]);
});
