<ul class="child">
    @foreach ($sub_category as $sub_cat )
        <li class="">
            <i class="fa fa-plus-circle parent"></i>
            <input type="checkbox" name="cat[]"
                   id="cat_{{$sub_cat->id}}"
                   value="{{ $sub_cat->id }}"
                {{ in_array($sub_cat->id,$course->categories()->pluck('category_id')->toArray()) ? 'checked':''}}>
            <label class="parent" for="cat_{{$sub_cat->id}}">{{ $sub_cat->name }}</label>
            @if (count($sub_cat->subCategory))
                @include('admin.training_course_management.sub_category_edit',
                    ['sub_category'=>$sub_cat->subCategory])
            @endif
        </li>
    @endforeach
</ul>

