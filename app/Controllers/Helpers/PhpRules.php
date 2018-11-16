<?php

class PhpRules
{
  private static $needles = ['require_once', 'include_once','include','require'];
  private static $web_dir = ['web', 'public', 'public_html', 'public_www', 'www'];
  private static $line_needles = [ '\'','"','(',')'];

  public static function getNeedles()
  {
    return self::$needles;
    //return static::$needles;
  }

  public function getWebDir()
  {
    return self::$web_dir;
  }

  public static function getLineNeedles()
  {
    return self::$line_needles;
  }
}
