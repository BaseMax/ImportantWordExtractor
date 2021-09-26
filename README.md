# ImportantWordExtractor

A tiny PHP class-based program to analyze an input file and extract all of that words and detect how many times every word is repeated. (It's not case sensitive)

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
