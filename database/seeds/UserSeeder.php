<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersAdmin = [
        	['no_induk' => '9999999999', 'name' => 'Administrator System', 'email' => 'admin@mail.com', 'password' => 'rahasia'],
        ];

        $usersProdi = [
        	['no_induk' => '8888888888', 'name' => 'Prodi', 'email' => 'prodi@mail.com', 'password' => 'rahasia'],
        ];

        $usersDosen = [
            ['no_induk' => '0001046901', 'name' => 'Ir. Yulia Yudihartanti, M.Kom', 'email' => 'yulia@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '0028085603', 'name' => 'Drs. Ec. H. Syahib N , MM. , M.Kom', 'email' => 'syahib@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1101066601', 'name' => 'BAMBANG HERRY SUSANTO', 'email' => 'bambang@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1112125801', 'name' => 'Dra. Hj. Ruliah S, M.Kom', 'email' => 'ruliah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1114066404', 'name' => 'RUSTATI R', 'email' => 'rustati@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1116046501', 'name' => 'Ir. Rintana Arnie, M.Kom', 'email' => 'rintana@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1119026201', 'name' => 'Dr. H. Sushermanto, M.Kom', 'email' => 'sushermanto@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1126127501', 'name' => 'Taufiq, M.Kom', 'email' => 'taufik@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1128127401', 'name' => 'Nidia Rosmawanti, M.Kom', 'email' => 'nidia@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '0022085701', 'name' => 'Drs. Ec. H. Huzainsyahnoor A, M.Kom', 'email' => 'huzainsyahnoor@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '0022097901', 'name' => 'H. Budi Rahmani, S.Pd., M.Kom', 'email' => 'budi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '0701047302', 'name' => 'Hugo Aprilianto, M.Kom', 'email' => 'hugo@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1103045601', 'name' => 'HERWING', 'email' => 'herwing@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1107047001', 'name' => 'Bahar A. Rahman, ST., M.Kom', 'email' => 'bahar@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1109077901', 'name' => 'ARTONI', 'email' => 'artoni@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1109097803', 'name' => 'Ratna Fitriani, ST., M.Kom', 'email' => 'ratna@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1115115501', 'name' => 'H. Soegiarto, M.Kom', 'email' => 'soegiarto@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1124066901', 'name' => 'H. Fitriyadi, S.Pi., M.Kom', 'email' => 'fitriyadi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1101127801', 'name' => 'RAHMADI', 'email' => 'rahmadi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1104047801', 'name' => 'HENDRA GUNAWAN', 'email' => 'hendra@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1107037902', 'name' => 'DWI MULYANI', 'email' => 'dwi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1108058003', 'name' => 'SITI ABIDAH', 'email' => 'abidah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1108097702', 'name' => 'SITI FATHIMAH', 'email' => 'fathimah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1116068002', 'name' => 'EKA CHANDRA KIRANA', 'email' => 'eka@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1117097705', 'name' => 'MUSLIHUDDIN', 'email' => 'muslihuddin@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1127026901', 'name' => 'NOORDIANSYAH', 'email' => 'noordiansyah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911000379', 'name' => 'SYAHRUDIN', 'email' => 'syahrudin@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911001452', 'name' => 'SALAHUDDIN', 'email' => 'salahuddin@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911003139', 'name' => 'FERRY ADHTYA KURNIAWAN', 'email' => 'ferry@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911003141', 'name' => 'SURYANTI', 'email' => 'suryanti@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911003483', 'name' => 'NUR FADILAH', 'email' => 'fadilah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911004069', 'name' => 'MUNTANA BAKHTIAR', 'email' => 'muntana@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911004897', 'name' => 'ERWINSYAH', 'email' => 'erwinsyah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911005726', 'name' => 'EDY MASRIDHAN', 'email' => 'edy@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621558', 'name' => 'HABLIANSYAH', 'email' => 'habliansyah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621559', 'name' => 'SUSMITA YULIASARI', 'email' => 'susmita@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621560', 'name' => 'RAHMIYANI', 'email' => 'rahmiyani@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621561', 'name' => 'DINTI SRI YANDE', 'email' => 'dinti@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621562', 'name' => 'ANDITA SUCI PRATIWI', 'email' => 'andita@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621563', 'name' => 'MASNIAH', 'email' => 'masniah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621564', 'name' => 'DIYAN SUKMONO', 'email' => 'diyan@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621565', 'name' => 'AKHMAD WANDY WIRANATA', 'email' => 'akhmad@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621590', 'name' => 'MUHAMMAD ISNAENI', 'email' => 'muhammad@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621591', 'name' => 'SITI ROSMAWATI DAHLIANI', 'email' => 'rosmawati@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621592', 'name' => 'SITI CHARIYANI', 'email' => 'chariyani@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621593', 'name' => 'RIZKY EMMELIA', 'email' => 'rizky@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1115027202', 'name' => 'PANCA ANITASARI W HANDAYANI', 'email' => 'panca@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1128077301', 'name' => 'ARI YULIATI', 'email' => 'ari@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1129117301', 'name' => 'Boy Abidin R.,ST', 'email' => 'boy@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '1130038101', 'name' => 'KHAIRULLAH', 'email' => 'khairullah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911003835', 'name' => 'MUHRIAN NOOR', 'email' => 'muhrian@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911004640', 'name' => 'SLAMET RIANTO', 'email' => 'slamet@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621418', 'name' => 'WAHYUDI', 'email' => 'wahyudi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621419', 'name' => 'AHMAD PAHDI', 'email' => 'pahdi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621420', 'name' => 'TAUFIK NIZAMI', 'email' => 'nizami@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621421', 'name' => 'M.RUSLAN', 'email' => 'ruslan@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '9911621422', 'name' => 'HILDA PUTERI HAJATI', 'email' => 'hilda@mail.com', 'password' => 'rahasia'],
        ];

        $usersMahasiswa = [
        	['no_induk' => '310115012357', 'name' => 'M. KHALIS', 'email' => 'm.khalis@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012359', 'name' => 'MUHAMMAD RIZKY RIYANDHANI', 'email' => 'muhammad.riyandhani@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012360', 'name' => 'DENNY ANDREANOR', 'email' => 'denny.andreanor@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012361', 'name' => 'RAYHAN NOER ABDILLAH', 'email' => 'rayhan.abdillah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012362', 'name' => 'FARIDA AYU MUSLIMAH', 'email' => 'farida.muslimah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012363', 'name' => 'MARLINA', 'email' => 'marlina.marlina@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012364', 'name' => 'MENTARI NOVEMBRIA JIWO PUTERI', 'email' => 'mentari.puteri@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012365', 'name' => 'ARIF NUGROHO', 'email' => 'arif.nugroho@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012366', 'name' => 'AL AZHARA MEGAWATI', 'email' => 'al.megawati@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012367', 'name' => 'RIANI PRAMASANTI', 'email' => 'riani.pramasanti@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012368', 'name' => 'NAZAR AZMI', 'email' => 'nazar.azmi@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012369', 'name' => 'RENI LUFIANA', 'email' => 'reni.lufiana@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012371', 'name' => 'HALIMATUS SADIAH', 'email' => 'halimatus.sadiah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012372', 'name' => 'HUSIN ALMALIKI', 'email' => 'husin.almaliki@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012373', 'name' => 'MUHAMMAD KHAIRUZ ZIKRI', 'email' => 'muhammad.zikri@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012374', 'name' => 'GUSTI PANGESTU KUSUMAWARDHANI', 'email' => 'gusti.kusumawardhani@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012375', 'name' => 'RIZKI RAMADHANI', 'email' => 'rizki.ramadhani@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012376', 'name' => 'MUHAMMAD SYAHRUL', 'email' => 'muhammad.syahrul@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012386', 'name' => 'RINO PEBRIANSYAH', 'email' => 'rino.pebriansyah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012387', 'name' => 'AHMAD NURIANSYAH', 'email' => 'ahmad.nuriansyah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012389', 'name' => 'AULIA AZIZAH', 'email' => 'aulia.azizah@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012390', 'name' => 'AHMAD HAFIZ MAULANA', 'email' => 'ahmad.maulana@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012391', 'name' => 'MARIA ARSELLA', 'email' => 'maria.arsella@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012393', 'name' => 'APRIAN SATRIA NUGRAHA', 'email' => 'aprian.nugraha@mail.com', 'password' => 'rahasia'],
            ['no_induk' => '310115012394', 'name' => 'RAIDATUL JANNAH', 'email' => 'raidatul.jannah@mail.com', 'password' => 'rahasia'],
        ];

        foreach ($usersAdmin as $admin) {
        	$a = new User;
        	$a->name = $admin['name'];
        	$a->email = $admin['email'];
        	$a->no_induk = $admin['no_induk'];
        	$a->password = bcrypt($admin['password']);
        	$a->save();

        	$a->roles()->attach(1);
        } 

        foreach ($usersProdi as $prodi) {
        	$p = new User;
        	$p->name = $prodi['name'];
        	$p->email = $prodi['email'];
        	$p->no_induk = $prodi['no_induk'];
        	$p->password = bcrypt($prodi['password']);
        	$p->save();

        	$p->roles()->attach(2);
        } 

        foreach ($usersDosen as $dosen) {
        	$d = new User;
        	$d->name = $dosen['name'];
        	$d->email = $dosen['email'];
        	$d->no_induk = $dosen['no_induk'];
        	$d->password = bcrypt($dosen['password']);
        	$d->save();

        	$d->roles()->attach(3);
        } 

        foreach ($usersMahasiswa as $mahasiswa) {
        	$m = new User;
        	$m->name = $mahasiswa['name'];
        	$m->email = $mahasiswa['email'];
        	$m->no_induk = $mahasiswa['no_induk'];
        	$m->password = bcrypt($mahasiswa['password']);
        	$m->save();

        	$m->roles()->attach(4);

        	if (substr($mahasiswa['no_induk'], 6, 2) == '01') {
        		$m->jurusan()->attach('SI');	
        	}else{
        		$m->jurusan()->attach('TI');	
        	}       	
        } 
    }
}
