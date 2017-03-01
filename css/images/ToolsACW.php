<?php
/**
*
*/
namespace DWA;

class ToolsACW {

    /**
    * Pretty print given value to screen
    */
    public static function dump($mixed = null) {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
    }

    # Alias for above method
    public static function d($mixed = null) {
        self::dump($mixed);
    }


    /**
    * Pretty print given value to screen, then die
    */
    public static function diedump($mixed = null) {
        self::dump($mixed);
        die();
    }

    # Alias for above method
    public static function dd($mixed = null) {
        self::diedump($mixed);
    }

##################################################
public static function sanitize($mixed = null) {
    if(!is_array($mixed)) {
        return convertHtmlEntities($mixed);
    }

       function array_map_recursive($callback, $array) {
            $func = function ($item) use (&$func, &$callback) {
            return is_array($item) ? array_map($func, $item) : call_user_func($callback, $item);
        };
        return array_map($func, $array);
    }
    return array_map_recursive('convertHtmlEntities', $mixed);
}

static function convertHtmlEntities($mixed) {

    return htmlentities($mixed, ENT_QUOTES, "UTF-8");

}

} # end of class