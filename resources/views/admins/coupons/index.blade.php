@extends('admins.layout.master')
@section('content')

    <section class="content">
        <div class="box-tools" style="text-align: left">
            <a class="btn btn-app" href="{{route('coupons.create')}}">
                <i class="fa fa-plus"></i>جدید
            </a>
        </div>
        <div class="box box-info">

            <h3 class="box-title">کد های تخفیف</h3>

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
                @include('admins.partials.form-errors')
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{Session('success')}}</div>
                    </div>
                @endif
                @if(Session::has('delete'))
                    <div class="alert alert-success">
                        <div>{{Session('delete')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">کدتخفیف</th>
                            <th class="text-center">قیمت</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td class="text-center">{{$coupon->id}}</td>
                                <td class="text-center">{{$coupon->title}}</td>
                                <td class="text-center">{{$coupon->code}}</td>
                                <td class="text-center">{{$coupon->price}}</td>
                                @if($coupon->status==0)
                                    <td class="tag tag-pill tag-danger text-center">غیرفعال</td>
                                      @else
                                    <td class="tag tag-pill tag-success text-center">فعال</td>
                                @endif

                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('coupons.edit',$coupon->id)}}">ویرایش</a>
                                    <div class="form-group" style="display: inline-block">
                                        {!! Form::open(['route' => ['coupons.destroy', $coupon->id]]) !!}
                                        {{ method_field('DELETE') }}
                                        {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>

    </section>
@endsection
