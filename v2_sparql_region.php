<?php
	$region  = $_GET["region"];
	
	$myquery1 = "SELECT DISTINCT ?personvoice 
	WHERE { 
	?z <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Zone> . 
	?z <http://www.w3.org/2000/01/rdf-schema#label> '" .$region ."'.
	?v <http://purl.org/collections/w4ra/radiomarche/in_zone> ?z .
	?p <http://purl.org/collections/w4ra/radiomarche/village> ?v.

	?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Person> . 
	?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
	?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
	?pn <http://www.w3.org/2000/01/rdf-schema#label> ?product.
	?p <http://purl.org/collections/w4ra/speakle/voicelabel_en>	?personvoice.
	} 
        LIMIT 3";
		

	
	$encoded_query = urlencode($myquery1);
	#print $encoded_query;
        $myurl = 'http://semanticweb.cs.vu.nl/radiomarche/sparql/?query=' .$encoded_query;	
        print "<!--".$myurl."-->";

	$result1 = file_get_contents($myurl);
	$xmlresult = simplexml_load_string($result1);

	print "\n<vxml version = \"2.1\" > \n  <property name=\"inputmodes\" value=\"dtmf\" />  <form id=\"result\">\n <block> \n<prompt>\n";
	print "The following is a list of persons in  ".$region ."\n" ;	
	print "<break time=\"0.5s\"/>\n";

	
 	foreach($xmlresult->results->result as $result){
	 $personvoice = $result->binding[0]->uri;



	print "<audio src=\"" .$personvoice ."\"/> " ;

	print "<break time=\"0.5s\"/>\n";;
	 }


	print "You will now return to the main menu. <break time=\"0.5s\"/>\n </prompt><goto next=\"mytest.xml\"/>\n</block></form></vxml>";

?>
