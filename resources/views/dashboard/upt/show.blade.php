@extends('layouts.master')

@section('style')
    <style>
        .img-preview-wrapper{
            padding: 24px;
        }

        .img-preview-wrapper img{
            max-width: 372px;
        }

        @media only screen and (max-width: 600px)
        {
            .img-preview-wrapper{
                padding: 12px !important;
            }
            .img-preview-wrapper img{
                max-width: 100% !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">{{ $upt->name }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="img-preview-wrapper text-center mb-1">
                                <img src="{{ $upt->img_organizational_structure }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group" style="white-space: pre">{{ $upt->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("a[href='{{ route('dashboard.upt.index') }}']").closest("li").addClass("active");
    </script>
@endsection
