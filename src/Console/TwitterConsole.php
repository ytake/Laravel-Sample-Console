<?php

namespace Ytake\Laravel\SampleConsole\Console;

use Illuminate\Console\Command;
use Ytake\Laravel\SampleConsole\Client\Twitter;

/**
 * Class TwitterConsole
 */
class TwitterConsole extends Command
{
    /** @var string */
    protected $name = 'twitter:timeline';

    /** @var string */
    protected $description = 'simple twitter client for console';

    /**
     * @param Twitter $client
     */
    public function handle(Twitter $client)
    {
        // https://apps.twitter.com/ でアプリケーションを作成してから利用してください。
        $account = $this->ask('What is your name on Twitter?');
        $appKey = $this->ask('Please enter your Application Consumer Key', 'Consumer Key');
        $appSecret = $this->ask('Please enter your Application Consumer Secret', 'Consumer Secret');
        $result = $client->getCredential($appKey, $appSecret);
        $result = $client->getTimeLine($result->access_token, $account);
        $header = ['created_at', 'text'];
        $murmurs = [];
        foreach ($result as $row) {
            $murmurs[] = [
                $row->created_at,
                $row->text,
            ];
        }
        $this->table($header, $murmurs);
    }
}
