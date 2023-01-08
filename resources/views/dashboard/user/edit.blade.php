@extends('layouts.master')

@section('style')

@endsection

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('dashboard.petugas.update', $user->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="">NAMA</label>
                                <input name="name" type="text" class="form-control" placeholder="cth: John Doe" value="{{ $user->name }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">EMAIL</label>
                                        <input name="email" type="text" class="form-control" placeholder="ex: john.doe@example.com" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NOMOR TELEPON</label>
                                        <input name="phone_number" type="text" class="form-control" placeholder="ex: 085157212121" value="{{ $user->phone_number }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">KATA SANDI</label>
                                <input name="password" type="password" class="form-control" placeholder="********">
                                <span class="small text-muted">Kosongkan jika tidak ingin mengubah password</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">BAGIAN</label>
                                        <select name="role_id" class="form-control">
                                            @foreach ($roles as $key => $role)
                                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ strtoupper($role->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">STATUS</label>
                                        <select name="status" class="form-control">
                                            <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>AKTIF</option>
                                            <option value="non-aktif" {{ $user->status == 'non-aktif' ? 'selected' : '' }}>NON-AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table d-block d-md-table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>AKSES MODUL</th>
                                            <th class="text-center">FULLDATA</th>
                                            <th class="text-center">LIHAT</th>
                                            <th class="text-center">TAMBAH</th>
                                            <th class="text-center">EDIT</th>
                                            <th class="text-center">HAPUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>LAPORAN AKTIVITAS</td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-activity-checkbox1" class="checkbox-input" value="user_activity_fulldata">
                                                    <label for="user-activity-checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-activity-checkbox2" class="checkbox-input" value="user_activity_read">
                                                    <label for="user-activity-checkbox2"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-activity-checkbox3" class="checkbox-input" value="user_activity_create">
                                                    <label for="user-activity-checkbox3"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-activity-checkbox4" class="checkbox-input" value="user_activity_update">
                                                    <label for="user-activity-checkbox4"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-activity-checkbox5" class="checkbox-input" value="user_activity_delete">
                                                    <label for="user-activity-checkbox5"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UPT</td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="upt-checkbox1" class="checkbox-input" disabled>
                                                    <label for="upt-checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="upt-checkbox2" class="checkbox-input" value="upt_read">
                                                    <label for="upt-checkbox2"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="upt-checkbox3" class="checkbox-input" value="upt_create">
                                                    <label for="upt-checkbox3"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="upt-checkbox4" class="checkbox-input" value="upt_update">
                                                    <label for="upt-checkbox4"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="upt-checkbox5" class="checkbox-input" value="upt_delete">
                                                    <label for="upt-checkbox5"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PETUGAS</td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-checkbox1" class="checkbox-input" disabled>
                                                    <label for="user-checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-checkbox2" class="checkbox-input" value="user_read">
                                                    <label for="user-checkbox2"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-checkbox3" class="checkbox-input" value="user_create">
                                                    <label for="user-checkbox3"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-checkbox4" class="checkbox-input" value="user_update">
                                                    <label for="user-checkbox4"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-checkbox5" class="checkbox-input" value="user_delete">
                                                    <label for="user-checkbox5"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LOKASI PETUGAS</td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-location-checkbox1" class="checkbox-input" disabled>
                                                    <label for="user-location-checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-location-checkbox2" class="checkbox-input" value="user_location_read">
                                                    <label for="user-location-checkbox2"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-location-checkbox3" class="checkbox-input" disabled>
                                                    <label for="user-location-checkbox3"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="user-location-checkbox4" class="checkbox-input" disabled>
                                                    <label for="user-location-checkbox4"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="permissions[]" type="checkbox" id="upt-checkbox5" class="checkbox-input" disabled>
                                                    <label for="upt-checkbox5"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button class="btn btn-primary">
                                    <i class="bx bx-save"></i>
                                    <span class="align-middle ml-25">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("a[href='{{ route('dashboard.petugas.index') }}']").closest("li").addClass("active");
    </script>
    @foreach ($user->user_permissions as $permission)
        <script>
            $("input[value=\"{{ $permission->permission }}\"]").prop("checked", true);
        </script>
    @endforeach
@endsection
