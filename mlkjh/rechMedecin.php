<?php

 include './phpLib/logger.php';

$key_words= $_GET['key_words']; 

 new logTracing(" key_words :".$key_words);

echo  $key_words;






?>