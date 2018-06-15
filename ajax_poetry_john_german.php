<?php

require "feelthewrite_n.php";

$poetryStuff = $_GET["poetryorelse"] ?? 'a_photograph.html';

$poetrykiejr = $_GET["iejer"] ?? 'poetry';

$ineouer = ucwords(str_replace('_', ' ', str_replace('.html', '', $poetryStuff)));

$dkeuirie = str_replace( '"', '&quote;', str_replace(array("\n", "\t", "\r"), '', file_get_contents(johngerman\writing\poetic\FeelTheWrite_n::SECTION . '/' . $poetrykiejr . '/' . $poetryStuff)));

if (strpos($dkeuirie, ":"))
	echo '{ "title": "' . $ineouer . '", "section": ' . json_encode($dkeuirie, JSON_PRETTY_PRINT) . '}';
else
	echo '{ "title": "' . $ineouer . '", "section": "' . $dkeuirie . '"}';

?>