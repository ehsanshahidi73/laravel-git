@extends('admins.layout.master')
@section('content')
    <section class="content">
        <div class="box box-info">
            <h3 class="box-title">{{$category->name}} ویرایش دسته بندی </h3>

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
                        {!!  Form::model($category, ['route' => ['categories.update', $category->id]]) !!}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            {!! Form::label('name', 'نام') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_parent','دسته والد') !!}
                            <select name="category_parent" id="" class="form-control">
                                <option value="">بدون والد</option>
                                @foreach($categories as $category_data)
                                    <option value="{{$category_data->id}}" @if($category->parent_id==$category_data->id) selected @endif>{{$category_data->name}}</option>
                                    @if(count($category_data->childrenRecursive)>0)
                                        @include('admins.partials.subcategory',['categories'=>$category_data->childrenRecursive,'level'=>1,'selected_category'=>$category])
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            {!! Form::label('meta_title', 'عنوان سیو') !!}
                            {!! Form::text('meta_title',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('meta_desc', 'توضیحات سیو') !!}
                            {!! Form::textarea('meta_desc',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('meta_keywords', 'کلمه کلیدی سيو') !!}
                            {!! Form::text('meta_keywords',null,['class'=>'form-control']) !!}
                        </div>

                        {!! Form::submit('ذخیره',['class'=>'btn btn-success pull-left']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
