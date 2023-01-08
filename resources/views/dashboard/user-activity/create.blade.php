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
                        <form action="{{ route('dashboard.laporan-aktivitas.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">NAMA</label>
                                <select name="user_id" class="form-control select2">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-md-4 mb-1 mb-md-0">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-6 col-md-4 mb-1 mb-md-0">
                                    <label for="">Jam Mulai</label>
                                    <input type="time" name="start_time" class="form-control" required>
                                </div>
                                <div class="col-6 col-md-4">
                                    <label for="">Jam Selesai</label>
                                    <input type="time" name="end_time" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Aktivitas</label>
                                <input type="text" name="activity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="notes" class="form-control" rows="5"></textarea>
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
        $("a[href='{{ route('dashboard.laporan-aktivitas.index') }}']").closest("li").addClass("active");
    </script>
@endsection
