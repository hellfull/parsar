<?php

namespace Parsar\Core;

class Json
{
    public function __construct()
    {
        //
    }

    public function stringToJson($key, $term)
    {
        return "{ \"data\": { \"$key\" : \"$term\" } }";
    }
}
