<?php

class ParseFile
{
  /**
  * Accepts file path
  * Holds the function of parsing
  * return the lines of the file in array
  **/
  private $file;

  public function __construct($file)
  {
    if (!$file)
    {
      throw new ExceptionHandlerController('No file path specified');
    }
    $this->file = $file;
  }

  /*
  * Check if the given file path exists
  * Returns @Boolean
  **/
  private function checkFilePath()
  {
    return file_exists($this->path);
  }

  /**
  * Expects @String (Filepath)
  * returns @Array
  **/
  public function getLines()
  {
    $handle = fopen($this->file, "r");
    $text=fread($handle,filesize($this->file));
    return $lines=explode(PHP_EOL,$text);
  }

  /**
  * Expects @String (Filepath)
  * returns @?
  **/
  public function getJson()
  {
    $str = @file_get_contents($this->file);
    return json_decode($str, true);
  }

}
