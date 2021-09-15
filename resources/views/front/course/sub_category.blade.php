<ul>
    @foreach($sub_category as $sub_cat)
        <li class="mt-2 parent"><a href="/courses/coursesCategory/{{$category->name}}">{{ $sub_cat->title }}</a></li>
        @if(count($sub_cat->subCategory) > 0)
            @include('front.course.sub_category',
            ['sub_category'=>$sub_cat->subCategory])
        @endif
    @endforeach
</ul>
