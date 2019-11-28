<?php
class Activity {



    function __construct($activity){
        $this->id = $activity['id'];
        $this->title = $activity['title'];
        $this->description = $activity['description'];
        $this->duration =  $this->toSeconds($activity['duration']);
        $this->youtube = $activity['youtube'];
        $this->workout_id = $activity['workout_id'];

    }

    function setIntensity($intensity){
      $this->intensity = $intensity;
    }

    function getIntensity(){
      if($this->intensity != null && $this->intensity != ""){
        return $this->intensity;
      }
      else return null;
    }

    function getTitle(){
      return $this->title;
    }

    function getDescription(){
      return $this->description;
    }

    function getYoutube(){
      return $this->youtube;
    }

    function getWorkoutId(){
      return $this->workout_id;
    }

    function getId(){
      return $this->id;
    }

    function toSeconds($time){ //tijd omzettenin seconden! 1min ingeven heeft 60 terug.
      $arr = explode(":", $time);
      return $arr[0]*3600 + $arr[1]*60 + $arr[2];
    }

    function fromSeconds($seconds){
      $hours = floor($seconds/3600);
      $seconds -= $hours*3600;
      //$seconds = $seconds - $hours*3600;
      $minutes = floor($seconds/60);
      $seconds -= $minutes*60;
      if($minutes < 10){
        $minutes = "0" . $minutes;
      }
      if($seconds < 10){
        $seconds = "0" . $seconds;
      }
      return "$minutes:$seconds";
    }


    function setNormal(){

      $this->duration = $this->duration * 2;

    }

    function setHard(){

      $this->duration = $this->duration * 3;

    }

    function getDuration(){
      return $this->fromSeconds($this->duration);
    }

    function getDurationInSeconds(){
      return $this->duration;
    }


}


