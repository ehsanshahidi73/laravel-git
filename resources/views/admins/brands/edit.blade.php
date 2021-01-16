@extends('admins.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin//css/dropzone.css')}}">
@endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <h3 class="box-title">{{$brand->name}} ویرایش  برند </h3>

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
                        {!!  Form::model($brand, ['route' => ['brands.update', $brand->id]]) !!}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            {!! Form::label('name', 'تصویر برند') !!}
                            <img src="{{$brand->photo->path}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'نام') !!}
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'توضیحات برند') !!}
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12">
                                <label>لوگوی برند مورد نظر را انتخاب نمایید</label>
                                <input type="hidden" name="photo_id" id="brand-photo" value="{{$brand->photo_id}}">
                                <div id="brand_photo" class="dropzone">
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('ذخیره',['class'=>'btn btn-success pull-left']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{asset('/admin//js/dropzone.js')}}" type="application/javascript"></script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#brand_photo", {
            addRemoveLinks: true,
            url: "{{route('photos.store')}}",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                document.getElementById('brand-photo').value = response.photo_id;
            }
        });
    </script>
@endsection
