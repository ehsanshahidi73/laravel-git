@extends('admins.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin//css/dropzone.css')}}">
@endsection
@section('content')
    <section class="content">
        {{-- <div class="box-tools">
             <a class="btn btn-app" style="text-align: left">
                 <i class="fa fa-plus"></i>جدید
             </a>
         </div>--}}
        <div class="box box-info">
            <h3 class="box-title">ایجاد برند جدید</h3>

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
                        <form class="form" method="post" action="{{ url('admins/brands')}}">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="cat_name">عنوان</label>
                                    <input type="text" id="cat_name_l" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="cat_name">توضیحات برند</label>
                                    <input type="text" id="meta_title" class="form-control" name="description"
                                           placeholder="اطلاعات بیشتری درباره برند وارد نمایید">
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12">
                                        <label>لوگوی برند مورد نظر را انتخاب نمایید</label>
                                        <input type="hidden" name="photo_id" id="brand-photo">
                                        <div id="brand_photo" class="dropzone">
                                        </div>
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
@section('scripts')
    <script src="{{asset('/admin/js/dropzone.js')}}" type="application/javascript"></script>
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
