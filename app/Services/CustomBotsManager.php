<?php

namespace App\Services;

use App\Services\AncillaryServices\HelperFunctions\GetBots;
use App\Services\CustomBots\LyricBot;
use Exception;
use SergiX44\Nutgram\Nutgram;
use App\Services\AncillaryServices\Interfaces\IBot;

class CustomBotsManager
{
    /**
     * @var IBot[]
     */
    protected array $bots = [
        //LyricBot::class,
    ];

    protected Nutgram $nbot;

    public function __construct (Nutgram $bot)
    {
        $this->nbot = $bot;
        $this->bots = GetBots::get();
    }

    /**
     * @throws Exception
     */
    public function process () :void
    {
        foreach ($this->bots as $bot)
        {
            if (!is_a($bot, IBot::class, true)) {
                throw new Exception('The bot [' . $bot . '] does not implements IBot');
            }

            $bot::create($this->nbot);
        }
    }
}
