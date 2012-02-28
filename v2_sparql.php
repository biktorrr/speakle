<?php

	#$product = $_['product'];
	$product = "Beurre de karite";
	$myquery = "SELECT DISTINCT ?p 
WHERE { 
?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> rm:Person . 
?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
?pn <http://www.w3.org/2000/01/rdf-schema#label> '".$product ."'}";
	
	$encoded_query = urlencode($myquery);
	print $encoded_query;
	
	$result = file_get_contents('http://eculture.cs.vu.nl/sparql/?q=' .$encoded_query);
	#$result = file_get_contents('http://eculture.cs.vu.nl:1979/sparql/?query=SELECT%20DISTINCT%20?label%20WHERE%20{%20?p%20rdfs:label%20?label}%20LIMIT%2050&format=json');
	print $result;

?>

<!--<vxml version = "2.1" >

 <form id="result">
  <block>
   <prompt>The weather for <?php print $city; ?> is <?php print $weather; ?> </prompt>
  </block>
 </form>

 
 
 </vxml>-->