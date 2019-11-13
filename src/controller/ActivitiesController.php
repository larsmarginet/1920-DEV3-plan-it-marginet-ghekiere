<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivitiesDAO.php';

class ActivitiesController extends Controller {


  function __construct() {
    $this->activityDAO = new ActivitiesDAO();
  }

  public function index() {

  }

  public function intensity() {

  }

  public function workout(){

    $workout_id = $_GET['id'];
    $activities = $this->activityDAO->selectActivitiesByWorkoutId($workout_id);
    $this->set('activities', $activities);

  }

  public function activity(){




  }

  public function detail(){

    $activity = $this->activityDAO->selectActivityById($_GET['id']);
    $this->set('activity', $activity);

  }

  public function addworkout(){

  }

}
