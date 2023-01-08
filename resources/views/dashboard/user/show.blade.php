@extends('layouts.master')

@section('style')
    <style>
        input:read-only{
            background: transparent !important;
        }
    </style>
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
                        <div class="form-group">
                            <label for="">NAMA</label>
                            <input name="name" type="text" class="form-control" placeholder="cth: John Doe" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">EMAIL</label>
                                    <input name="email" type="text" class="form-control" placeholder="ex: john.doe@example.com" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NOMOR TELEPON</label>
                                    <input name="phone_number" type="text" class="form-control" placeholder="ex: 085157212121" value="{{ $user->phone_number }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">BAGIAN</label>
                                    <input name="role" type="text" class="form-control" placeholder="cth: John Doe" value="{{ $user->role->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">STATUS</label>
                                    <input name="role" type="text" class="form-control" placeholder="cth: John Doe" value="{{ $user->status }}" readonly>
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
                                                <input name="permissions[]" type="checkbox" id="user-activity-checkbox1" class="checkbox-input" readonly value="user_activity_fulldata">
                                                <label for="user-activity-checkbox1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-activity-checkbox2" class="checkbox-input" readonly value="user_activity_read">
                                                <label for="user-activity-checkbox2"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-activity-checkbox3" class="checkbox-input" readonly value="user_activity_create">
                                                <label for="user-activity-checkbox3"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-activity-checkbox4" class="checkbox-input" readonly value="user_activity_update">
                                                <label for="user-activity-checkbox4"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-activity-checkbox5" class="checkbox-input" readonly value="user_activity_delete">
                                                <label for="user-activity-checkbox5"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UPT</td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="upt-checkbox1" class="checkbox-input" readonly readonly>
                                                <label for="upt-checkbox1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="upt-checkbox2" class="checkbox-input" readonly value="upt_read">
                                                <label for="upt-checkbox2"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="upt-checkbox3" class="checkbox-input" readonly value="upt_create">
                                                <label for="upt-checkbox3"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="upt-checkbox4" class="checkbox-input" readonly value="upt_update">
                                                <label for="upt-checkbox4"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="upt-checkbox5" class="checkbox-input" readonly value="upt_delete">
                                                <label for="upt-checkbox5"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PETUGAS</td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-checkbox1" class="checkbox-input" readonly readonly>
                                                <label for="user-checkbox1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-checkbox2" class="checkbox-input" readonly value="user_read">
                                                <label for="user-checkbox2"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-checkbox3" class="checkbox-input" readonly value="user_create">
                                                <label for="user-checkbox3"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-checkbox4" class="checkbox-input" readonly value="user_update">
                                                <label for="user-checkbox4"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-checkbox5" class="checkbox-input" readonly value="user_delete">
                                                <label for="user-checkbox5"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LOKASI PETUGAS</td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-location-checkbox1" class="checkbox-input" readonly readonly>
                                                <label for="user-location-checkbox1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-location-checkbox2" class="checkbox-input" readonly value="user_location_read">
                                                <label for="user-location-checkbox2"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-location-checkbox3" class="checkbox-input" readonly readonly>
                                                <label for="user-location-checkbox3"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="user-location-checkbox4" class="checkbox-input" readonly readonly>
                                                <label for="user-location-checkbox4"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox">
                                                <input name="permissions[]" type="checkbox" id="upt-checkbox5" class="checkbox-input" readonly readonly>
                                                <label for="upt-checkbox5"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="date" name="start_date" id="" class="form-control" value="{{ request()->start_date ?? date('Y-m-d') }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="end_date" id="" class="form-control" value="{{ request()->end_date ?? date('Y-m-d') }}">
                                </div>
                                <div class="col-md-4">
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
                        <p>Total Aktivitas</p>
                        <h1 class="text-primary">{{ count($activities) }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-0">
                <div class="card-content collapse show">
                    <div class="card-body text-center">
                        <p>Total Jam Kerja</p>
                        <h1 class="text-warning">{{ $activities->sum('diff_in_hours') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">Laporan Aktivitas</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <table class="table datatable w-100 table-responsive d-xl-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th class="text-center">JAM</th>
                                    <th class="text-nowrap">AKTIVITAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <td></td>
                                        <td class="text-nowrap">{{ $activity->date_name }}</td>
                                        <td class="text-nowrap text-center">{{ $activity->start_time }} - {{ $activity->end_time }}</td>
                                        <td class="text-nowrap">{{ $activity->activity }}</td>
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
        $("a[href='{{ route('dashboard.petugas.index') }}']").closest("li").addClass("active");

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
    @foreach ($user->user_permissions as $permission)
        <script>
            $("input[value=\"{{ $permission->permission }}\"]").prop("checked", true);
        </script>
    @endforeach
@endsection
