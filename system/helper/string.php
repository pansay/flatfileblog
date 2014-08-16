<?php

class String {
    public static function cleanName($string) {
        $string = preg_replace('/[^a-z0-9_\-]/i','',$string);
        return $string;
    }

    public static function cleanClassName($string) {
        $string = preg_replace('/[^a-z0-9]/i','',$string);
        return $string;
    }   

    public static function cleanRoute($string) {
        //$string = preg_replace('/[^a-z0-9_\-\/]/i','',$string);   
        $string = preg_replace('/[^a-z0-9_\-]/i','',$string);
        return $string;
    }

    public static function cleanFilename($string) {
        $string = preg_replace('/[^a-z0-9_\-\.]/i','',$string);         
    }

}

?>