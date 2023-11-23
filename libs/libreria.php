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

function validateEmail($email )
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        return false;
}

function validateTelefono($telefono )
{
    if(! preg_match('/^[6]{10}+$/', $telefono)) 
        return false;
}
?>