@extends('frontend.layout.master')

@section('content')

    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
            <h1 class="title">ثبت نام حساب کاربری</h1>
            <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{route('login')}}">صفحه لاگین</a> مراجعه کنید.</p>
                <form method="post" class="form-horizontal" action="{{ route('register.user') }}">
                    @csrf
                <fieldset id="account">
                    <legend>اطلاعات شخصی شما</legend>
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="" name="name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="" name="last_name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-fax" class="col-sm-2 control-label">کد ملی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-fax" placeholder="فکس" value="" name="national_code">
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>آدرس</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-company" placeholder="شرکت" value="" name="company">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">آدرس</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-address-1" placeholder="آدرس" value="" name="address">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="" name="post_code">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-country" class="col-sm-2 control-label">استان</label>
                        <div class="col-sm-10">
                            <select id="province" name="province_id">
                                <option value="0">استان را انتخاب کنید</option>
                                <option value="1">آذربایجان شرقی</option>
                                <option value="2">آذربایجان غربی</option>
                                <option value="3">اردبیل</option>
                                <option value="4">اصفهان</option>
                                <option value="5">البرز</option>
                                <option value="6">ایلام</option>
                                <option value="7">بوشهر</option>
                                <option value="8">تهران</option>
                                <option value="9">چهارمحال بختیاری</option>
                                <option value="10">خراسان جنوبی</option>
                                <option value="11">خراسان رضوی</option>
                                <option value="12">خراسان شمالی</option>
                                <option value="13">خوزستان</option>
                                <option value="14">زنجان</option>
                                <option value="15">سمنان</option>
                                <option value="16">سیستان و بلوچستان</option>
                                <option value="17">فارس</option>
                                <option value="18">قزوین</option>
                                <option value="19">قم</option>
                                <option value="20">کردستان</option>
                                <option value="21">کرمان</option>
                                <option value="22">کرمانشاه</option>
                                <option value="23">کهکیلویه و بویراحمد</option>
                                <option value="24">گلستان</option>
                                <option value="25">گیلان</option>
                                <option value="26">لرستان</option>
                                <option value="27">مازندران</option>
                                <option value="28">مرکزی</option>
                                <option value="29">هرمزگان</option>
                                <option value="30">همدان</option>
                                <option value="31">یزد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">شهر</label>
                        <div class="col-sm-10">
                            <select id="city" name="city_id"></select>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>رمز عبور شما</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-password" placeholder="رمز عبور" value="" name="password">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                      <input type="submit" class="btn btn-primary" value="ثبت نام">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part End -->
    </div>

@endsection
@section('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#province').on('change',function(e) {
                var provinces_id = e.target.value;
                $.ajax({
                    url:"{{ route('select.city') }}",
                    type:"POST",
                    data: {
                        provinces_id: provinces_id
                    },
                    success:function(response){
                        if(response){
                            $("#city").empty();

                           // console.log(response)
                           /* $.each(data.subcategories[0 ].subcategories,function(index,subcategory){

                                $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                            })*/
                          $.each(response.cities,function(key,value){
                                $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                         // console.log(value.name)
                          });

                        }else{
                            $("#city").empty();
                        }
                    }
                })
            });
        });
    </script>

@endsection
