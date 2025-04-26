@extends('content.walikelas.layout')

@section('title', 'Absensi')

@section('content')
<div class="container">
    <h1>Absensi Kelas {{ $kelas->name }}</h1>
    <h3>Tanggal: {{ $tanggal }}</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @php
        $jumlahHari = now()->daysInMonth;  // Mendapatkan jumlah hari dalam bulan sekarang
    @endphp
    <form action="{{ route('walikelas.absensi.store') }}" method="POST">
        @csrf
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        @for ($i = 1; $i <= $jumlahHari; $i++) <!-- Untuk 30 hari dalam sebulan -->
                            <th>{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $s->name }}</td>
                            @for ($i = 1; $i <= $jumlahHari; $i++)
                                <td>
                                    <select name="siswa_id[{{ $s->id }}][{{ $i }}]" class="form-control" onchange="updateStatus(this)">
                                        <option value="">Pilih Status</option>
                                        <option value="hadir" {{ isset($absensiData[$s->id][$i]) && $absensiData[$s->id][$i]->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="alpa" {{ isset($absensiData[$s->id][$i]) && $absensiData[$s->id][$i]->status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                                        <option value="izin" {{ isset($absensiData[$s->id][$i]) && $absensiData[$s->id][$i]->status == 'izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="sakit" {{ isset($absensiData[$s->id][$i]) && $absensiData[$s->id][$i]->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                    </select>
                                    <span class="status-text"></span>
                                </td>
                            @endfor
                        </tr>
                    @endforeach                
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Absensi</button>
    </form>
</div>

@push('scripts')
<script>
    // Fungsi untuk mengubah tulisan dan warna latar belakang berdasarkan pilihan status
    function updateStatus(selectElement) {
        // Ambil nilai dari dropdown
        const status = selectElement.value;
        
        // Ambil elemen span di sebelah select
        const statusText = selectElement.nextElementSibling;

        // Tentukan warna latar belakang dan teks berdasarkan status
        switch (status) {
            case 'hadir':
                statusText.textContent = 'Hadir';
                statusText.style.backgroundColor = 'green';
                statusText.style.color = 'white';
                break;
            case 'sakit':
                statusText.textContent = 'Sakit';
                statusText.style.backgroundColor = 'orange';
                statusText.style.color = 'white';
                break;
            case 'izin':
                statusText.textContent = 'Izin';
                statusText.style.backgroundColor = 'blue';
                statusText.style.color = 'white';
                break;
            case 'alpa':
                statusText.textContent = 'Alpa';
                statusText.style.backgroundColor = 'red';
                statusText.style.color = 'white';
                break;
            default:
                statusText.textContent = '';
                statusText.style.backgroundColor = '';
                statusText.style.color = '';
                break;
        }
    }

    // Menampilkan status setelah halaman di-load (untuk mempertahankan pilihan sebelumnya)
    document.addEventListener("DOMContentLoaded", function() {
        const selects = document.querySelectorAll("select");
        selects.forEach(select => {
            updateStatus(select); // Panggil updateStatus untuk menampilkan status yang sudah dipilih
        });
    });
</script>
@endpush

@endsection
