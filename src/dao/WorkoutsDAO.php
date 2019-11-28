<?php

require_once( __DIR__ . '/DAO.php');

class WorkoutsDAO extends DAO {

  public function selectAllWorkouts(){
    $sql = "SELECT * FROM `workout`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($data) {
    if (!empty($data)) {
      $sql = "INSERT INTO `workout` (`title`) VALUES (:title)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':title', $data);
      if ($stmt->execute()) {
        return $this->selectWorkoutById($this->pdo->lastInsertId()); //lastInsertId() genereerd het laatst toegevoegde id nummer vb "15"
      }
    }
    return false;
  }

    public function selectWorkoutById($id){
    $sql = "SELECT * FROM `workout` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }









}
