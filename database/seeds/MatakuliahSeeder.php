<?php

use Illuminate\Database\Seeder;
use App\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matakuliahs = [
        	['kd' => 'IBB252', 'name' => 'Interpersonal Skill (Kecakapan Antar Personal)'],
			['kd' => 'IBB253', 'name' => 'Komputer & Masyarakat'],
			['kd' => 'IKB126', 'name' => 'Bahasa Pemrogramman 2 (VB.Net)'],
			['kd' => 'IKB127', 'name' => 'Jaringan Komputer & Komunikasi Data'],
			['kd' => 'IKB129', 'name' => 'Rekayasa Perangkat Lunak '],
			['kd' => 'IKB223', 'name' => 'Pemrogramman 1 (Access+Delphi)'],
			['kd' => 'IKB224', 'name' => 'Pemrograman 2 (Access+Delphi)'],
			['kd' => 'IKB227', 'name' => 'Sistem Basis Data'],
			['kd' => 'IKB358', 'name' => 'Rekayasa Perangkat Lunak 2 (Tools)'],
			['kd' => 'IKK113', 'name' => 'Aljabar Linear'],
			['kd' => 'IKK206', 'name' => 'Algoritma & Struktur Data (Pascal)'],
			['kd' => 'IKK211', 'name' => 'Struktur Data'],
			['kd' => 'IKK231', 'name' => 'Sistem Operasi Aplikasi'],
			['kd' => 'SKB143', 'name' => 'Riset Teknologi Informasi'],
			['kd' => 'SKB198', 'name' => 'Pemrogramman Web (Db My SQL+HTML+XML)'],
			['kd' => 'SKB232', 'name' => 'Pengantar Teknologi Informasi'],
			['kd' => 'SKB242', 'name' => 'Metodologi Penelitian'],
			['kd' => 'SKB315', 'name' => 'Basis Data (Visual Foxpro)'],
			['kd' => 'SKB319', 'name' => 'Data Mining'],
			['kd' => 'SKB323', 'name' => 'Sistem Penunjang Keputusan'],
			['kd' => 'SKB324', 'name' => 'Jaringan Syaraf Tiruan'],
			['kd' => 'SKB326', 'name' => 'Logika Fuzzy'],
			['kd' => 'SKB351', 'name' => 'Perancangan Basis Data '],
			['kd' => 'SKB354', 'name' => 'Multimedia Design (Tools)'],
			['kd' => 'SKB505', 'name' => 'Interaksi Manusia & Komputer'],
			['kd' => 'SKK121', 'name' => 'Basis Data (Pemrogramman dBase)'],
			['kd' => 'SKK217', 'name' => 'PPN (Ms. Office Word, Excel, Powerpoint)'],
			['kd' => 'SKK311', 'name' => 'Mobile Technologies'],
			['kd' => 'SKK313', 'name' => 'Instalasi Komputer'],
			['kd' => 'SPB151', 'name' => 'Sistem Informasi Manajemen'],
			['kd' => 'TTT220', 'name' => 'E-Commerce (Tools)'],
			['kd' => 'TTT221', 'name' => 'Pengantar Manajemen'],
        ];

        foreach ($matakuliahs as $mk) {
        	$m = new Matakuliah;
        	$m->kd = $mk['kd'];
        	$m->name = $mk['name'];
        	$m->save();
        }
    }
}
