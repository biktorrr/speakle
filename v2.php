<?php

	$city = $_['city'];
	
	require('./phpapi.php?q=' . $city);

?>

<vxml version = "2.1" >

 <form id="result">
  <block>
   <prompt>The weather for <?php print $city; ?> is <?php print $weather; ?> </prompt>
  </block>
 </form>

 
 
 </vxml>