<?php

    echo "Are we practicing?";

    include('../vendor/autoload.php');

    use NlpTools\Tokenizers\WhitespaceAndPunctuationTokenizer;

    $text = "This is AR";

    $tok = new WhitespaceAndPunctuationTokenizer();

    print_r($tok->tokenize($text));



    //--------------------------->

    use NlpTools\Tokenizers\WhitespaceTokenizer;
    use NlpTools\Similarity\CosineSimilarity;
    $text1="this is Ar";
    $text2="this is Ar";
    $similarity = new CosineSimilarity();
    $tokenizer = new WhitespaceAndPunctuationTokenizer();
    //$text1 = strip_punctuation(strip_html_tags($text1));
    //$text2 = strip_punctuation(strip_html_tags($text2));
    $setA = $tokenizer->tokenize($text1);
    $setB = $tokenizer->tokenize($text2);
    // If these sets are similar, the result is 1.00000;
    $result = $similarity->similarity($setA, $setB);

    echo "similarity is - ".$result;



?>
<!DOCTYPE html>
<html>
    <head>
        <title>practice</title>
    </head>

    <body>
        <H1>Lets practice</H1>
    </body>
</html>
