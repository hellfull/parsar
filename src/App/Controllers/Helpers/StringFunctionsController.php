<?php

namespace Parsar\App\Controllers\Helpers;

class StringFunctionsController
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
    * Returns the trackable lines cleaned from symbols as needles in lineNeedles[]
    *
    **/
    public function clearLinesFromNeedles($needles)
    {
        $str = $this->str;

        foreach ($needles as $needle) {
            if (strpos($str, $needle.'s/') === false) {
                $str = str_replace($needle, '', $str);
            }
        }
        $str = trim($str);
        return $str;
    }

    public function deleteCharFromString($needles)
    {
        $str = $this->str;
        print_r($needles);
        foreach ($needles as $needle) {
            $str = str_replace($needle, '', $str);
        }
        $str = trim($str);
        return $str;
    }

    public function checkIfNeedled($needles)
    {
        foreach ($needles as $needle) {
            $pos = strpos($this->str, $needle);
            if ($pos !== false) {
                return 1;
            }
        }
        // return 0;
    }
}
