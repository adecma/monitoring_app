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
        	['kd' => 'IPK201', 'name' => 'Pendidikan Agama'],
			['kd' => 'IPK202', 'name' => 'Pendidikan Kewarganegaraan & Pancasila'],
			['kd' => 'IPK203', 'name' => 'Bahasa Indonesia'],
			['kd' => 'SPK204', 'name' => 'Bahasa Inggeris'],
			['kd' => 'IKK206', 'name' => 'Algoritma & Pemrograman (Pascal)'],
			['kd' => 'IKK207', 'name' => 'Matematika Diskrit'],
			['kd' => 'IKK355', 'name' => 'Kalkulus 1'],
			['kd' => 'IKK356', 'name' => 'Kalkulus 2'],
			['kd' => 'IKK210', 'name' => 'Statistik'],
			['kd' => 'IKK211', 'name' => 'Struktur Data'],
			['kd' => 'IKK212', 'name' => 'Aljabar Linear'],
			['kd' => 'IKK213', 'name' => 'Metode Numerik'],
			['kd' => 'IKK214', 'name' => 'Logika Informatika'],
			['kd' => 'SKK217', 'name' => 'PPN  (Ms.Office Word, Exel, PowerPoint)'],
			['kd' => 'SKK310', 'name' => 'Micprocessor'],
			['kd' => 'SKK311', 'name' => 'Mobile Technologies'],
			['kd' => 'SKK312', 'name' => 'Sistem Digital'],
			['kd' => 'SKK313', 'name' => 'Installasi Komputer'],
			['kd' => 'IKB223', 'name' => 'Pemrograman 1  (DataBase Access & Delphi)'],
			['kd' => 'IKB224', 'name' => 'Pemrograman 2  (Delphi Programming)'],
			['kd' => 'IKB225', 'name' => 'Interaksi Manusia & Komputer'],
			['kd' => 'IKB226', 'name' => 'Jaringan Komputer dan Komunikasi Data'],
			['kd' => 'IKB227', 'name' => 'Sistem / Teknologi Basis Data'],
			['kd' => 'IKB357', 'name' => 'Rekayasa Perangkat Lunak 1'],
			['kd' => 'IKB358', 'name' => 'Rekayasa Perangkat Lunak 2 (Tools)'],
			['kd' => 'IKB229', 'name' => 'Arsitektur & Organisasi Komputer'],
			['kd' => 'IKB230', 'name' => 'Riset Teknologi Informasi'],
			['kd' => 'IKB231', 'name' => 'Sistem Operasi Aplikasi'],
			['kd' => 'SKB232', 'name' => 'Pengantar Teknologi Informasi'],
			['kd' => 'SKB242', 'name' => 'Metodologi Penelitian'],
			['kd' => 'SKB282', 'name' => 'Manajemen Proyek Teknik Informasi (Tools)'],
			['kd' => 'SKB315', 'name' => 'Basis Data (Visual FoxPro)'],
			['kd' => 'SKB316', 'name' => 'Pemrograman Web (My Sql ,HTML, XML)'],
			['kd' => 'SKB317', 'name' => 'Sistem Berkas'],
			['kd' => 'SKB318', 'name' => 'Testing & Implementasi Sistem '],
			['kd' => 'SKB319', 'name' => 'Data Mining'],
			['kd' => 'SKB323', 'name' => 'Sistem Penunjang Keputusan'],
			['kd' => 'SKB324', 'name' => 'Jaringan Syaraf Tiruan'],
			['kd' => 'SKB326', 'name' => 'Logika Fuzzy'],
			['kd' => 'SKB328', 'name' => 'Sistem Pakar'],
			['kd' => 'SKB331', 'name' => 'Pengolahan Citra'],
			['kd' => 'SKB332', 'name' => 'Rekayasa Web (PHP)'],
			['kd' => 'IPB247', 'name' => 'Etika Profesi '],
			['kd' => 'SPB249', 'name' => 'Teori Bahasa Automata'],
			['kd' => 'SPB250', 'name' => 'Teknik Presentasi'],
			['kd' => 'IBB252', 'name' => 'Kecakapan antar personal '],
			['kd' => 'IBB253', 'name' => 'Komputer dan Masyarakat '],
			['kd' => 'IBB254', 'name' => 'Ilmu Sosial dan Budaya Dasar ( ISBD)'],
			['kd' => 'IBB255', 'name' => 'Ilmu Kealaman Dasar (IAD)'],
			['kd' => 'SBB260', 'name' => 'Kerja Praktek'],
			['kd' => 'SBB261', 'name' => 'Tugas Akhir '],
			['kd' => 'SKB354', 'name' => 'Multimedia Design (Tools)'],
			['kd' => 'SKB321', 'name' => 'Sistem Informasi Geografis (Pilihan)'],
			['kd' => 'SKB330', 'name' => 'Pengamanan Sistem Komputer (Pilihan)'],
			['kd' => 'SKB339', 'name' => 'Sistem Terdistribusi (Pilihan)'],
			['kd' => 'SKB351', 'name' => 'Perancangan Basis Data (Pilihan)'],
			['kd' => 'SPB357', 'name' => 'Kewirausahaan (Pilihan)'],
			['kd' => 'SKB352', 'name' => 'Programming Development (Visual FoxPro) (Pilihan)'],
			['kd' => 'SKB353', 'name' => 'Web Development (PHP/HTML/XML)(Pilihan)'],
        ];

        foreach ($matakuliahs as $mk) {
        	$m = new Matakuliah;
        	$m->kd = $mk['kd'];
        	$m->name = $mk['name'];
        	$m->save();
        }
    }
}
