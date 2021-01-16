@extends('admins.layout.master')
@section('content')
    <section class="content">
        <div class="box box-info">
            <h3 class="box-title">{{--{{$attributeValue->attributeGroup->title}}--}} ویرایش مقدار ویژگی </h3>

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
                        {!!  Form::model($attributeValue, ['route' => ['attributes-value.update',$attributeValue->id]]) !!}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            {!! Form::label('name', 'عنوان') !!}
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type','نوع ویژگی') !!}
                            <select name="attribute_group" id="" class="form-control">
                                <option value="attribute_group">انتخاب ویژگی</option>
                                @foreach($attributeGroup as $attribute)
                                    <option value="{{$attribute->id}}"@if($attribute->id==$attributeValue->attributeGroup->id) selected @endif>{{$attribute->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        {!! Form::submit('ذخیره',['class'=>'btn btn-success pull-left']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
