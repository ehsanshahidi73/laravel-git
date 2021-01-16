@extends('frontend.layout.master')

@section('content')
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">
                <div>{{Session('success')}}</div>
            </div>
        @endif
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h1 class="title">حساب کاربری ورود</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="subtitle">مشتری جدید</h2>
                        <p><strong>ثبت نام حساب کاربری</strong></p>
                        <p>با ایجاد حساب کاربری میتوانید سریعتر خرید کرده، از وضعیت خرید خود آگاه شده و تاریخچه ی
                            سفارشات خود را مشاهده کنید.</p>
                        <a href="{{route('register')}}" class="btn btn-primary">ادامه</a></div>
                    <div class="col-sm-6">
                        <h2 class="subtitle">مشتری قبلی</h2>
                        <p><strong>من از قبل مشتری شما هستم</strong></p>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="input-email">آدرس ایمیل</label>
                                <input type="text" name="email" value="" placeholder="آدرس ایمیل" id="input-email"
                                       class="form-control"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-password">رمز عبور</label>
                                <input type="password" name="password" value="" placeholder="رمز عبور"
                                       id="input-password"
                                       class="form-control"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br/>
                                <a href="#">فراموشی رمز عبور</a></div>
                            <input type="submit" value="ورود" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->
            <!--Right Part Start -->
            <aside id="column-right" class="col-sm-3 hidden-xs">
                <h3 class="subtitle">حساب کاربری</h3>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="login.html">ورود</a></li>
                        <li><a href="register.html">ثبت نام</a></li>
                        <li><a href="#">فراموشی رمز عبور</a></li>
                        <li><a href="#">حساب کاربری</a></li>
                        <li><a href="#">لیست آدرس ها</a></li>
                        <li><a href="wishlist.html">لیست علاقه مندی</a></li>
                        <li><a href="#">تاریخچه سفارشات</a></li>
                        <li><a href="#">دانلود ها</a></li>
                        <li><a href="#">امتیازات خرید</a></li>
                        <li><a href="#">بازگشت</a></li>
                        <li><a href="#">تراکنش ها</a></li>
                        <li><a href="#">خبرنامه</a></li>
                        <li><a href="#">پرداخت های تکرار شونده</a></li>
                    </ul>
                </div>
            </aside>
            <!--Right Part End -->
        </div>
    </div>
@endsection
