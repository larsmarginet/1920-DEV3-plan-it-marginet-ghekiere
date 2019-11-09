<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/WorkoutDAO.php';

class WorkoutsController extends Controller {

  private $workoutDAO;

  function __construct() {
    $this->workoutDAO = new WorkoutDAO();
  }

  public function index() {

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
