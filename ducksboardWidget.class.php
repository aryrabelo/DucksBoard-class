<?
/*
  Class: ducksboardWidgets
  Author: Ary Rabelo (aryrabelo@gmail.com)
  Date: 27.02.2012
  Description:
  
      This class provides the easiest way to update your stats realtime with DucksBoard
      Just:
       1 - create a new Widget
       2 - get the Widget number and keep it
       3 - get your API KEY and put inside the class when it says "put your api key here"
    
    
     To update info use

      $duckb = new ducksboardWidget("4114", array('value'=>"510"));  Where 4114 is your widget number, and 510 is the new value 


*/


class ducksboardWidget {
 public $apikey = ''; //put your api key here
 public $widget = '';
 public $postfield = '';
    
  function ducksboardWidget($widget, $information) {
    $this->widget = $widget;
    $this->postfield = json_encode($information);
    
    
$ch = curl_init('https://push.ducksboard.com/values/' . $this->widget . '/');
curl_setopt($ch, CURLOPT_USERPWD, $this->apikey . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, $this->postfield );
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec ($ch);

curl_close ($ch);
    
  }
  
}
//$gc = new ducksboardWidget("41142", array('value'=>"510")); teste
?>
