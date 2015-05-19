<?php
/**
 * Files
 *
 * The Files-Object reads the content of the content-directory
 * and initializes the Processor-Object.
 *
 * @package Pattery
 * @author Konrad Schneider <info@gregg.in>
 * @copyright Konrad Schneider
 *
 */
class Files{

	/**
	 * construct
	 *
	 */
	public function __construct(){
		$files = $this->dir();
		ksort($files);
		foreach($files as $key => $value){
			$file = new Processor($value);
			if(in_array($file->extension(), Options::types())){
				$this->{$key} = $file;
			}
		}
	}

	/**
	 * dir-function
	 * The dir-function use the RDI to return all files and folders
	 * beneath the content-diretory.
	 *
	 * @return array()
	 *
	 */
	public function dir(){
		$directory = new RecursiveDirectoryIterator(paths::content());
		$files = new RecursiveIteratorIterator($directory);
		$storage = '';
		foreach ($files as $path => $contains){
			$category = str_replace('content' . DS, '', $path);
			$last = explode(DS, $category);
			$last = end($last);
			$category = str_replace($last, '', $category);
			$storage[(!empty($category) ? $category : '00-Main') . '-' . $last] = $path;
		}
		return $storage;
	}

}
?>