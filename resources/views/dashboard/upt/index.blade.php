@php
    $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
@endphp

@extends('layouts.master')

@section('style')

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="search-bar-wrapper">
                <div class="search-bar">
                    <!-- input search -->
                    <form>
                        <fieldset class="page-search-input form-group position-relative">
                            <input name="search" type="text" class="form-control rounded-right form-control-lg shadow pl-2" id="searchbar" placeholder="Search">
                            <button class="btn btn-primary search-btn rounded" type="submit">
                                <i class="bx bx-search align-middle"></i>
                                <span class="d-none d-sm-inline-block align-middle">Search</span>
                            </button>
                        </fieldset>
                    </form>
                    <!--/ input search -->
                </div>
            </div>
        </div>
    </div>

    @if (in_array('upt_create', $userPermissions))
        <div class="row mt-1">
            <div class="col-12 text-right">
                <a href="{{ route('dashboard.upt.create') }}" class="btn btn-primary text-uppercase">
                    <i class="bx bx-plus"></i>
                    <span class="align-middle ml-25">Tambah</span>
                </a>
            </div>
        </div>
    @endif

    @foreach ($upts as $key => $upt)
        <div class="row mt-2">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title">{{ $upt->name }} </h4>
                        <a class="heading-elements-toggle">
                            <i class="bx bx-dots-vertical font-medium-3"></i>
                        </a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0 p-1 p-md-0">
                                <li>
                                    <a href="{{ route('dashboard.upt.show', $upt->id) }}" class="text-uppercase">
                                        <i class="bx bx-expand align-middle"></i>
                                        <span class="align-middle ml-25">Detail</span>
                                    </a>
                                </li>
                                @if (in_array('upt_update', $userPermissions))
                                    <li class="ml-1">
                                        <a href="{{ route('dashboard.upt.edit', $upt->id) }}" class="text-uppercase">
                                            <i class="bx bx-edit align-middle"></i>
                                            <span class="align-middle ml-25">Edit</span>
                                        </a>
                                    </li>
                                @endif
                                @if (in_array('upt_delete', $userPermissions))
                                    <li class="ml-1">
                                        <a href="javascript:;" class="text-uppercase btn-delete">
                                            <i class="bx bx-trash align-middle"></i>
                                            <span class="align-middle ml-25">Hapus</span>
                                            <form action="{{ route('dashboard.upt.destroy', $upt->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-justify" style="white-space: pre-wrap">{{ $upt->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $upts->links() }}
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
