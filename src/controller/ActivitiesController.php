<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivitiesDAO.php';

class ActivitiesController extends Controller {


  function __construct() {
    $this->activityDAO = new ActivitiesDAO();
  }

  public function workout(){
    $workout_id = $_GET['id'];
    $activities = $this->activityDAO->selectActivitiesByWorkoutId($workout_id);
    $this->set('workout_id', $workout_id);
    $this->set('activities', $activities);
  }


  public function detail(){
    $activity = $this->activityDAO->selectActivityById($_GET['id']);
    $this->set('activity', $activity);
  }

  public function activity(){
    $workout_id = $_GET['id'];
    $this->set('workout_id', $workout_id);

    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'insertActivity') {
        $this->handleInsertActivity();
      }
    }
  }

  private function handleInsertActivity() {
    // todo! calc duration based on number input
    $min = sprintf("%02d", $_POST['min']);
    $sec = sprintf("%02d", $_POST['sec']);


    $duration = "00:" . $min . ":" . $sec;

    $data = array(
      'title' => $_POST['title'],
      'description' => $_POST['description'],
      'duration' => $duration,
      'quantity' => $_POST['amount'],
      'workout_id' => $_GET['id']
    );
    $insertActivityResult = $this->activityDAO->insert($data);
    if (!$insertActivityResult) {
      $errors = $this->activityDAO->validate($data);
      $this->set('errors', $errors);
      if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
        header('Content-Type: application/json');
        echo json_encode(array(
          'result' => 'error',
          'errors' => $errors
        ));
        exit();
      }
      $_SESSION['error'] = 'The activity could not be added!';
    } else {
      if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
        header('Content-Type: application/json');
        echo json_encode(array(
          'result' => 'ok',
          'activity' => $insertActivityResult
        ));
        exit();
      }
      $_SESSION['info'] = 'The activity is added!';
      header('Location: index.php?page=workout&id=' . $_GET['id']);
      exit();
    }
  }

}
