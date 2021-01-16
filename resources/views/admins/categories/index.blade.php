@extends('admins.layout.master')
@section('content')

    <section class="content">
        <div class="box-tools" style="text-align: left">
            <a class="btn btn-app" href="{{route('categories.create')}}">
                <i class="fa fa-plus"></i>جدید
            </a>
        </div>
        <div class="box box-info">
            <h3 class="box-title">دسته بندی ها</h3>

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
                @if(Session::has('delete_category'))
                    <div class="alert alert-danger">
                        <div>{{Session('delete_category')}}</div>
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
                        @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{$category->id}}</td>
                                <td class="text-center">{{$category->name}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('categories.edit',$category->id)}}">ویرایش</a>
                                    <div class="form-group" style="display: inline-block">
                                        {!! Form::open(['route' => ['categories.destroy', $category->id]]) !!}
                                        {{ method_field('DELETE') }}
                                        {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <a class="btn btn-primary" href="{{route('categories.indexSetting',$category->id)}}">تنظیمات</a>
                                </td>
                            </tr>
                            @if(count($category->childrenRecursive)>0)
                                @include('admins.partials.subcatlist',['categories'=>$category->childrenRecursive,'level'=>1])
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>

    </section>
@endsection
