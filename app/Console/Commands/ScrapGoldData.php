<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\Models\Gold;
use App\Models\Silver;

class ScrapGoldData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrap gold and silver data from bajus.org and save to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://www.bajus.org/gold-price';
        $client = new HttpBrowser(HttpClient::create());
        $client->request('GET', $url);
        $content = $client->getResponse()->getContent();
        $dom = new \DOMDocument();
        @$dom->loadHTML($content);
        $tableRows = $dom->getElementsByTagName('tr');
        $tableData = [];

        foreach ($tableRows as $row) {
            $price = (int) preg_replace('/[^0-9]/', '', $row->getElementsByTagName('span')->item(0)->nodeValue ?? 0);
            $price == 0 ?: array_push($tableData, $price);
        }

        $gold = array_slice($tableData, 0, 4);
        $silver = array_slice($tableData, 4, 8);

        $goldModel = new Gold();
        $goldModel->k18 = $gold[2];
        $goldModel->k21 = $gold[1];
        $goldModel->k22 = $gold[0];
        $goldModel->traditional = $gold[3];
        $goldModel->save();

        $silverModel = new Silver();
        $silverModel->k18 = $silver[2];
        $silverModel->k21 = $silver[1];
        $silverModel->k22 = $silver[0];
        $silverModel->traditional = $silver[3];
        $silverModel->save();
    }
}
