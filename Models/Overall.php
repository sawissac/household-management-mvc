<?php

namespace Models;

use PDO;
use Models\DB;

class Overall
{
  public static function where($userId, $date)
  {
    return DB::start(function ($conn) use ($userId, $date) {
      $stmt = $conn->prepare("SELECT * FROM overall WHERE USER_ID=:userId AND DELETE_FLAG=0 AND DATE=:date");
      $stmt->bindParam(":userId", $userId, PDO::PARAM_STR);
      $stmt->bindParam(":date", $date, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    });
  }

  public static function new($data)
  {
    DB::start(function ($conn) use ($data) {
      $query = "INSERT INTO `overall` (`USER_ID`, `DESCRIPTION`, `INCOME`, `EXPENSE`,`DATE`) ";
      $query .= "VALUES (:userId,:desc,:income,:expense,:date)";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":userId", $data['userId'], PDO::PARAM_INT);
      $stmt->bindParam(":desc", $data['desc'], PDO::PARAM_STR);
      $stmt->bindParam(":income", $data['income'], PDO::PARAM_INT);
      $stmt->bindParam(":expense", $data['expense'], PDO::PARAM_INT);
      $stmt->bindParam(":date", $data['date'], PDO::PARAM_STR);
      $stmt->execute();
    });
  }

  public static function update($data)
  {
    DB::start(function ($conn) use ($data) {
      $query = "UPDATE `overall` SET `DESCRIPTION`=:desc,`INCOME`=:income,`EXPENSE`=:expense ";
      $query .= "WHERE ID=:id";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":id", $data['id'], PDO::PARAM_INT);
      $stmt->bindParam(":desc", $data['desc'], PDO::PARAM_STR);
      $stmt->bindParam(":income", $data['income'], PDO::PARAM_INT);
      $stmt->bindParam(":expense", $data['expense'], PDO::PARAM_INT);
      $stmt->execute();
    });
  }

  public static function delete($id)
  {
    DB::start(function ($conn) use ($id) {
      $query = "UPDATE `overall` SET `DELETE_FLAG`=1 ";
      $query .= "WHERE ID=:id";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
    });
  }

  public static function getDateAll($userId)
  {
    return DB::start(function ($conn) use ($userId){
      $query = "SELECT DISTINCT DATE FROM `overall` WHERE USER_ID=:id AND DELETE_FLAG=0";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    });
  }
}
