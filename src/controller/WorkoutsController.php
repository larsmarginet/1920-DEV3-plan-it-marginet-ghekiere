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

  public function addworkout(){
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'insertWorkout') {
        $this->handleInsertWorkout();
      }
    }
  }

  public function handleInsertWorkout(){
    $title = $_POST['title'];
    $insertWorkoutResult = $this->workoutDAO->insert($title);
    header('Location: index.php?page=activity&id='. $insertWorkoutResult["id"] . '&intensity=easy');
    

    //het id van de workout moet hij mee geven // zet de standaard intensiteit op normal
    //we moeten één flow creeren waarbij we een workout aanmaken en vervolgens direct een activiteti
    //toevoegen om vervolgens terecht te komen in de workout met de gecreerde activitei onder de "easy" intensiteit!

  }

}


