<?php

namespace App\Services\AncillaryServices\Interfaces;

use SergiX44\Nutgram\Nutgram;

abstract class IBot
{
    protected Nutgram $bot;

    public static function create(Nutgram $bot) :void
    {
        $cl = get_called_class();
        $cbot = new $cl($bot);

        if ($cbot instanceof IHandle) {
            $cbot->handle();
        }
    }
}
