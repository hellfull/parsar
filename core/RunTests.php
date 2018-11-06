<?php

class RunTests
{

  private $argument;

  public function __construct()
  {

  }

  public function newTest()
  {
    $class_str = '';
    foreach (get_class_methods($this) as $class)
    {
      //var_dump($class);
      if ($class != '__construct' && $class != 'newTest')
      {
          $class_str .= $class .' ';
      }
    }
    echo "Available methods: ".$class_str . " . Type the class you want to test:  ";
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $line = trim($line);
    $this->$line();
  }
  /**
  * Belongs to @class ParseFile tests getLine
  * Input filepath
  * returns @Array
  **/
  public function getLines()
  {
    echo "Type the file path to be parsed: ";
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $line = trim($line);

    $this->argument = $line;

    $filePath = $this->argument;
    $res = new ParseFile($filePath);
    $lines = $res->getLines();
    var_dump($lines);
  }
  /**
  * Belongs to @class ParseFile tests getJson
  * Input filepath
  * returns @Array
  **/
  public function getJson()
  {
    echo "Type the file path to be parsed: ";
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $line = trim($line);

    $this->argument = $line;

    $filePath = $this->argument;
    $res = new ParseFile($filePath);
    $lines = $res->getJson();
    var_dump($lines);
  }

  /**
  * Belongs to @class PhpRules tests getNeedles
  *
  * returns @Array
  **/
  public function getNeedles()
  {
      $n = new PhpRules();
      var_dump($n->getNeedles());
  }


}
