
<?php

class Utils {

public static function toSeconds($time){ //tijd omzettenin seconden! 1min ingeven heeft 60 terug.
      $arr = explode(":", $time);
      return $arr[0]*3600 + $arr[1]*60 + $arr[2];
    }

public static function fromSeconds($seconds){
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

  }

    ?>
