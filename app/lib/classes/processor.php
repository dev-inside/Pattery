<?php
/**
 * Processor
 * All the magic happens here ;)
 *
 * @package Pattery
 * @author Konrad Schneider <info@gregg.in>
 * @copyright Konrad Schneider
 *
 */
class Processor{

  public $file = array();

  public function __construct($file){
    $this->file         = $file;
    $this->num          = $this->num();
    $this->extension    = $this->extension();
    $this->category     = ($this->category() == TRUE ? $this->category() : '00-Main');
  }

    /**
      * allowed-types to render
      *
      * @return array
      *
      */
    public function allowed(){
      $this->allowed = array('html', 'htm', 'md', 'markdown');
      return $this->allowed;
    }

    /**
      * Get Number of File
      *
      * @return string
      *
      */
    public function num(){
      $matches = str_replace('content/', '', $this->getFilename());
      $matches = explode('-', $matches);
      return $matches[0];
    }

    /**
      * strips off the file-extension
      *
      * @return string
      *
      */
    public function extension(){
      $matches = explode('.', $this->file);
      return $matches[1];
    }

    /**
      * get content from file
      *
      * @return string
      *
      */
    public function read(){
      $html = file_get_contents($this->file);
      return mb_convert_encoding($html, 'UTF-8', 
        mb_detect_encoding($html, 'UTF-8, ISO-8859-1', true));
    }

    /**
      * splits the text-file to an array
      *
      * @return array
      *
      */
    public function data(){
      $getcontent = $this->read($this->file);
      $getcontent = preg_split('!\n====\s*\n*!', $getcontent);
      $this->code = end($getcontent);
      $getcontent = array_filter($getcontent);

      foreach($getcontent as $line){
        list($key, $val) = explode(":", $line, 2);

        $key = trim($key);
        $key = preg_replace( "/\r|\n/", "", $key);
        $val = trim($val);

        $key = strtolower($key);
        if(!empty($key)){
          $result[$key] = $val;
        }
      }
      return $result;
    }

    /**
      * selects your key=>value
      * from the content
      *
      * @param mixed
      * @return string
      *
      */
    public function select($select = null){
      $data = $this->data($this->file);
      if(!empty($data[$select])){
        return $data[$select];
      }
    }

    /**
      * returns unformatted text
      *
      * @param mixed
      * @return string
      *
      */
    public function txt($select = null){
      return $this->select($select);
    }

    /**
      * if-case to hide the codeblock
      *
      * @return string
      *
      */
    public function showcode(){
      return $this->select('showcode');
    }

    /**
      * returns a the markdown-block
      *
      * @param mixed
      * @return string
      *
      */
    public function content($select = 'content'){
      $content = $this->select($select) . "\n";
      $md = new Parsedown();
      return $md->text($content) . PHP_EOL;
    }

    /**
      * returns a the html-block
      *
      * @param mixed
      * @return string
      *
      */
    public function html($select = 'pattern'){
      if(in_array($this->extension($this->file), $this->allowed($this->file))){
        $html = $this->select($select);
        $md = new Parsedown();
        $sec = '<section class="body">' . "\n";
        $sec .= $md->text($html) . PHP_EOL;
        $sec .= '</section>' . "\n";
        return $sec;
      }
    }

    /**
      * returns a the code-block
      *
      * @param mixed
      * @return string
      *
      */
    public function code($select = 'pattern'){
      if($this->showcode() != strtolower('no')){
        $pattern = '```' . $this->extension() . "\n";
        $pattern .= $this->select($select) . "\n";
        $pattern .= '```' . "\n";
        $md = new Parsedown();
        if(strlen($this->select($select)) != 0){
          return $md->text($pattern) . PHP_EOL;
        }
      }
    }

    /**
      * returns a the raw-block
      * for the overlay
      *
      * @param mixed
      * @return string
      *
      */
    public function raw($select = 'pattern'){
      if($this->showcode() != strtolower('no')){
        if(strlen($this->select($select)) != 0){
          return '<xmp class="uk-text-break">' . $this->select($select) . '</xmp>' . PHP_EOL;
        }
      }
    }

    /**
      * strips off the filename
      *
      * @return string
      *
      */
    public function getFilename(){
      $file = explode(DS, $this->file);
      $file = end($file);
      return $file;
    }

    /**
      * removes the sort-number from
      * the Category
      *
      * @return string
      *
      */
    public function category(){
      $category = str_replace('content' . DS, '', $this->file);
      $category = str_replace($this->getFilename(), '', $category);
      $category = rtrim($category, DS);
      $category = explode(DS, $category);
      if(!empty($category)){
        return end($category);
      }
    }

    /**
      * the file-id
      *
      * @return string
      *
      */
    public function id(){
      $file = str_replace('content' . DS, '', $this->file);
      $file = str_replace(DS, '-', $file);
      return preg_replace('/.[^.]*$/', '', $file);
    }

    /**
      * returns the Filename as Title
      * without extension and number
      *
      * @return string
      *
      */
    public function fname(){
      $file = preg_replace('/(^[0-9])\w+-/', '', $this->getFilename());
      $file = preg_replace('/.[^.]*$/', '', $file);
      return mb_convert_case($file, MB_CASE_TITLE, "UTF-8");
    }

    /**
      * returns the Category as Title
      * without number
      *
      * @return string
      *
      */
    public function catTitle(){
      $title = preg_replace('/(^[0-9])\w+-/', '', $this->category());
      $title = preg_replace('/\\.[^.\\s]{2,3}$/', '', $title);
      return mb_convert_case($title, MB_CASE_TITLE, "UTF-8");
    }
  }
  ?>