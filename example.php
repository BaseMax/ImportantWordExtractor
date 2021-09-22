<?php
require "extractor.php";

$extractor = new WordExtractor("input.txt");
$res = $extractor->extract();
print_r($res);
$extractor->saveFile($res);
