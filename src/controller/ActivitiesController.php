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
    $totalTime = $this->AddPlayTime($timeArr);

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



      //$timeArr = []; //Make an array with all the activity durations so we can add them


        //array_push($timeArr, $activity['duration']);


      //based on the intensity the time is longer
      // switch($intensity){
      //   case "easy":
      //     $totalTime = $this->AddPlayTime($timeArr);
      //     break;
      //   case "normal":
      //     $totalTime = $this->AddPlayTime($timeArr)*2;
      //     break;
      //   case "hard":
      //     $totalTime = $this->AddPlayTime($timeArr)*3;
      //     break;
      // }

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





  function AddPlayTime($timeArr) {
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
    //$activity['duration'] = substr($activity['duration'],3);
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
