<?php
	$product = $_GET["product"];
	print "<!--".$product."-->";

	
	$myquery1 = "SELECT DISTINCT ?pname 
WHERE { 
?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Person> . 
?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
?pn <http://www.w3.org/2000/01/rdf-schema#label> '" .$product ."'.
?p <http://purl.org/collections/w4ra/radiomarche/contact_lname> ?pname}";
	

	
	$encoded_query = urlencode($myquery1);
	#print $encoded_query;
	$myurl = 'http://eculture.cs.vu.nl:1979/sparql/?query=' .$encoded_query;
	print "<!--".$myurl."-->";
	$result1 = file_get_contents($myurl);
	$xmlresult = simplexml_load_string($result1);

	print "\n<vxml version = \"2.1\" > \n<form id=\"result\">\n <block> \n<prompt>\nThe names of the persons selling this are:\n" ;
	#print $result1;
	print $xmlresult->results->result[0]->binding->literal;
	print "</prompt></block></form></vxml>";

?>