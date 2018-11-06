<?php

class PhpRules
{
  private $needles;

  public function __construct()
  {
    $this->needles = ['require_once', 'include_once','include','require'];
  }

  public function getNeedles()
  {
    return $this->needles;
  }
}
