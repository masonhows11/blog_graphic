<ul class="child">
    @foreach ($sub_category as $sub_cat )
        <li class="child">
            <h5 class="parent">{{ $sub_cat->title }}</h5>
            @if($sub_cat->parent_id != null)
                <a href="/admin/category/edit?cat={{ $sub_cat->id }}" class="label label-info">ویرایش</a>
                <a href="/admin/category/delete?cat={{ $sub_cat->id  }}" class="label label-danger">حذف</a>
                <a href="/admin/category/detachParent?cat={{ $sub_cat->id  }}"
                   class="label label-warning">حذف از والد </a>
            @else
                <a href="/admin/category/edit?cat={{ $sub_cat->id }}" class="label label-info">ویرایش</a>
                <a href="/admin/category/delete?cat={{ $sub_cat->id  }}" class="label label-danger">حذف</a>
            @endif
            @if (count($sub_cat->subCategory))
                @include('admin.category_management.sub_category_index',
                    ['sub_category'=>$sub_cat->subCategory])
            @endif
        </li>
    @endforeach
</ul>

