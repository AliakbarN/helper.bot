<?php

namespace App\Services\AncillaryServices\HelperFunctions;

class GetBots
{
    public static function get() : array
    {
        $files = scandir(__DIR__ . '/../../CustomBots');
        unset($files[0], $files[1]);
        $result = [];

        foreach ($files as $file)
        {
            $fileName = (explode('.', $file))[0];
            $result[] = str_replace('/', '\\', ('App/Services/CustomBots/' . $fileName));
        }

        return $result;
    }
}
