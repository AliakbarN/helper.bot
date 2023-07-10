<?php

namespace App\Services\CustomBots;

use App\Services\AncillaryServices\Interfaces\IBot;
use App\Services\AncillaryServices\Interfaces\IHandle;
use SergiX44\Nutgram\Nutgram;

class LyricBot extends IBot implements IHandle
{
    protected Nutgram $bot;

    public function __construct(Nutgram $bot)
    {
        $this->bot = $bot;
    }

    public function handle(): void
    {
        $this->bot->onCommand('start', function(Nutgram $bot) {
            $bot->sendMessage('Ciao!');
        });
    }
}
