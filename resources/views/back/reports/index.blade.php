@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@section('title')

@stop

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style2">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/' . $page='dashboard') }}">الصفحة الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item ">
                            <a href="{{ url('/' . $page='patients') }}">المرضى</a>
                        </li>
                        <li class="breadcrumb-item active">اضافة مريض</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- breadcrumb -->
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span></button>
            <strong>Well done!</strong> {{ session('success') }}.
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mg-b-0" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span></button>
            <strong>Oh snap!</strong> {{ session('error') }}.
        </div>
    @endif

    <div class="card">
        <div class="card-body" style="height: 439px;">
            <form id="DeleteCom" action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div id="test" style="background-color: #d1ecf1;
    width: 100%;
    padding: 10px;
    font-weight: bold;
    margin-bottom: 17px;">تقارير انتشار الامراض </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-5 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">حسب المنطقة</strong></x-forms.label>
                        <select id="area" name="area" class="form-control select2">
                            <option>  </option>
                            @foreach ($area as $key => $value)
                                <option value="{{ $value->id }}"/>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="parsley-input col-md-5 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <button style="margin-top: 27px;
    height: 36px;" id="formid" class="btn btn-info-gradient pd-x-20" type="submit">Get</button>
                    </div>
                </div>
                <div class="row mg-b-20">
                    <div class="parsley-input col-md-5 mg-t-20 mg-md-t-0  report" id="lnWrapper">

                    </div></div>

            </form>

        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')

    <script>

        $('#DeleteCom').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('report.store') }}",
                data: $(this).serialize()
                ,
                success: function(data) {
                   // alert(data);
                    $(".report").empty();
                    diaSelect = '<div class="card">' +
                        '<div class="card-header pb-1">'+
                        '<h3 class="card-title mb-2">الامراض المنتشرة في '+data[0]+'</h3>'
                        +'</div>'+
                   '<div class="product-timeline card-body pt-2 mt-1">'+
                        '<ul class="timeline-1 mb-0">'+
                            '<li class="mt-0">'+'<i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i>'+
                           '<span class="font-weight-semibold mb-4 tx-14 ">'+data[1]+'</span>'+
                                '<a href="#" class="float-left tx-11 text-muted">'+data[2]+'</a>'+
                            '</li>'+

                            '<li class="mt-0"><i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i>'+
                                '<span class="font-weight-semibold mb-4 tx-14 ">'+data[3]+'</span>'+
                                '<a href="#" class="float-left tx-11 text-muted">'+data[4]+'</a>'+

                            '</li>'+

                            '<li class="mt-0"><i class="si si-eye bg-purple-gradient text-white product-icon"></i>'+
                                '<span class="font-weight-semibold mb-4 tx-14 ">'+data[5]+'</span>'+
                                '<a href="#" class="float-left tx-11 text-muted">'+data[6]+'</a>'+

                           '</li>'+
                            '<li class="mt-0 mb-0"><i class="icon-note icons bg-primary-gradient text-white product-icon"></i>'+
                                '<span class="font-weight-semibold mb-4 tx-14 ">'+data[7]+'</span>'+
                                '<a href="#" class="float-left tx-11 text-muted">'+data[8]+'</a>'+

                            '</li> </ul> </div> </div>';


                    $('.report').append(diaSelect)
                },
                error: function(xhr, status, error) {
                    alert(data);
                    console.error(xhr);}});
        });
    </script>
    <!-- Internal Treeview js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Treeview js -->
    <script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection
