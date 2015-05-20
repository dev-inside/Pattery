<?php
/**
* Site
*
* The Site-Object contains all important
* meta-informations about the Website.
*
* @package Pattery
* @author Konrad Schneider <info@gregg.in>
* @copyright Konrad Schneider
*
*/
class Site{

    /**
     * site-construct
     *
     * @return array()
     *
     */
	public function __construct() {
        $content =  Spyc::YAMLLoad('system/config/site.yaml');
        foreach($content as $key => $value){
            $this->{$key} = $value;
        }
    }
}