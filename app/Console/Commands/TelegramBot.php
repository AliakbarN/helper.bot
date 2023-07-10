<?php

namespace App\Console\Commands;

use App\Services\CustomBots\LyricBot;
use App\Services\CustomBotsManager;
use Illuminate\Console\Command;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;

class TelegramBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:telegram-bot';

    protected $name = 'run:telegram-bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs Helper Telegram Bot';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $bot = new Nutgram($_ENV['TELEGRAM_BOT_TOKEN']);
            dump('....Listening');
            $botsManager = new CustomBotsManager($bot);

            $botsManager->process();

            $bot->run();
        } catch (\Exception $exception) {
            dump($exception->getMessage());

            exec('php artisan run:telegram-bot');
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            dd($e->getMessage());
        }
    }
}
