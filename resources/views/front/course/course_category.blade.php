<h5 class="mt-4">دسته بندی ها</h5>
<ul class="list-group samples-category">
    @foreach($categories as $category)
        <li class="list-group-item mt-2 parent"><a href="/courses/coursesCategory/{{$category->name}}" class="">{{$category->title}}</a></li>
        @if(count($category->subCategory) > 0)
            @include('front.course.sub_category',
            ['sub_category'=>$category->subCategory])
        @endif
    @endforeach
</ul>
