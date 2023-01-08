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

    @if (count($upts) > 0)
        <div class="row mt-2">
            <div class="col-12">
                <h5>UPT</h5>
            </div>
        </div>
    @endif
    @foreach ($upts as $key => $upt)
        <div class="row mt-1">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title">{{ $upt->name }} </h4>
                        <a class="heading-elements-toggle">
                            <i class="bx bx-dots-vertical font-medium-3"></i>
                        </a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0 p-1 p-md-0">
                                @if (in_array('upt_read', $userPermissions))
                                    <li>
                                        <a href="{{ route('dashboard.upt.show', $upt->id) }}" class="text-uppercase">
                                            <i class="bx bx-expand align-middle"></i>
                                            <span class="align-middle ml-25">Detail</span>
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
    @if (count($users) > 0)
        <div class="row mt-2">
            <div class="col-12">
                <h5>Petugas</h5>
            </div>
        </div>
    @endif
    @foreach ($users as $key => $user)
        <div class="row mt-1">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-header">
                    <h4 class="card-title">{{ $user->name }} {!! $user->status == 'aktif' ? '<i class="small text-success bx bxs-check-circle"></i>' : '<i class="small text-danger bx bxs-x-circle"></i>' !!}</h4>
                        <a class="heading-elements-toggle">
                            <i class="bx bx-dots-vertical font-medium-3"></i>
                        </a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0 p-1 p-md-0">
                                @if (in_array('user_read', $userPermissions))
                                    <li>
                                        <a href="{{ route('dashboard.petugas.show', $user->id) }}" class="text-uppercase">
                                            <i class="bx bx-expand align-middle"></i>
                                            <span class="align-middle ml-25">Detail</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="text-left" style="white-space: pre-wrap">{{ $user->role->name }}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-center" style="white-space: pre-wrap">{{ $user->email }}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-right" style="white-space: pre-wrap">{{ $user->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
