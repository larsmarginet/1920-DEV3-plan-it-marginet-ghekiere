<?php

require_once( __DIR__ . '/DAO.php');

class ActivitiesDAO extends DAO {

  public function selectAllActivities(){
    $sql = "SELECT * FROM `activities`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectActivitiesByWorkoutId($workout_id){
    $sql = "SELECT * FROM `activities` WHERE `workout_id` = :workout_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':workout_id',$workout_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectActivityById($id){
    $sql = "SELECT * FROM `activities`WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


}
