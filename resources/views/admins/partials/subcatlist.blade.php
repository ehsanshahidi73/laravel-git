@foreach($categories as $sub_category)
    <tr>
        <td class="text-center">{{$sub_category->id}}</td>
        <td class="text-center">{{str_repeat('--',$level)}}{{$sub_category->name}}</td>
        <td class="text-center">
            <a class="btn btn-warning" href="{{route('categories.edit',$sub_category->id)}}">ویرایش</a>
            <div class="form-group" style="display: inline-block">
                {!! Form::open(['route' => ['categories.destroy', $sub_category->id]]) !!}
                {{ method_field('DELETE') }}
                {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
            <a class="btn btn-primary" href="{{route('categories.indexSetting',$sub_category->id)}}">تنظیمات</a>
        </td>
    </tr>
    @if(isset($sub_category->childrenRecursive))
        @include('admins.partials.subcatlist',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif
@endforeach
