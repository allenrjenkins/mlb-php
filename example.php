 <?php
 
 require_once("classes/mlb.class.php");
 
 $mlb = new MLB();
 
 /*
  * Example - Specified date
  */
 
 echo '<pre>';
 print_r($mlb->get('08/26/2016'));
 echo '</pre>';
 
  /*
  * Example - Todays games
  */
 
 echo '<pre>';
 print_r($mlb->get());
 echo '</pre>';
 
 