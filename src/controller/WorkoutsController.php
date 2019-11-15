<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/WorkoutsDAO.php';

class WorkoutsController extends Controller {

  private $workoutDAO;

  function __construct() {
    $this->workoutDAO = new WorkoutsDAO();
  }

  public function index() {
    $workouts = $this->workoutDAO->selectAllWorkouts();
    $this->set('workouts', $workouts);
  }

  public function intensity() {
    $workout_id = $_GET['id'];
    $this->set('workout_id', $workout_id);
  }

  public function addworkout(){

  }

}
