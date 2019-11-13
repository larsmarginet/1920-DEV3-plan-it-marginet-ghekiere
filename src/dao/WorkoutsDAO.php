<?php

require_once( __DIR__ . '/DAO.php');

class WorkoutsDAO extends DAO {

  public function selectAllWorkouts(){
    $sql = "SELECT * FROM `workout`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }



}
