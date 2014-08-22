<?php
class Renderer {

    public static function output ($template, $data) {

        if (file_exists ($template)) {
            extract ($data);    
                    
            if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
                ob_start("ob_gzhandler");
            }
            else {
                ob_start();
            }
                    include $template;
                    $output = ob_get_contents();
                    $output = preg_replace('~>\s*\n\s*<~', '><', $output);
                    $output = str_replace("\n", '', $output);

            ob_end_clean ();

            header ('X-UA-Compatible: IE=Edge', true);
            header ('Content-Type: text/html; charset=utf-8', true);

            echo $output;
                                    
        }
        else {
            die('Error: Could not load template '.$template.'!');         
        }

    }

    public static function rss ($template, $data) {
        if (file_exists ($template)) {
            extract ($data);    
            header('Content-Type: text/xml; charset=utf-8', true);
            header('<?xml version="1.0" encoding="utf-8"?>');
            include $template;                                    
        }
        else {
            die('Error: Could not load template '.$template.'!');         
        }
    }

}

?>