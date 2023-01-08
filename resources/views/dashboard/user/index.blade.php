@php
    $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
@endphp

@extends('layouts.master')

@section('style')

@endsection

@section('content')

    @if (in_array('user_create', $userPermissions))
        <div class="row">
            <div class="col-12 text-right">
                <a href="{{ route('dashboard.petugas.create') }}" class="btn btn-primary text-uppercase">
                    <i class="bx bx-plus"></i>
                    <span class="align-middle ml-25">Tambah</span>
                </a>
            </div>
        </div>
    @endif

    <div class="row mt-2">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            @foreach ($roles as $key => $role)
                                <li class="nav-item">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ str_replace(' ', '-', $role->name) }}-label" data-toggle="tab" href="#{{ str_replace(' ', '-', $role->name) }}" role="tab" aria-controls="{{ str_replace(' ', '-', $role->name) }}">
                                        {{ strtoupper($role->name) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content pt-1">
                            @foreach ($roles as $key => $role)
                                <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="{{ str_replace(' ', '-', $role->name) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ', '-', $role->name) }}-label">
                                    <table class="table datatable w-100 table-responsive">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>ALAMAT EMAIL</th>
                                                <th class="text-nowrap">NOMOR TELEPON</th>
                                                <th class="text-center" style="width: 1%">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($role->users as $user)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-nowrap">{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="text-nowrap">{{ $user->phone_number }}</td>
                                                    <td class="text-nowrap">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('dashboard.petugas.show', $user->id) }}" class="btn btn-primary text-uppercase">
                                                                <i class="bx bx-expand"></i>
                                                                <span class="ml-25">detail</span>
                                                            </a>
                                                            @if (in_array('user_update', $userPermissions))
                                                                <a href="{{ route('dashboard.petugas.edit', $user->id) }}" class="btn btn-info text-uppercase">
                                                                    <i class="bx bx-edit"></i>
                                                                    <span class="ml-25">edit</span>
                                                                </a>
                                                            @endif
                                                            @if (in_array('user_delete', $userPermissions))
                                                                <a href="javascript:;" class="btn btn-danger text-uppercase btn-delete">
                                                                    <i class="bx bx-trash"></i>
                                                                    <span class="ml-25">Hapus</span>
                                                                    <form action="{{ route('dashboard.petugas.destroy', $user->id) }}" method="POST" class="align-middle">
                                                                        @csrf
                                                                        @method("DELETE")
                                                                    </form>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.btn-delete', function () {
            let form = $(this).find('form');
            showConfirmDialog('Data yang dihapus tidak dapat dikembalikan', () => {
                form.submit();
            });
        });
    </script>
@endsection
