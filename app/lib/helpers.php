<?php

if(!defined('Pattery')) {
	die('Direct access not permitted');
}

    /**
      * autoloader
      *
      * @param @class
      * @return array
      *
      */
    spl_autoload_register(function($class){
    	include 'classes/' . strtolower($class) . '.php';
    });

    /**
      * dump-helper
      *
      * @param array
      * @return readable formatted array
      *
      */
    function dump($array = array()){
    	echo '<pre>';
    	print_r($array);
    	echo '</pre>';
    }

    /**
      * assets-path
      *
      * @param $path
      * @return string
      *
      */
    function assets($path = null){
    	return paths::assets($path) . "\n";
    }

    /**
      * url
      *
      * @param $path
      * @return string
      *
      */
    function url($path = null){
    	return $path;
    }

    /**
      * files-path
      *
      * @param $path
      * @return string
      *
      */
    function files($path = null){
    	return 'files/' . $path;
    }

    /**
      * css-path
      *
      * @param $path
      * @return string
      *
      */
    function css($path = null){
    	return paths::css($path) . "\n";
    }

    /**
      * less-path
      *
      * @param $path
      * @return string
      *
      */
    function less($path = null){
    	return paths::less($path) . "\n";
    }

    /**
      * js-path
      *
      * @param $path
      * @return string
      *
      */
    function js($path = null){
    	return paths::js($path)  . "\n";
    }

    /**
      * img-path
      *
      * @param $path
      * @return string
      *
      */
    function img($path = null){
    	return paths::img($path)  . "\n";
    }

    /**
      * snippet-path
      *
      * @param $path
      * @return string
      *
      */
    function snippet($path = null){
    	return paths::system('snippets') . $path . '.php';
    }

    /**
      * render-path
      *
      * @param $path
      * @return string
      *
      */
    function render($path = null){
    	return paths::system() . $path . '.php';
    }

    ?>
