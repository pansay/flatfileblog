<?php

class CSV { 
    
    /*
    public static function convert(&$item,$key,$params)
    {
        $item = mb_convert_encoding($item,$params['to'],$params['from']);
    }   */
    
    public static function file2array($file) {
        $texts = array();
        if (($handle = fopen($file,"r")) !== false) {               
            setlocale(LC_ALL,'fr_FR.ISO-8859-1');               
            while (($data = fgetcsv($handle,0,";")) !== false) {
                /*if($utf8_convert)         
                {                   
                    $params['to'] = 'UTF-8';
                    $params['from'] = 'ISO-8859-1';                                         
                    array_walk ($data,array('self','convert'),$params);                         
                }    */
                $texts[] = $data;
            }           
            fclose($handle);
            //setlocale(LC_ALL,DEFAULT_LOCALE);                     
        }   
        return $texts;
    }   
    
    public static function basic($file) {
        $texts = array();
        $texts_two_columns = array();
        $texts = self::file2array($file);
        foreach($texts as $key=>$value) {
            $texts_two_columns[$value[0]] = $value[1];  
        }
        return $texts_two_columns;
    }   

    public static function column($file,$column) {
        $texts = array();
        $texts_n_columns = array();
        $texts = self::file2array($file);
        $lang_key = array_search($column,$texts[0]); 
        unset($texts[0]);
        foreach($texts as $key=>$value) {
            if(isset($value[$lang_key])) {
                $texts_n_columns[$value[0]] = $value[$lang_key]; 
            } else {
                $texts_n_columns[$value[0]] = '['.$value[0].'-'.$column.']'; 
            }
        }
        return $texts_n_columns;
    }   
}


?>