<?php
/**
 * Created by PhpStorm.
 * User: Ananyaa
 * Date: 18-Jul-20
 * Time: 10:10 AM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

function generatePkCode($previousCode, $prefix, $length)
{
    $lastCode = str_replace($prefix, '', $previousCode);

    $lastCode = $lastCode + 1;

    $newCode = $prefix;

    $i = 0;

    $zeroCounts = $length - (strlen($prefix) + strlen($lastCode));

    while ($i < $zeroCounts) {
        $newCode .= '0';
        $i++;
    }
    $newCode .= strval($lastCode);

    return $newCode;
}
