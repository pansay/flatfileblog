<?php

class Arrays {

    # resets array keys to 0,1, etc.
    public static function array_reset ($array) {
        $array_new = array();
        if (is_array($array)) {
            foreach ($array as $value) {
                $array_new[] =  $value;
            }
            return $array_new;
        }
        else {
            return array();
        }
    }

    # sorts an array in alphabetical order and resets array keys
    public static function array_sort ($array) {
        if (is_array($array)) {
            natcasesort($array);
            $array = array_reverse($array);
            $array = self::array_reset($array);
        }
        return $array;
    }

}

?>