@if(isset($selected_category))
    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}"@if($selected_category->parent_id == $sub_category->id) selected @endif>{{str_repeat('--',$level)}}{{$sub_category->name}}</option>
        @if(isset($sub_category->childrenRecursive))
            @include('admins.partials.subcategory',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1,'selected_category'=>$selected_category])
        @endif
    @endforeach
@else
@foreach($categories as $sub_category)
    <option value="{{$sub_category->id}}">{{str_repeat('--',$level)}}{{$sub_category->name}}</option>
    @if(isset($sub_category->childrenRecursive))
@include('admins.partials.subcategory',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif
@endforeach
@endif
