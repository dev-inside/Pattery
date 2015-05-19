<?php
/**
* Options
*
* The Options-class uses system/config/config.yaml
* for the allowed files or extensions
*
* @package Pattery
* @author Konrad Schneider <info@gregg.in>
* @copyright Konrad Schneider
*
*/
class Options{

/**
* types
* the allowed filetypes stored in system/config/config.yaml
*
* @return array()
*
*/
public static function types(){
    return paths::options('types');
}

/**
* extensions
* enables/disables the extension in the sidebar
* stored in system/config/config.yaml
*
* @return array()
*
*/
public static function extensions(){
    return paths::options('extensions') == strtolower('on');
}

/**
* style
* select the style of the documentation
*
* @return string
*
*/
public static function style(){
    return 'themes/style.' . paths::options('style');
}

/**
* style
* select the style of the documentation
*
* @return string
*
*/
public static function code(){
    return 'code/' . paths::options('codecolor');
}

/**
* mime-types
* return the correct mimetype
*
* @return string
*
*/
public static function mime($select = null){

    $mime = array(
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'jade' => 'text/html',
        'haml' => 'text/html',
        'slim' => 'text/html',
        'markdown' => 'text/html',
        'md' => 'text/html',
        'mdown' => 'text/html',
        'kit' => 'text/html',
        'xhtml' => 'text/html',
        'js' => 'text/javascript',
        'json' => 'text/javascript',
        'coffee' => 'text/javascript',
        'coffeescript' => 'text/javascript',
        'coffeescripts' => 'text/javascript',
        'ls' => 'text/javascript',
        'livescript' => 'text/javascript',
        'livescripts' => 'text/javascript',
        'css' => 'text/css',
        'less' => 'text/css',
        'sass' => 'text/css',
        'scss' => 'text/css',
        'styl' => 'text/css',
        'stylus' => 'text/css',
        'php' => 'text/php',
        'php3' => 'text/php',
        'php4' => 'text/php',
        'php5' => 'text/php',
        'yaml' => 'text/yaml',
        'yml' => 'text/yaml',
        'yaml' => 'text/yaml',
        );

        if(in_array($select, $mime)){
            return $mime[$select];
        }
        else{
            return $mime['html'];
        }

    }

}
?>