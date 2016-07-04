<?php
require ("searchthreetables.php");

$xml= new DOMDocument("1.0");
$xml->load($data);

$xsl= new DOMDocument("1.0");
$xsl->load("stylesheet.xsl");

$proc= new XSLTProcessor;
$proc->importStyleSheet($xsl);


echo $proc->TransformToXML($xml);


?>