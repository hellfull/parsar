<?php

class StringFunctionsController
{
  private $str;

  public function __construct($str)
  {
      $this->str = $str;
  }

  // TODO scrap
  public function clearLineFromNeedles()
  {
    foreach ($this->xClearLineFromNeddles($lines, $needle) as $str)
    {
      return $str;
    }
  }

  //TODO scrap
  private function xClearLineFromNeddles($lines,$needle)
  {
    foreach ($lines as $line)
    {
      $line = str_replace($needle.' ','',$line);
      $line = trim($line);
      yield $line;
    }
  }

  public function checkIfNeedled($needles)
  {
    foreach ($needles as $needle)
    {
      $pos = strpos($this->str, $needle);
      if ($pos !== false)
      {
        var_dump($this->str);
        return 1;
      }
    }
    //var_dump('in 0');
    return 0;
  }
}
