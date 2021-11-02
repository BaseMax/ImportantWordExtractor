# Important Word Extractor

A tiny PHP class-based program to analyze an input file and extract all of that words and detect how many times every word is repeated. (It's not case sensitive)

### Purpose

If you want to learn a new language and need to know the most used words in a language. you can get help from this program to detect how many times each word is repeated and sort the most used words. finally you are able to get an export report to know important words.

## Using

```php
<?php
require "extractor.php";

$extractor = new WordExtractor("input.txt");
$res = $extractor->extract();
print_r($res);
$extractor->saveFile($res);
```

© Copyright 2021, Max Base
