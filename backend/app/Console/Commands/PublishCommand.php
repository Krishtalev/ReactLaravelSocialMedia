<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use phpcent\Client;

class PublishCommand extends Command
{
    public Client $client;
    public string $openweather_key;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client("http://centrifugo:8000/api", "api_key");
        $this->openweather_key = env("OPENWEATHER_KEY");
    }

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'publishCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Publish weather on channels";

    private function publishConcrete(int $id)
    {
        $concreteCity = City::get(new \Illuminate\Http\Request(), $id);

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id={$concreteCity['api_city_id']}&appid={$this->openweather_key}");
        $data = json_decode($response->body());
        $data->main->temp = rand(1, 500);

        $this->client->publish("{$concreteCity['name']}", $data);
    }

    private function publishRandom()
    {
        $cities = City::get(new \Illuminate\Http\Request());
        $city_id = array_rand($cities);

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id={$cities[$city_id]['api_city_id']}&appid={$this->openweather_key}");
        $data = json_decode($response->body());
        $data->main->temp = rand(1, 500);

        $this->client->publish("{$cities[$city_id]['name']}", $data);
    }

    private function publishFavourite()
    {
        $users = User::getAll(new \Illuminate\Http\Request());
        foreach ($users as $user) {
            $favourite = User::find($user['id'])
                ->cities()
                ->get(['id','api_city_id'])
                ->toArray();
            if (!$favourite) continue;
            $city_id = array_rand($favourite);

            $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id={$favourite[$city_id]['api_city_id']}&appid={$this->openweather_key}");
            $data = json_decode($response->body());
            $data->main->temp = rand(1, 500);

            $this->client->publish("userChannel#{$user['id']}", $data);
        }
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        while (true) {
            $this->publishConcrete(7);
            $this->publishRandom();
            $this->publishFavourite();
            sleep(10);
        }
    }
}
