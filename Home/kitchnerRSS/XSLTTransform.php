<?php
$xsldoc = new DOMDocument();
$xsldoc->load('rssKitchner.xsl');

$xmldoc = new DOMDocument();
$xmldoc->load('http://www.cbc.ca/cmlink/rss-canada-kitchenerwaterloo');
// here i am giving link to XML file, not downloading and attaching them
// go to cbc.cs -> rss -> open any one xml file and copy and pest it's url here


$xsl = new XSLTProcessor();
$xsl->importStyleSheet($xsldoc);
$result = $xsl->transformToXML($xmldoc);


?>



<!--<?php echo $result; ?>-->