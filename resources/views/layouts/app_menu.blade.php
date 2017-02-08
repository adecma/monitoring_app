@role('admin')
    <li>
        <a href="#"><i class="fa fa-tasks fa-fw"></i> Master <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('user.index') }}">User</a>
            </li>
            <li>
                <a href="{{ route('dosen.index') }}">Dosen</a>
            </li>
            <li>
                <a href="{{ route('matakuliah.index') }}">Matakuliah</a>
            </li>
            <li>
                <a href="{{ route('kompetensi.index') }}">Kompetensi</a>
            </li>
            <li>
                <a href="{{ route('aspek.index') }}">Aspek</a>
            </li>
            <li>
                <a href="{{ route('periode.index') }}">Periode</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="{{ route('registrasi_matakuliah.index') }}"><i class="fa fa-map-signs fa-fw"></i> Registrasi </a>
    </li>
@endrole

@role('prodi')
    <li>
        <a href="{{ route('registrasi_matakuliah.index') }}"><i class="fa fa-map-signs fa-fw"></i> Registrasi </a>
    </li>
@endrole

@role('mahasiswa')
    <li>
        <a href="{{ route('katalog.index') }}"><i class="fa fa-book fa-fw"></i> Kuisioner</a>
    </li>
@endrole

@role('dosen')

@endrole