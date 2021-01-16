@extends('admins.layout.master')
@section('content')

    <section class="content">
        <div class="box-tools" style="text-align: left">
            <a class="btn btn-app" href="{{route('products.create')}}">
                <i class="fa fa-plus"></i>جدید
            </a>
        </div>
        <div class="box box-info">

            <h3 class="box-title">محصولات</h3>

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
                            <th class="text-center">کد محصول</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{$product->id}}</td>
                                <td class="text-center">{{$product->sku}}</td>
                                <td class="text-center">{{$product->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning"
                                       href="{{route('products.edit',$product->id)}}">ویرایش</a>
                                    <div class="form-group" style="display: inline-block">
                                        {!! Form::open(['route' => ['products.destroy', $product->id]]) !!}
                                        {{ method_field('DELETE') }}
                                        {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12" style="text-align: center">{{$products->links()}}</div>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>

    </section>
@endsection
