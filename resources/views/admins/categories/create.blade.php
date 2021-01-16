@extends('admins.layout.master')
@section('content')
    <section class="content">
        {{-- <div class="box-tools">
             <a class="btn btn-app" style="text-align: left">
                 <i class="fa fa-plus"></i>جدید
             </a>
         </div>--}}
        <div class="box box-info">
            <h3 class="box-title">ایجاد دسته بندی جدید</h3>

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
                        <form class="form" method="post" action="{{ url('admins/categories')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="cat_name">نام</label>
                                <input type="text" id="cat_name_l" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="cat_name">دسته والد</label>
                                <select name="category_parent" id="" class="form-control">
                                    <option value="">بدون والد</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @if(isset($category->childrenRecursive))
                                            @include('admins.partials.subcategory',['categories'=>$category->childrenRecursive,'level'=>1])
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">عنوان سیو</label>
                                <input type="text" class="form-control" name="meta_title"
                                       placeholder="اطلاعات بیشتری درباره برند وارد نمایید">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سیو</label>
                                <input type="text" class="form-control" name="meta_desc"
                                       placeholder="اطلاعات بیشتری درباره برند وارد نمایید">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمه کلیدی سیو</label>
                                <input type="text" class="form-control" name="meta_keywords"
                                       placeholder="اطلاعات بیشتری درباره برند وارد نمایید">
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
