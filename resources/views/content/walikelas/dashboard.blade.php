    @extends('content.walikelas.layout')

    @section('title', 'Dashboard')

    @section('content')
    <div class="p-6 space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Selamat datang, {{ Auth::user()->name }} (Wali Kelas {{ $kelas->name }})
            </h1>
            <p class="text-gray-700">Ringkasan absensi siswa Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-600 text-white rounded-xl p-4 shadow-lg transform hover:scale-105 transition duration-300 border border-white/20 min-h-[120px]">
                <div class="flex items-center gap-4">
                    <i class="fas fa-users text-3xl"></i>
                    <div>
                        <div class="text-sm">Total Siswa</div>
                        <div class="text-2xl font-bold">{{ $totalSiswa }}</div>
                    </div>
                </div>
            </div>
        
            <div class="bg-green-600 text-white rounded-xl p-4 shadow-lg transform hover:scale-105 transition duration-300 border border-white/20 min-h-[120px]">
                <div class="flex items-center gap-4">
                    <i class="fas fa-check-circle text-3xl"></i>
                    <div>
                        <div class="text-sm">Hadir Hari Ini</div>
                        <div class="text-2xl font-bold">{{ $hadirHariIni }}</div>
                    </div>
                </div>
            </div>
        
            <div class="bg-red-600 text-white rounded-xl p-4 shadow-lg transform hover:scale-105 transition duration-300 border border-white/20 min-h-[120px]">
                <div class="flex items-center gap-4">
                    <i class="fas fa-times-circle text-3xl"></i>
                    <div>
                        <div class="text-sm">Tidak Hadir</div>
                        <div class="text-2xl font-bold">{{ $tidakHadirHariIni }}</div>
                    </div>
                </div>
            </div>
        
            <div class="bg-purple-600 text-white rounded-xl p-4 shadow-lg transform hover:scale-105 transition duration-300 border border-white/20 min-h-[120px]">
                <div class="flex items-center gap-4">
                    <i class="fas fa-calendar-check text-3xl"></i>
                    <div>
                        <div class="text-sm">Kehadiran Bulan Ini</div>
                        <div class="text-2xl font-bold">{{ $persentaseKehadiran }}%</div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection