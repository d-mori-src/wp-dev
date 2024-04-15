<?php

class escapeValue {
    public function escapeGet($array){
        $result = [];
        foreach($array as $val) {
            $result[$val] = filter_input(INPUT_GET, $val, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $result;
    }
    public function escapePost($array){
        $result = [];
        foreach($array as $val) {
            $result[$val] = filter_input(INPUT_POST, $val, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $result;
    }
}

$escaper = new escapeValue();
$keysToEscape = ['box', 'fullname', 'email', 'tel', 'message', 'agree', 'confirm', 'submit'];
$esc = $escaper->escapePost($keysToEscape);