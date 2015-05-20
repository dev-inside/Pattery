<?php
/**
 * Paths
 *
 * All relevant Pattery-Paths
 *
 * @package Pattery
 * @author Konrad Schneider <info@gregg.in>
 * @copyright Konrad Schneider
 *
 */
class Paths{

	/**
      * options
      * returns an array of the options
      * stored in system/config/config.yaml
      *
      * @param mixed
      * @return array()
      *
      */
	static function options($select = null){
		$options = Spyc::YAMLLoad('system/config/config.yaml');
		return $options[$select];
	}

	/**
      * system-directory
      *
      * @param mixed
      * @return string
      *
      */
	static function system($path = null){
		return 'system/' . ($path == TRUE ? $path . DS : '');
	}

	/**
      * content-directory
      *
      * @param mixed
      * @return string
      *
      */
	static function content($path = null){
		return 'content/' . $path;
	}

	/**
      * pattery-assets-folder
      *
      * @param mixed
      * @return string
      *
      */
	static function assets($path = null){
		return 'app/assets/' . $path;
	}

	/**
      * pattery-css-folder
      *
      * @param mixed
      * @return string
      *
      */
	static function css($path = 'style'){
		return '<link rel="stylesheet" href="' . self::assets() . 'css/' . $path . '.css">';
	}

	/**
      * custom-less-folder
      *
      * @param mixed
      * @return string
      *
      */
	static function less($path = 'style'){
		return '<link rel="stylesheet" href="' . self::system() . 'assets/style/' . $path . '.less" type="text/less" media="screen">';
	}

	/**
     * pattery-js-folder
     *
     * @param mixed
     * @return string
     *
     */
	static function js($path = 'scripts'){
		return '<script src="' . self::assets() . 'js/' . $path . '.js"></script>';
	}
}
?>