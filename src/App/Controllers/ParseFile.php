<?php

namespace Parsar\App\Controllers;

use Parsar\App\Controllers\Helpers\StringFunctionsController;

class ParseFile
{
    /**
    * Accepts file path
    * Holds the function of parsing
    * return the lines of the file in array
    **/
    private $filepath;

    public function __construct($filepath)
    {
        if (!$filepath) {
            throw new ExceptionHandlerController('No file path specified');
        }
        $this->filepath = $filepath;
    }

    /**
    * Expects @String (Filepath)
    * returns @Array
    **/
    /* OLD Impl
    public function getLines()
    {
      $handle = fopen($this->filepath, "r");
      $text=fread($handle,filesize($this->filepath));
      return $lines=explode(PHP_EOL,$text);
    }
    */
    public function getLines()
    {
        $lines = [];
        foreach ($this->xgetLines($this->filepath) as $n => $line) {
            $lines[] = $line;
        }
        return $lines;
    }


    public function xgetLines($file)
    {
        $handle = fopen($file, "r");
        try {
            while ($line = fgets($handle)) {
                yield $line;
            }
        } finally {
            fclose($handle);
        }
    }

    public function getTrackableLines($needles, $line)
    {
        $strFunc = new StringFunctionsController($line);

        if ($strFunc->checkIfNeedled($needles) === 1) {
            return $line;
            // TODO logic to trach the path
        /*$paths_to_folow[$this->first_index_filepath][] =
        [
                "path_$count" => $this->get_value_from_needle($line)
        ];
        */
        }
    }

    /**
    * Expects @String (Filepath)
    * returns @?
    **/
    public function getJson()
    {
        $str = @file_get_contents($this->filepath);
        return json_decode($str, true);
    }
}
