<?php
    
    /**
     * Strip characters from string and add …
     */
    function pn_trim_max_characters($string, $max) {
        if (strlen($string) > 0 && strlen($string) > $max) {
            $pos = strpos($string, ' ', $max);
            return substr($string, 0, $pos) . '...';
        } else {
            return $string;
        }
    }

?>