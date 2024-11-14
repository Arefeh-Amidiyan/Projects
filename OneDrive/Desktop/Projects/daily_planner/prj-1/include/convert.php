<?php
function convert_persian_to_latin_number($num_persian){
   $persian_number = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
   //print_r($persian_number);
    $latin_number = range(0,9);
  // print_r($latin_number);
    $num_persian = str_replace($persian_number,$latin_number,$num_persian);
    return $num_persian;
}

?>
