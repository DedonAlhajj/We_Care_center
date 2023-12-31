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
        <div class="card-body">
            <form id="" action="{{ route('patients.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div style="background-color: #d1ecf1;
    width: 100%;
    padding: 10px;
    font-weight: bold;">معلومات تسجيل الدخول </div>
               <div style="margin-bottom: 23px;"></div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">ايميل : </strong></x-forms.label>
                        <x-forms.input id="email" type="email" requiredInput="*" class="required" name="email" />
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">حالة ضمن النظام : </strong></x-forms.label>
                        <select name="Status" id="select-beast Status"
                                class="form-control  nice-select  custom-select">
                            <option value="مفعل">مفعل</option>
                            <option value="غير مفعل">غير مفعل</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <x-forms.label id=""><strong class="">كلمة المرور : </strong></x-forms.label>
                                <x-forms.input id="password" requiredInput="*" class="required" name="password"  />
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">تاكيد كلمة المرور : </strong></x-forms.label>
                                <x-forms.input  requiredInput="*" class="required" name="confirm-password" />
                            </div>
                        </div>
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">نوع المستخدم</strong></x-forms.label>
                        <select id="roles" name="roles[]" multiple class="form-control select2">
                            @foreach ($roles as $key => $value)
                                <option value="{{ $value->id }}"/>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="background-color: #d1ecf1;
    width: 100%;
    padding: 10px;
    font-weight: bold;">معلومات المريض </div>
                <div style="margin-bottom: 23px;"></div>


                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <x-forms.label id=""><strong class="">اسم المريض : </strong></x-forms.label>
                        <x-forms.input id="f_name" requiredInput="*" class="required" name="f_name"/>
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">تاريخ الولادة : </strong></x-forms.label>
                        <div class="input-group-prepend">
                            <input id="birth_date" class="form-control" name="birth_date" placeholder="MM/DD/YYYY" type="date">
                        </div>

                    </div>
                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <x-forms.label id=""><strong class="">اسم الاب : </strong></x-forms.label>
                                <x-forms.input requiredInput="*" class="required" name="ft_name"/>
                            </div>
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <x-forms.label id=""><strong class="">اسم الام : </strong></x-forms.label>
                                <x-forms.input requiredInput="*" class="required" name="mother_name"/>
                            </div>
                        </div>

                    </div>
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">الحالة الاجتماعية : </strong></x-forms.label>
                                <select id="marital_status" name="marital_status" class="form-control select2">
                                    <option value="">chose one</option>
                                    <option value="1">متزوج</option>
                                    <option value="2">اعزب</option>
                                    <option value="3">مطلق</option>
                                    <option value="4">ارمل</option>
                                </select>
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">نوع : </strong></x-forms.label>
                                <select name="title" class="form-control select2">
                                    <option value="">chose one</option>
                                    <option value="1">سيد</option>
                                    <option value="2">سيدة</option>
                                    <option value="3">انسة</option>
                                    <option value="4">دكتور</option>
                                    <option value="5">طفل</option>
                                    <option value="6">طفلة</option>
                                    <option value="7">شاب</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">رقم الموبايل : </strong></x-forms.label>
                                <x-forms.input  requiredInput="*" class="required" name="mobile" />

                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">رقم الهاتف : </strong></x-forms.label>
                                <x-forms.input requiredInput="*" class="required" name="phone" />
                            </div>
                        </div>

                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">الجنس : </strong></x-forms.label>
                                <select id="sex" name="sex" class="form-control select2">
                                    <option value="">chose one</option>
                                    <option value="1">ذكر</option>
                                    <option value="2">انثى</option>
                                </select>
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <x-forms.label id=""><strong class="">زمرة الدم: </strong></x-forms.label>
                                <select name="blood" class="form-control select2">
                                    <option value="">chose one</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mg-b-20">
                    <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">الجنسية</strong></x-forms.label>
                        <select name="nationality" multiple class="form-control select2">
                            @foreach ($nationality as $key => $value)
                                <option value="{{ $value->id }}"/>{{ $value->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">المدينة</strong></x-forms.label>
                        <select id="city" name="p_city" multiple class="form-control select2">
                            @foreach ($city as $key => $value)
                                <option value="{{ $value->id }}"/>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">المنطقة</strong></x-forms.label>
                        <select id="area" name="p_area" multiple class="form-control select2">
                            @foreach ($area as $key => $value)
                                <option value="{{ $value->id }}"/>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <x-forms.label id=""><strong class="">العنوان</strong></x-forms.label>
                        <x-forms.input type="text" requiredInput="" class="required" name="address" />
                    </div>
                </div>

                <div class="mg-t-30">
                    <button id="formid" class="btn btn-info-gradient pd-x-20" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')

    <script>
        $("#formid").click(function(){


            var email = $("#email").val();
            var f_name = $("#f_name").val();
            var password = $("#password").val();
            var birth_date = $("#birth_date").val();

            if(email == "") {
                alert("Please enter email.");
                return false;
            }
            if($('#Status').val()) {
                alert("Please chose Status.");
                return false;
            }
            if(password == "") {
                alert("Please enter password.");
                return false;
            }
            if(!$('#roles').val()) {
                alert("Please chose role.");
                return false;
            }
            if(f_name == "") {
                alert("Please enter name.");
                return false;
            }
            if(birth_date == "") {
                alert("Please enter birthday.");
                return false;
            }
            if(!$('#marital_status').val()) {
                alert("Please chose status.");
                return false;
            }
            if(!$('#sex').val()) {
                alert("Please chose sex.");
                return false;
            }
            if(!$('#city').val()) {
                alert("Please chose city.");
                return false;
            }
            if(!$('#area').val()) {
                alert("Please chose area.");
                return false;
            }

                $("#formid").submit(); // Submit the form

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
