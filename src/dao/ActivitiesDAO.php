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
    $sql = "SELECT * FROM `activities` WHERE `workout_id` = :workout_id ORDER BY RAND ()";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':workout_id',$workout_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectActivityById($id){
    $sql = "SELECT * FROM `activities` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function delete($id){
    $sql = "DELETE FROM `activities` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function insert($data) {
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `activities` (`title`, `description`, `duration`, `quantity`, `workout_id`) VALUES (:title, :description, :duration, :quantity, :workout_id)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':title', $data['title']);
      $stmt->bindValue(':description', $data['description']);
      $stmt->bindValue(':duration', $data['duration']);
      $stmt->bindValue(':quantity', $data['quantity']);
      $stmt->bindValue(':workout_id', $data['workout_id']);
      if ($stmt->execute()) {
        return $this->selectActivityById($this->pdo->lastInsertId());
      }
    }
    return false;
  }

  public function validate( $data ){
    $errors = [];
    if (!isset($data['title'])) {
      $errors['title'] = 'Please fill in the title';
    }
    if (!isset($data['description'])) {
      $errors['description'] = 'Please fill in a description';
    }
    if (!isset($data['duration'])) {
      $errors['duration'] = 'Please fill in the duration';
    }
    if (empty($data['quantity']) ){
      $errors['quantity'] = 'Please fill in the amount';
    }
    if (empty($data['workout_id']) ){
      $errors['workout_id'] = 'The workout_id is wrong';
    }
    return $errors;
  }


}
