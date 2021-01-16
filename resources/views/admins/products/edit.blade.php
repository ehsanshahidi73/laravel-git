@extends('admins.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/css/dropzone.css')}}">
@endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <h3 class="box-title">ویرایش محصول {{$product->title}}</h3>

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
                        {!!  Form::model($product, ['route' => ['products.update', $product->id]]) !!}
                        {{ method_field('PATCH') }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">نام</label>
                                    <input type="text" class="form-control" name="title" value="{{$product->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">نام مستعار</label>
                                    <input type="text" class="form-control" name="slug" value="{{$product->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">دسته بندی</label>
                                    <select name="categories[]" class="form-control" multiple>
                                        @foreach($product->categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @if(count($category->childrenRecursive)>0)
                                                @include('admins.partials.subcategory',['categories'=>$category->childrenRecursive,'level'=>1])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">برند</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}"
                                                    @if($product->brand->id==$brand->id) selected @endif>{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group status-radio" style="direction: rtl">
                                    <label for="status">وضعیت نشر</label><br>
                                    <div style="display: inline-block">
                                        <input type="radio" style="vertical-align: sub;margin: 5px" name="status"
                                               value="0" @if($product->status==0) checked @endif><span>منتشر نشده</span>
                                    </div>
                                    <div style="display: inline-block">
                                        <input type="radio" style="vertical-align: sub;margin: 5px" name="status"
                                               value="1" @if($product->status==0) checked @endif><span>منتشر شده</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price">قیمت</label>
                                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">قیمت ویژه</label>
                                    <input type="number" class="form-control" name="discount_price"
                                           value="{{$product->discount_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="cat_name">توضیحات </label>
                                    <textarea name="description" id="editor1" class="form-control" cols="30"
                                              rows="10">{{$product->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12">
                                        <label>گالری تصویر</label>
                                        <input type="hidden" name="photo_id[]" id="product-photo">
                                        <div id="photo" class="dropzone"></div>
                                        <div class="row">
                                            @foreach($product->photos as $photo)
                                                <div class="col-sm-3" id="updated_photo_{{$photo->id}}">
                                                    <img class="img-responsive" src="{{$photo->path}}">
                                                    <button type="button" class="btn btn-danger"
                                                            onclick="removeImage({{$photo->id}})">حذف
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">عنوان سيو</label>
                                    <input type="text" class="form-control" name="meta_title"
                                           value="{{$product->meta_title}}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_desc">توضیحات سیو</label>
                                    <input type="text" class="form-control" name="meta_desc"
                                           value="{{$product->meta_desc}}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">کلمات کلیدی سیو</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                           value="{{$product->meta_keywords}}">
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="submit" onclick="productGallery()" class="btn btn-success">
                                    <i class="icon-note"></i> ذخیره
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{asset('/admin/js/dropzone.js')}}" type="application/javascript"></script>
    <script src="{{asset('/admin/plugins/ckeditor/ckeditor.js')}}" type="application/javascript"></script>

    <script>
        Dropzone.autoDiscover = false;
        var photosGallery=[];
        var photo=[].concat({{$product->photos->pluck('id')}});
        var myDropzone = new Dropzone("#photo",{
            addRemoveLinks: true,
            url: "{{route('photos.store')}}",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                photosGallery.push(response.photo_id)
            }
        });
        productGallery=function () {
            document.getElementById('product-photo').value = photosGallery.concat(photo);
        }
        removeImage =function (id) {
            var index=photo.indexOf(id);
            photo.splice(index,1);
         document.getElementById('updated_photo_'+id).remove();
        }
    </script>
@endsection
