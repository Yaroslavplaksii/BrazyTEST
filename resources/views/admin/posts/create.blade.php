@extends('user.layout')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add new post</h5>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="ibox-content">
                <div class="row">
                    <form action="/admin/posts/add" method="post">
                        @csrf()
                        <div class="form-group m-2"><label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{old('title')}}"> 
                            </div>
                         </div>
                         <div class="form-group"><label class="col-sm-2 control-label">Content</label>
                            <div class="col-sm-10">
                            <textarea name="content" class="form-control">{{old('content')}}</textarea> 
                            </div>
                         </div>    
                         <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection