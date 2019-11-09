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

}
