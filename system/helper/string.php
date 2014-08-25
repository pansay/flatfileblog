<?php

class String {

    public static function cleanRoute ($string) {
        $string = preg_replace('/[^a-z0-9_\-]/i', '', $string);
        return $string;
    }

}

?>