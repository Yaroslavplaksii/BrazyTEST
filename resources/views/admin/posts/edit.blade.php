@extends('user.layout')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit post</h5>
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
                    <form action="/admin/posts/update/<?php echo $post->id;?>" method="POST">
                        @csrf()
                        @method('PUT')
                        <div class="form-group m-2"><label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{$post->title}}"> 
                            </div>
                         </div>
                         <div class="form-group"><label class="col-sm-2 control-label">Content</label>
                            <div class="col-sm-10">
                            <textarea name="content"  class="form-control">{{$post->content}}</textarea> 
                            </div>
                         </div>    
                         <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </form>
                    <form action="/admin/posts/newImage/<?php echo $post->id;?>" method="POST">
                        @csrf()
                        @method('PUT')
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Generate new image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection