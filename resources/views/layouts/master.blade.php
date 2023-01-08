@php
    $userPermissions = Auth::user()->user_permissions->pluck('permission')->toArray();
@endphp

<!DOCTYPE html>
<html class="loaded" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>MANPOWER MANAGEMENT - {{ $title }}</title>
    <link rel="apple-touch-icon" href="/app-assets/images/logo/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/logo/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-invoice.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/search.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <style>
        @media (max-width: 767.98px){
            .card .heading-elements.visible .list-inline {
                border: 0 solid #DFE3E7;
                box-shadow: 0 2px 4px 0 rgb(0 0 0 / 20%) !important;
                border-radius: 0.267rem !important;
            }
        }
        div#DataTables_Table_0_wrapper{
            width: 100% !important;
        }
        .brand-logo{
            height: auto !important;
            width: auto !important;
            border-radius: 255px;
        }
        .navbar-brand{
            margin-top: 0px !important;
        }
        /* div.dataTables_wrapper div.dataTables_filter {
            text-align: left !important;
        } */
    </style>
    @yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout semi-dark-layout 2-columns navbar-sticky sticky-footer pace-done menu-expanded vertical-menu-modern"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="overflow: auto;">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs is-active"
                                    href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
                        </ul>


                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-capitalize">{{ Auth::user()->name }}</span>
                                    <span class="user-status">{{ Auth::user()->email }}</span>
                                </div>
                                <span>
                                    <img class="round" src="/app-assets/images/profile/user-uploads/user.jpg" alt="avatar" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="bx bx-power-off mr-50"></i> Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true"
        style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="javascript:;">
                        <div class="brand-logo align-items-center justify-content-center">
                            <img src="/app-assets/images/logo/logo-text.png" height="49.5px" width="auto" class="align-middle">
                        </div>
                        <span class="brand-text"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content ps mt-1">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="home" style="visibility: visible; width: 60px;"> </i>
                        <span class="menu-title text-truncate">BERANDA</span>
                    </a>
                </li>
                @if (in_array('user_activity_read', $userPermissions))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.laporan-aktivitas.index') }}">
                            <i class="menu-livicon livicon-evo-holder" data-icon="line-chart" style="visibility: visible; width: 60px;"> </i>
                            <span class="menu-title text-truncate">LAPORAN AKTIVITAS</span>
                        </a>
                    </li>
                @endif
                @if (in_array('upt_read', $userPermissions))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.upt.index') }}">
                            <i class="menu-livicon livicon-evo-holder" data-icon="diagram" style="visibility: visible; width: 60px;"> </i>
                            <span class="menu-title text-truncate">UPT</span>
                        </a>
                    </li>
                @endif
                @if (in_array('user_read', $userPermissions))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.petugas.index') }}">
                            <i class="menu-livicon livicon-evo-holder" data-icon="users" style="visibility: visible; width: 60px;"> </i>
                            <span class="menu-title text-truncate">PETUGAS</span>
                        </a>
                    </li>
                @endif
                @if (in_array('user_location_read', $userPermissions))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.lokasi-petugas.index') }}">
                            <i class="menu-livicon livicon-evo-holder" data-icon="map" style="visibility: visible; width: 60px;"> </i>
                            <span class="menu-title text-truncate">LOKASI PETUGAS</span>
                        </a>
                    </li>
                @endif
                @if (in_array('search_read', $userPermissions))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.pencarian.index') }}">
                            <i class="menu-livicon livicon-evo-holder" data-icon="search" style="visibility: visible; width: 60px;"> </i>
                            <span class="menu-title text-truncate">PENCARIAN</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">{{ $title }}</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item">
                                    <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                @if (isset($content_headers))
                                    @foreach ($content_headers as $key => $content_header)
                                        <li class="breadcrumb-item">
                                            <a href="{{ $content_header->url ?? 'javascript:;' }}">{{ $content_header->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                                <li class="breadcrumb-item active">
                                    {{ $title }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body mb-2">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"
        style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>
    <div class="drag-target"
        style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-light">
        <p class="clearfix mb-0">
            <span class="float-left d-inline-block">2021 © PROVINSI PAPUA BARAT</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/inputmask/inputmask.min.js"></script>
    <script src="/app-assets/vendors/js/forms/inputmask/jquery.inputmask.min.js"></script>
    <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        if ($("a[href='{{ Request::url() }}']")[0])
        {
            $("a[href='{{ Request::url() }}']").closest("li").addClass("active");
        }

        if ($(".pickadate")[0])
        {
            $(".pickadate").pickadate({
                format: "yyyy-mm-dd",
            });
        }

        if ($(".select2")[0]) {
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }

        if ($(".currency")[0]) {
            $(".currency").inputmask({
                alias: "numeric",
                removeMaskOnSubmit: !0,
                rightAlign: 0,
                nullable: 0,
                digits: 0,
                prefix: "",
                placeholder: "",
                groupSeparator: "."
            });
        }

        if ($(".numeric")[0]) {
            $(".numeric").inputmask({
                "mask": "9{*}"
            });
        }

        if ($(".select2")[0]) {
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }
        if ($(".touchspin")[0]) {
            $(".touchspin").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
            });
        }

        if($(".datatable")[0])
        {
            $(document).ready(function()
            {
                $(".datatable").each(function (index, element) {
                    var table = $(this).DataTable( {
                        "columnDefs": [ {
                            "searchable": false,
                            "orderable": false,
                            "targets": 0
                        } ],
                    } );
                    table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                    } ).draw();
                    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                        table.columns.adjust().draw()
                    })
                })
            });
        }

        if ($('.disable-space')[0])
        {
            $('.disable-space').on({
                keydown: function(e) {
                    if (e.which === 32)
                    return false;
                },
                change: function() {
                    this.value = this.value.replace(/\s/g, "");
                }
            });
        }

        function number_format (number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        function showConfirmDialog(message, confirmCallback){
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, saya yakin',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    confirmCallback();
                }
            })
        }
    </script>
    @if (session('ERR'))
        <script>
            Swal.fire({
                title: "ERROR!",
                text: "{{ session('ERR') }}",
                icon: "error",
                confirmButtonClass: "btn btn-primary",
            });
        </script>
    @endif
    @if (session('OK'))
        <script>
            Swal.fire({
                title: "OK!",
                text: "{{ session('OK') }}",
                icon: "success",
                confirmButtonClass: "btn btn-primary",
            });
        </script>
    @endif

    @yield('script')
    <!-- BEGIN: Page JS-->
    <script>
        let isUpdatingLocation = 0;
        let currentLat = -0.918415;
        let currentLng = 134.030682;

        function updateLocation(currentLat, currentLng)
        {
            isUpdatingLocation = 1;
            let body = {
                _token: @json(csrf_token()),
                _method: "PUT",
                lat: currentLat,
                lng: currentLng
            };
            $.ajax({
                url: "{{ route('dashboard.lokasi-petugas.update', Auth::user()->id) }}",
                method: "POST",
                data: body,
            }).done(function(updatedLocationResponse)
            {
                console.log({updatedLocationResponse});
                isUpdatingLocation = 0;
            })
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(setLocation);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        function setLocation(location)
        {
            console.log(location.coords.latitude, location.coords.longitude);
            currentLat = location.coords.latitude;
            currentLng = location.coords.longitude;
            updateLocation(currentLat, currentLng);

            return true;
        }

        function beginUpdateLocation()
        {
            setInterval(() => {
                if (isUpdatingLocation == 0)
                {
                    getLocation();
                }
            }, 5000);
        }

        beginUpdateLocation();
    </script>
</body>
<!-- END: Body-->

</html>

</html>
