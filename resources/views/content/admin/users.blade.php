    @extends('content.admin.layout')

    @section('title', 'User Control')

    @section('content')
    <div class="container mt-4">
        <h2>Manajemen Pengguna</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Pengguna</button>

        <!-- Tabel -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $user->id }}">Edit</button>

                        <!-- Form Hapus -->
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Password <small>(Kosongkan jika tidak diubah)</small></label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input name="password_confirmation" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Wali Kelas" {{ old('role', $user->role) == 'Wali Kelas' ? 'selected' : '' }}>Wali Kelas</option>
                                    <option value="Orang Tua" {{ old('role', $user->role) == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.users.store') }}" id="formTambah">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" class="form-control" required value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" required value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control" required>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Wali Kelas" {{ old('role') == 'Wali Kelas' ? 'selected' : '' }}>Wali Kelas</option>
                                <option value="Orang Tua" {{ old('role') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Buka modal jika ada error validasi -->
    @if ($errors->any())
    <script>
        $(document).ready(function() {
            $('#modalTambah').modal('show');
        });
    </script>
    @endif
@endsection