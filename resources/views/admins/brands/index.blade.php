@extends('admins.layout.master')
@section('content')

    <section class="content">
        <div class="box-tools" style="text-align: left">
            <a class="btn btn-app" href="{{route('brands.create')}}">
                <i class="fa fa-plus"></i>جدید
            </a>
        </div>
        <div class="box box-info">

            <h3 class="box-title">برندها</h3>

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
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td class="text-center">{{$brand->id}}</td>
                                <td class="text-center">{{$brand->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning"
                                       href="{{route('brands.edit',$brand->id)}}">ویرایش</a>
                                    <div class="form-group" style="display: inline-block">
                                        {!! Form::open(['route' => ['brands.destroy', $brand->id]]) !!}
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
