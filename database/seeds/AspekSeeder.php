<?php

use Illuminate\Database\Seeder;
use App\Aspek;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $aspeks = [
        	[
        		'name' => 'Kesiapan memberikan kuliah dan/atau praktek/praktikum',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Keteraturan dan ketertiban penyelenggaraan perkuliahan',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Kemampuan menghidupkan suasana kelas',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Pemanfaatan media dan teknologi pembelajaran',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Keanekaragaman cara pengukuran/penilaian hasil belajar',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Pemberian umpan balik terhadap tugas/penilaian',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Kesesuaian materi ujian dan/atau tugas dengan tujuan mata kuliah',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Kesesuaian nilai yang diberikan dengan hasil belajar',
        		'kompetensi_id' => 1,
        	],
        	[
        		'name' => 'Kemampuan menjelaskan pokok bahasan/topik secara tepat',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Kemampuan memberi contoh relevan dari konsep secara tepat',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan bidang/topik lain',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan kehidupan',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan (kemutakhiran bahan/referensi kuliah)',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Penggunaan hasil-hasil penelitian untuk meningkatkan kualitas perkuliahan',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Pelibatan mahasiswa dalam penelitian/kajian dan atau pelibatan mahasiswa dalam penelitian/kajian dan atau pengembangan/rekayasa/desain yang dilakukan dosen',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Kemampuan menggunakan beragam teknologi komunikasi',
        		'kompetensi_id' => 2,
        	],
        	[
        		'name' => 'Kewajiban sebagai pribadi dosen',
        		'kompetensi_id' => 3,
        	],
        	[
        		'name' => 'Kearifan dalam mengambil keputusan',
        		'kompetensi_id' => 3,
        	],
        	[
        		'name' => 'Menjadi contoh dalam bersikap dan berprilaku',
        		'kompetensi_id' => 3,
        	],
        	[
        		'name' => 'Satunya kata dan tindakan',
        		'kompetensi_id' => 3,
        	],
        	[
        		'name' => 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi',
        		'kompetensi_id' => 3,
        	],
        	[
        		'name' => 'Adil dalam memperlakukan mahasiswa',
        		'kompetensi_id' => 3,
        	],
        	[
        		'name' => 'Kemampuan menyampaikan pendapat',
        		'kompetensi_id' => 4,
        	],
        	[
        		'name' => 'Kemampuan menerima kritik, saran dan pendapat dari mahasiswa',
        		'kompetensi_id' => 4,
        	],
        	[
        		'name' => 'Mengenal dengan baik mahasiswa yang mengikuti kuliahnya',
        		'kompetensi_id' => 4,
        	],
        	[
        		'name' => 'Mudah bergaul di kalangan sejawat, karyawan dan mahasiswa',
        		'kompetensi_id' => 4,
        	],
        	[
        		'name' => 'Toleransi terhadap keberagaman mahasiswa',
        		'kompetensi_id' => 4,
        	],
        ];

        foreach ($aspeks as $aspek) {
        	$a = new Aspek;
        	$a->name = $aspek['name'];
        	$a->kompetensi_id = $aspek['kompetensi_id'];
        	$a->save();
        }
    }
}
