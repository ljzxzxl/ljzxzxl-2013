<?php
include "simple_html_dom.php" ;
// Create DOM from URL or file
$html = str_get_html(file_get_contents('http://zhuangxiu.jia.com/'));

// Find all images 
foreach($html->find('img') as $element) 
       echo $element->src . '<br>';

// Find all link 
foreach($html->find('link') as $element) 
       echo $element->href . '<br>';

// Find all script 
foreach($html->find('script') as $element) 
       echo $element->src . '<br>';


// Find all links 
//foreach($html->find('a') as $element) 
//       echo $element->href . '<br>';

// Find title
//foreach($html->find('title') as $element) 
//       echo $element->title . '<br>';
//exit;