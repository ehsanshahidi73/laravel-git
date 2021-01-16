@extends('admins.layout.master')
@section('content')

    <section class="content">
        <div class="box-tools" style="text-align: left">
            <a class="btn btn-app" href="{{route('attributes-value.create')}}">
                <i class="fa fa-plus"></i>جدید
            </a>
        </div>
        <div class="box box-info">
            <h3 class="box-title">مقادیر ویژگی ها</h3>

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
                {{--    @if(Session::has('delete_category'))
                        <div class="alert alert-danger">
                            <div>{{Session('delete_category')}}</div>
                        </div>
                    @endif--}}
              @if(Session::has('add_value'))
                    <div class="alert alert-success">
                        <div>{{Session('add_value')}}</div>
                    </div>
                @endif
               {{-- @if(Session::has('update-attribute'))
                    <div class="alert alert-success">
                        <div>{{Session('update-attribute')}}</div>
                    </div>
                @endif
                @if(Session::has('delete-attribute'))
                    <div class="alert alert-danger">
                        <div>{{Session('delete-attribute')}}</div>
                    </div>
                @endif--}}
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">ویژگی</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributesvalue as $attribute)
                            <tr>
                                <td class="text-center">{{$attribute->id}}</td>
                                <td class="text-center">{{$attribute->title}}</td>
                                <td class="text-center">{{ $attribute->attributeGroup->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning"
                                       href="{{route('attributes-value.edit',$attribute->id)}}">ویرایش</a>
                                    <div class="form-group" style="display: inline-block">
                                        {!! Form::open(['route' => ['attributes-value.destroy', $attribute->id]]) !!}
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
