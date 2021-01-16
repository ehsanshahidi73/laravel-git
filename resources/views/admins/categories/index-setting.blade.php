@extends('admins.layout.master')
@section('content')
    <section class="content">
        {{-- <div class="box-tools">
             <a class="btn btn-app" style="text-align: left">
                 <i class="fa fa-plus"></i>جدید
             </a>
         </div>--}}
        <div class="box box-info">
            <h3 class="box-title">تعیین ویژگی دسته بندی {{$category->name}}</h3>

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
                        <form class="form" method="post" action="{{route('categories.saveSetting',$category->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="attributeGroups">ویژگی های دسته بندی {{$category->name}}</label>
                                <select name="attributeGroups[]" class="form-control" multiple>
                                    @foreach($attributeGroups as $attributeGroup)
                                        <option value="{{$attributeGroup->id}}" @if(in_array($attributeGroup->id,$category->attributeGroups->pluck('id')->toArray())) selected @endif>{{$attributeGroup->title}}</option>
                                    @endforeach
                                </select>
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
