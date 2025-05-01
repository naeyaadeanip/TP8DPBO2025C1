<?php

class Template{
    var $filename = '';
    var $content = '';

    function __construct($filename = ''){
        $this->filename = $filename;

        $this->content = implode('', @file($filename));
    }

    function clear(){
        $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);
    }

    function write(){
        $this->clear();
        print $this->content;
    }

    function getContent(){
        $this->clear();
        return $this->content;
    }

    function replace($old = '', $new = ''){
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        } elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        } elseif (is_array($new)) {
            $value = '';
            foreach ($new as $item) {
                $value .= $item . ' ';
            }
            $value = trim($value); 
        } elseif (is_null($new)) {
            $value = ''; 
        } else {
            $value = (string) $new; 
        }
    
        $this->content = preg_replace("/" . preg_quote($old, "/") . "/", $value, $this->content);
    }
    
}