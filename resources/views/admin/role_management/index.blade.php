@extends('admin.include.master')
@section('page_title')
    نقش ها
@endsection
@section('main_content')
    <div class="container">

        <div class="row alert-messages-row">
            <div class="alert-messages">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success')  }}</strong>
                    </div>
                @endif
                    @if(session('error'))
                        <div class="alert alert-warning">
                            <strong>{{ session('error')  }}</strong>
                        </div>
                    @endif
            </div>
        </div>
        <div class="row add-role-row" style="height: auto">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <form action="/admin/role/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="role">نام نقش</label>
                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="role">
                        @error('name')
                        <div class="alert alert-warning fade-in">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">ذخیره</button>
                </form>
            </div>
        </div>
        <div class="row list-role-row" style="height:auto">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام نقش</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td><a href="/admin/role/edit/?role={{$role->id}}"  class="btn btn-info">ویرایش</a></td>
                        <td><a href="/admin/role/delete/?role={{$role->id}}" class="btn btn-danger">حذف</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
<script type="text/javascript">


</script>
