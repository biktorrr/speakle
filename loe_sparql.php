<?php

	$product = $_GET["city"];
	print "<!--".$city."-->";

	$myquery1 = "SELECT DISTINCT ?par
	WHERE { 
     ?s skos:inScheme niod:EntityScheme.
     ?s skos:prefLabel " .$city ."'.
     ?s niod:pRef ?par.

	} 
        LIMIT 1";
		

	
	$encoded_query = urlencode($myquery1);
	#print $encoded_query;
        $myurl = 'http://semanticweb.cs.vu.nl/verrijktkoninkrijk/sparql/?query=' .$encoded_query;	
        print "<!--".$myurl."-->";

	$result1 = file_get_contents($myurl);
	$xmlresult = simplexml_load_string($result1);

	print "\n<vxml version = \"2.1\" > \n  <property name=\"inputmodes\" value=\"dtmf\" />  <form id=\"result\">\n <block> \n<prompt>\n";
	print "This is what Loe says about  ".$city ."\n" ;	
	print "<break time=\"0.5s\"/>\n";

	
 	foreach($xmlresult->results->result as $result){
	 $city =  $result->binding[0]->uri;



	print $city ;
	 }


	print "You will now return to the main menu. <break time=\"0.5s\"/>\n </prompt><goto next=\"mytest.xml\"/>\n</block></form></vxml>";

?>
