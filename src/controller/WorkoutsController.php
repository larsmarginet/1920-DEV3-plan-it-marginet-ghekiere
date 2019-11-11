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

  }

  public function workout(){

  }

  public function activity(){

  }

  public function detail(){

  }

  public function addworkout(){

  }

}
