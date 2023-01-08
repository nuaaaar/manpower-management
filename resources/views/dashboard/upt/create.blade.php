@extends('layouts.master')

@section('style')
    <style>
        .img-preview-wrapper{
            border: 2px dashed #5A8EEE !important;
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
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('dashboard.upt.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Gambar Struktur Organisasi</label>
                                <div class="img-preview-wrapper text-center mb-1">
                                    <img src="/app-assets/images/dropzone/empty.png" class="img-fluid">
                                </div>
                                <input name="file" type="file" class="form-control input-image" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="">NAMA UPT</label>
                                <input name="name" type="text" class="form-control" placeholder="cth: John Doe" required>
                            </div>
                            <div class="form-group">
                                <label for="">DESKRIPSI</label>
                                <textarea name="description" class="form-control" rows="6" required></textarea>
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
        $("a[href='{{ route('dashboard.upt.index') }}']").closest("li").addClass("active");

        $(document).on("change", ".input-image", function()
        {
            const [file] = $(this)[0].files
            console.log(file);
            if (file) {
                let img = URL.createObjectURL(file);
                console.log(img);
                $(this).siblings(".img-preview-wrapper").find("img").prop("src", img);
            }
        });
    </script>
@endsection
