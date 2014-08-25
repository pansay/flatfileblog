<?php

class CSV {

    public static function file2array ($file) {
        $texts = array();
        if (($handle = fopen($file, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                $texts[] = $data;
            }
            fclose($handle);
        }
        return $texts;
    }

    public static function basic ($file) {
        $texts = array();
        $texts_two_columns = array();
        $texts = self::file2array($file);
        foreach ($texts as $key => $value) {
            $texts_two_columns[$value[0]] = $value[1];
        }
        return $texts_two_columns;
    }

}

?>