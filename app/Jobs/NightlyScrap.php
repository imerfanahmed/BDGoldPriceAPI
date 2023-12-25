<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\Models\Product;

class NightlyScrap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = 'https://www.bajus.org/gold-price';
        $client = new HttpBrowser(HttpClient::create());
        $client->request('GET', $url);
        $content = $client->getResponse()->getContent();
        $dom = new \DOMDocument();
        @$dom->loadHTML($content);
        $tableRows = $dom->getElementsByTagName('tr');
        foreach ($tableRows as $row) {
            $price = $row->getElementsByTagName('td')->item(1)->textContent ?? '';
            $price = (int) preg_replace('/[^0-9]/', '', $price);
            $rowData = [
                'product' => trim($row->getElementsByTagName('th')->item(0)->textContent),
                'description' => trim($row->getElementsByTagName('td')->item(0)->textContent  ?? '').' BDT/Gram',
                'price' => $price,
            ];
            if($rowData['price'] != 0){
                Product::create($rowData);
            }
        }
    }
}
