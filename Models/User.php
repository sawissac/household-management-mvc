<?php

namespace Models;

use PDO;
use Models\DB;

class User
{
  public static function get($email)
  {
    return DB::start(function ($conn) use($email) {
      $stmt = $conn->prepare("SELECT * FROM users WHERE EMAIL=:email");
      $stmt->bindParam(":email", $email, PDO::PARAM_STR_CHAR);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    });
  }

  public static function new($data)
  {
      DB::start(function ($conn) use ($data) {

          $stmt = $conn->prepare("INSERT INTO `users`(`USER_NAME`, `EMAIL`, `PASSWORD`) VALUES (:username,:email,:pass)");

          $stmt->bindParam(":username", $data['username']);
          $stmt->bindParam(":email", $data['email']);
          $stmt->bindParam(":pass", $data['password']);
          $stmt->execute();
      });
  }
}
