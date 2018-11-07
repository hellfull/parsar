<?php

//require constant("APP_PATH").'/core/App.php';
class PhpParsar
{
  private $path;
  private $first_index_filepath;
  private $needles;
  public $app_path;
  private $pointer_value;
  private $number_of_paths_found;
  private $itteration_level;

  public function __construct($path)
  {
    $this->path = $path;
    $this->app_path = constant('APP_PATH');

    $needles = new PhpRules();
    $this->needles = $needles->getNeedles();

    echo "Starting...\n";
    //$this->check_if_unchecked_paths_exist();
  }

  public function start()
  {
      $this->parse();
  }

  /**
  * Read the file that has the pahs to be followed
  * Returns array
  **/
  private function read_path_to_follow()
  {
    // new ParseFile -> getJson
  }

  private function parse()
  {
    //TODO use ParsePath instead
    $parsePath = new ParsePath($this->path);

    if ( !$parsePath->getPathExistance() )
    {
      echo ("Path: ".$this->path." does not exist. Exiting...");
      exit;
    }

    $this->first_index_filepath = $parsePath->getWebDirIndex();

    if ( !$this->first_index_filepath )
    {
      echo "webdir index.php file not found in the path: ".$this->path.". Try to specify the exact path. Exiting... \n";
      exit;
    }
    $lines = [];
    $parseFile = new ParseFile($this->first_index_filepath);

    $lines = $parseFile->getLines();
    print_r($lines);
    die()
    //TODO continue
  }

  // TODO write class that clears strings 
  private function get_value_from_needle($line)
  {
    //$matches = preg_quote('/()\'\")/', $line);
    $str = str_replace('\'','',$line);
    $str = str_replace('"','',$str);
    $str = str_replace('(','',$str);
    $str = str_replace(')','',$str);
    foreach ($this->needles as $needle)
    {
      $str = str_replace($needle.' ','',$str);
    }
    $str = trim($str);
    return $str;
  }

// TODO create Class to do the file schema $this->write_path_to_follow($paths_to_folow);
  private function write_path_to_follow($paths_to_folow)
  {
    $file = fopen($this->app_path.'/app/data/pathstofollow.json', "w");
    fwrite($file,json_encode($paths_to_folow));
    $this->number_of_paths_found += 1;
  }
}
