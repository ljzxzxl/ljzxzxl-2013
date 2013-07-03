<?php
$xml = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<books>
	<book id="1">
		<title>Code Generation in Action</title>
		<author><first>Jack</first><last>Herrington</last></author>
		<publisher>Manning</publisher>
	</book>
	<book id="2">
		<title>PHP Hacks</title>
		<author><first>Jack</first><last>Herrington</last></author>
		<publisher>O'Reilly</publisher>
	</book>
	<book id="3">
		<title>Podcasting Hacks</title>
		<author><first>Jack</first><last>Herrington</last></author>
		<publisher>O'Reilly</publisher>
	</book>
</books>
EOF;
echo $json = json_encode(simplexml_load_string($xml));
?>