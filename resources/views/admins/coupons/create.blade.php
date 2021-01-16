@extends('admins.layout.master')
@section('content')
    <section class="content">
        {{-- <div class="box-tools">
             <a class="btn btn-app" style="text-align: left">
                 <i class="fa fa-plus"></i>جدید
             </a>
         </div>--}}
        <div class="box box-info">
            <h3 class="box-title">ایجاد کد تخفیف جدید</h3>

            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="form" method="post" action="{{ url('admins/coupons')}}">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="cat_name">عنوان کد تخفیف</label>
                                    <input type="text" id="cat_name_l" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="cat_name">کد</label>
                                    <input type="text" id="meta_title" class="form-control" name="code"
                                           placeholder="کد تخفیف را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="cat_name">قیمت</label>
                                    <input type="number"  class="form-control" name="price"
                                           placeholder="قیمت  را وارد کنید">
                                </div>
                                <div class="form-group status-radio" style="direction: rtl">
                                    <label for="status">وضعیت </label><br>
                                    <div style="display: inline-block">
                                        <input type="radio" style="vertical-align: sub;margin: 5px" name="status" value="0" checked><span>منتشر نشده</span>
                                    </div>
                                    <div style="display: inline-block">
                                        <input type="radio" style="vertical-align: sub;margin: 5px" name="status" value="1"><span>منتشر شده</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-note"></i> ذخیره
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
