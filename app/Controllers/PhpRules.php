<?php

class PhpRules
{
  private $needles;
  private $web_dir;

  public function __construct()
  {
    $this->needles = ['require_once', 'include_once','include','require'];
    $this->web_dir = ['web', 'public', 'public_html', 'public_www', 'www'];
  }

  public function getNeedles()
  {
    return $this->needles;
  }

  public function getWebDir()
  {
    return $this->web_dir;
  }
}
