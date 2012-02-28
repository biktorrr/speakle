<?php

	$product = $_['product'];
	
	#$result = file_get_contents('http://eculture.cs.vu.nl/sparql/?q=' . $product);
	$result = file_get_contents('http://eculture.cs.vu.nl:1979/sparql/?query=SELECT%20DISTINCT%20?label%20WHERE%20{%20?p%20rdfs:label%20?label}%20LIMIT%2050&format=json');
	print $result;

?>

<!--<vxml version = "2.1" >

 <form id="result">
  <block>
   <prompt>The weather for <?php print $city; ?> is <?php print $weather; ?> </prompt>
  </block>
 </form>

 
 
 </vxml>-->