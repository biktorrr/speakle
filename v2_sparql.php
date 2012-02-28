<?php

	$product = $_['product'];
	#$product = "Beurre de karite";
	$myquery = "SELECT DISTINCT ?pname 
WHERE { 
?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Person> . 
?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
?pn <http://www.w3.org/2000/01/rdf-schema#label> '".$product ."'.
?pn <http://purl.org/collections/w4ra/radiomarche/lname> ?pname}";
	
	$encoded_query = urlencode($myquery);
	#print $encoded_query;
	$myurl = 'http://eculture.cs.vu.nl:1979/sparql/?query=' .$encoded_query;
	#print $myurl;
	$result = file_get_contents($myurl);
	#$result = file_get_contents('http://eculture.cs.vu.nl:1979/sparql/?query=SELECT%20DISTINCT%20?label%20WHERE%20{%20?p%20rdfs:label%20?label}%20LIMIT%2050&format=json');
	print "<vxml version = \"2.1\" > <form id=\"result\"> <block> <prompt>The names of the persons selling this are:" ;
	print $result;
	print "</prompt></block></form></vxml>";
	#print $result;

?>

<!--<vxml version = "2.1" >

 <form id="result">
  <block>
   <prompt>The weather for <?php print $city; ?> is <?php print $weather; ?> </prompt>
  </block>
 </form>

 
 
 </vxml>-->