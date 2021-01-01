<?php

namespace App\Console\Commands\Steam;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;

class UpdateGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'steam:update-game {game?}';
    // protected $signature = 'steam:update-game {game=FIFA}';
    protected $signature = 'steam:update-game {game}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the game list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        $this->httpClient = $httpClient;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $game = $this->argument('game');
        // dump($game);

        // $answer = $this->ask("Czy to Twoja ulubiona gra?");

        // dump($answer);

        // // $result = $this->confirm("Czy chcesz zaktualizować grę?");

        // // if($this->confirm("Czy chcesz zaktualizować grę?")) {
        // //     dump('Zrobiłeś to. Zaktualizowano ' . $game);
        // // }

        // // dump($result);

        // $this->error('Error ...');

        // $this->question('Question ...');

        // $this->comment('Comment ...');

        // $this->info('Info ...');

        // $this->line('Line ...');

        // $response = Http::get('https://postman-echo.com/get', [
        //     'foo' => 'bar',
        //     'alfa' => 'omega'
        // ]);

        // $response = $this->httpClient->get('https://postman-echo.com/get', [
        //     'foo' => 'bar',
        //     'alfa' => 'omega'
        // ]);

        $response = $this->httpClient->post('https://postman-echo.com/post', [
            'foo' => 'bar',
            'alfa' => 'omega',
            'post' => true
        ]);

        dump($response->status());
        dump($response->json());

        if($response->failed()) {
            $this->error('Error...');
        }
        return 0;
    }
}
