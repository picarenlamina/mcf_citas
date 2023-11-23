<?php

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}


function validateTime($date, $format = 'H:i')
{
   $d = DateTime::createFromFormat($format, $date);
   return $d && $d->format($format) == $date;
}
?>