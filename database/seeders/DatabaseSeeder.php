<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $client = new Client();
        $response = $client->post("https://recruitment.fastprint.co.id/tes/api_tes_programmer", [
            "form_params" => [
                "username" => "tesprogrammer150623C11",
                "password" => "08e76122495055f8fef1f7e1b5653040"
            ]
        ]);
        $data = json_decode($response->getBody());
        foreach ($data->data as $item) {
            Produk::create([
                "id_produk" => $item->id_produk,
                "nama_produk"=> $item->nama_produk,
                "harga"=> $item->harga,
                "kategori"=> $item->kategori,
                "status"=> $item->status
            ]);
        }
    }
}
