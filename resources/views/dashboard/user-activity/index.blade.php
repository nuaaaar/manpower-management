@php
    $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
@endphp

@extends('layouts.master')

@section('style')
    <style>
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                @if (in_array('user_activity_fulldata', $userPermissions))
                                    <div class="col-md-3">
                                        <select name="user_id" id="" class="form-control select2">
                                            <option>Semua Petugas</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ request()->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="col-md-3">
                                    <input type="date" name="start_date" id="" class="form-control" value="{{ request()->start_date ?? date('Y-m-d') }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="end_date" id="" class="form-control" value="{{ request()->end_date ?? date('Y-m-d') }}">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="bx bxs-filter-alt"></i>
                                        <span class="align-middle ml-25">Filter</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">Grafik Aktivitas</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="activity-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="card mb-0">
                <div class="card-content collapse show">
                    <div class="card-body text-center">
                        <h1 class="text-primary">{{ count($activities) }}</h1>
                        <p>Total Aktivitas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-0">
                <div class="card-content collapse show">
                    <div class="card-body text-center">
                        <h1 class="text-warning">{{ $activities->sum('diff_in_hours') }}</h1>
                        <p>Total Jam Kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (in_array('user_activity_create', $userPermissions))
        <div class="row mt-2">
            <div class="col-12 text-right">
                <a href="{{ route('dashboard.laporan-aktivitas.create') }}" class="btn btn-primary text-uppercase">
                    <i class="bx bx-plus"></i>
                    <span class="align-middle ml-25">Tambah</span>
                </a>
            </div>
        </div>
    @endif
    <div class="row mt-1">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <table class="table datatable w-100 table-responsive d-xl-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    @if (in_array('user_activity_fulldata', $userPermissions))
                                        <th>PETUGAS</th>
                                    @endif
                                    <th>TANGGAL</th>
                                    <th class="text-center">JAM</th>
                                    <th class="text-nowrap">AKTIVITAS</th>
                                    <th class="text-center" style="width: 1%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <td></td>
                                        @if (in_array('user_activity_fulldata', $userPermissions))
                                            <td>{{ $activity->user->name }}</td>
                                        @endif
                                        <td class="text-nowrap">{{ $activity->date_name }}</td>
                                        <td class="text-nowrap text-center">{{ $activity->start_time }} - {{ $activity->end_time }}</td>
                                        <td class="text-nowrap">{{ $activity->activity }}</td>
                                        <td class="text-nowrap">
                                            <div class="btn-group btn-group-sm">
                                                @if (in_array('user_activity_update', $userPermissions))
                                                    <a href="{{ route('dashboard.laporan-aktivitas.edit', $activity->id) }}" class="btn btn-info text-uppercase">
                                                        <i class="bx bx-edit"></i>
                                                        <span class="ml-25">Edit</span>
                                                    </a>
                                                @endif
                                                @if (in_array('user_activity_delete', $userPermissions))
                                                    <a href="javascript:;" class="btn btn-danger text-uppercase btn-delete">
                                                        <i class="bx bx-trash"></i>
                                                        <span class="ml-25">Hapus</span>
                                                        <form action="{{ route('dashboard.laporan-aktivitas.destroy', $activity->id) }}" method="POST" class="align-middle">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>


        $(document).on('click', '.btn-delete', function () {
            let deleteForm = $(this).find('form');
            showConfirmDialog('Data yang dihapus tidak dapat dikembalikan', () => {
                deleteForm.submit();
            });
        });

         // Line Area Chart
        // ----------------------------------
        var lineAreaOptions = {
            chart: {
                height: 400,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            colors: ['#5A8DEE', '#FDAC41'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [
                {
                    name: 'Total Aktivitas',
                    data: @json($total_activities)
                },
                {
                    name: 'Total Jam Kerja',
                    data: @json($total_times)
                },
            ],
            legend: {
                offsetY: 8
            },
            xaxis: {
                categories: @json($date_names),
            },
            yaxis:{
                labels: {
                    formatter: (value) => {
                        return value.toFixed(0)
                    },
                }
            },
        }
        var lineAreaChart = new ApexCharts(
            document.querySelector("#activity-chart"),
            lineAreaOptions
        );
        lineAreaChart.render();
    </script>
@endsection
