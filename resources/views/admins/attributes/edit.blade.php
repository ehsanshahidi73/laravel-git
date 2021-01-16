@extends('admins.layout.master')
@section('content')
    <section class="content">
        <div class="box box-info">
            <h3 class="box-title">{{$attributeGroup->name}} ویرایش گروه ویژگی </h3>

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
                        {!!  Form::model($attributeGroup, ['route' => ['attributes-group.update',$attributeGroup->id]]) !!}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            {!! Form::label('name', 'نام') !!}
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type','نوع') !!}
                            <select name="type" id="" class="form-control">
                                <option value="">انتخاب کنید</option>
                                <option value="select" @if($attributeGroup->type=='select') selected @endif>لیست تکی</option>
                                <option value="multiple" @if($attributeGroup->type=='multiple') selected @endif>لیست چندتایی</option>
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
