<?php

class ParsePath
{
  // Source path given
  private $path;

  private $recursive;

  public function __construct( $path, $recursive = false )
  {
    $this->path = $path;
    $this->recursive = $recursive;
  }

  public function getPathExistance()
  {
    return file_exists($this->path);
  }

  public function findAllIndexes()
  {
    //TODO
  }

  public function getWebDirIndex()
  {
    exec("find $this->path -type f -name \"index.*\"", $arr, $stat);
    foreach($arr as $str)
    {
      foreach ($this->xGetWebDirIndex($str) as $indexPath) {
        return $indexPath;
      }
    }
  }

  private function xGetWebDirIndex($path)
  {
    $phpRules = new PhpRules();
    $needles = $phpRules->getWebDir();
    foreach ($needles as $needle)
    {
      $pos = strpos($path, $this->path."/".$needle."/index.php");
      if ( $pos !== false )
      {
        yield $path;
      }
    }
  }
}
