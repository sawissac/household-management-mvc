<?php

namespace Core;

class SessionProvider
{
  public static function build($key, $props)
  {
    if (!isset($_SESSION[$key])) {
      $_SESSION[$key] = $props;
    }
  }

  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return (object) $_SESSION[$key];
    }
  }

  public static function set($key,$props)
  {
    if (isset($_SESSION[$key])) {
      $_SESSION[$key] = $props;
    }
  }

  public static function destroy($keys)
  {
    foreach($keys as $key){
      $_SESSION[$key] = null;
    }
    session_destroy();
  }
}
