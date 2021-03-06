<?php

require_once __DIR__ . '/../models/Activity.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivitiesDAO.php';
require_once __DIR__ . '/../Utils/Utils.php';

class ActivitiesController extends Controller {

  function __construct() {
    $this->activityDAO = new ActivitiesDAO();
  }

  public function intensity() {
    $workout_id = $_GET['id'];
    $activitiesArr = $this->activityDAO->selectActivitiesByWorkoutId($workout_id);

    $timeArr = [];
      foreach($activitiesArr as $activity) {
        array_push($timeArr, $activity['duration']);
      }
    $totalTime = $this->calcSeconds($timeArr);
    $this->set('totalTime', $totalTime);
    $this->set('workout_id', $workout_id);
  }





  public function workout(){
    $workout_id = $_GET['id'];
    $activitiesArr = $this->activityDAO->selectActivitiesByWorkoutId($workout_id);
    $intensity = $_GET['intensity'];
    $totalTime = 0;
    $activities = []; //Make array to add activity objects so we can loop over eveything via models > activity
    foreach($activitiesArr as $activity){
      $activity = new Activity($activity);

      switch($intensity){
        case "normal":
          $activity->setNormal();
          break;
        case "hard":
          $activity->setHard();
          break;
      }
      $activity->setIntensity($intensity);
      $totalTime += $activity->getDurationInSeconds();
      array_push($activities, $activity);
    }

    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'remove') {
        $this->activityDAO->delete($_GET['activity_id']);
        header('Location: index.php?page=workout&id=' . $_GET['id'] . '&intensity=' . $_GET['intensity']);
      }
    }

    $this->set('totalTime', Utils::fromSeconds($totalTime));
    $this->set('workout_id', $workout_id);
    $this->set('intensity', $intensity);
    $this->set('activities', $activities);
  }





  function calcSeconds($timeArr) {
    $h = $m = $s = 0;
    // loop throught all the hours minutes and seconds and convert them all to seconds
    foreach ($timeArr as $time) {
      $time = new \DateTime($time);
        $h += $time->format('H')*3600;
        $m += $time->format('i')*60;
        $s += $time->format('s');
        //$s += $time;
    }
    //add everything to get the total amount of seconds
    $totalTime = $h + $m +$s;
    //$totalTime = $s
    return $totalTime;
}




  public function detail(){
    $activity = $this->activityDAO->selectActivityById($_GET['id']);
    $activity = new Activity($activity);
    switch($_GET['intensity']){
      case "normal":
        $activity->setNormal();
        break;
      case "hard":
        $activity->setHard();
        break;
    }
    $activity->setIntensity($_GET['intensity']);
    $this->set('activity', $activity);
  }




  public function activity(){
    $workout_id = $_GET['id'];
    $intensity = $_GET['intensity'];
    $this->set('workout_id', $workout_id);
    $this->set('intensity', $intensity);

    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'insertActivity') {
        $this->handleInsertActivity();
      }
    }
  }

  private function convertToTime($min, $sec){
    return "00:" . sprintf("%02d", $min) . ":" . sprintf("%02d", $sec);
  }

  private function handleInsertActivity() {
    $duration = "00:" . sprintf("%02d", $_POST['min']) . ":" . sprintf("%02d", $_POST['sec']);

    $timestamp = floor($_POST['time'] * 60);
    $youtube = end(explode('=',$_POST['youtube'])) . "?autoplay=1&start=" . $timestamp;

    $data = array(
      'title' => $_POST['title'],
      'description' => $_POST['description'],
      'duration' => $duration,
      'youtube' => $youtube,
      'workout_id' => $_GET['id']
    );
    for($i = 0; $i < $_POST['amount']; $i++) {
      $insertActivityResult = $this->activityDAO->insert($data);
    }

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
      header('Location: index.php?page=workout&id=' . $_GET['id'] . '&intensity=' . $_GET['intensity']);
      exit();
    }
  }

}
