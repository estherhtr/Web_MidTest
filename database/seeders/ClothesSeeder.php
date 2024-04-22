<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clothes;

class ClothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clothes::create([
            'kode_barang' => 'BJ-SHIMMER-1-L',
            'nama_barang' => 'Kaos Shimmer',
            'ukuran' => 'L',
            'deskripsi' => 'Baju Shimmer shimmer',
            'harga' => 195000,
            'supplier' => 'Ananda',
            'stok' => 250
        ]);

        Clothes::create([
            'kode_barang' => 'Nora-Blouse-1',
            'nama_barang' => 'Nora Blouse',
            'ukuran' => 'L',
            'deskripsi' => 'Villing Serut RIB bahan katun fit to L',
            'harga' => 195000,
            'supplier' => 'Aqsa',
            'stok' => 250
        ]);

        Clothes::create([
            'kode_barang' => 'Kaos-Oversize-1',
            'nama_barang' => 'Kaos Wanita Oversize Katun',
            'ukuran' => 'L',
            'deskripsi' => 'Bahan Dijamin Adem dan nyaman untuk dipakai',
            'harga' => 195000,
            'supplier' => 'Alya',
            'stok' => 250
        ]);

        Clothes::create([
            'kode_barang' => 'Kemeja-Oversize-1',
            'nama_barang' => 'Kemeja Wanita Oversize',
            'ukuran' => 'L',
            'deskripsi' => 'Bahan rajut halus goodquality',
            'harga' => 195000,
            'supplier' => 'Aqila',
            'stok' => 250
        ]);

        Clothes::create([
            'kode_barang' => 'Kaos-Lengan-Pendek-1',
            'nama_barang' => 'Kaos Lengan Pendek',
            'ukuran' => 'L',
            'deskripsi' => 'Material Bahan : COTTON COMBED 30S',
            'harga' => 195000,
            'supplier' => 'Angga',
            'stok' => 250
        ]);
    }
}
