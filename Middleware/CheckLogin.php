<?php

use Core\RoutesProvider;
use Core\SessionProvider;

$secUser = SessionProvider::get('user');
$secRoutes = SessionProvider::get('routes');
$secApp = SessionProvider::get('app');
$currentUrl = RoutesProvider::url();

RoutesProvider::server(function ($method, $request) use($currentUrl, $secRoutes, $secUser,$secApp) {
  if ($method === 'GET') {
    if (
      in_array($currentUrl, (array) $secRoutes) && 
      !empty($secUser->EMAIL) &&
      !isset($request->user)
    ) {
      redirect('/app?user='.$secUser->USER_NAME.'&view='. $secApp->view);
    }

    if (
      in_array($currentUrl, ['/app']) && 
      empty($secUser->EMAIL)
    ) {
      redirect('/login');
    }
  }
});
