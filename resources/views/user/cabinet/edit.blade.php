@extends('admin.layout')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Edit user profile</h5>
                  <div class="ibox-content">
                  @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="row"> 
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">                        
                        <div class="ibox-content">
                            <form class="form-horizontal" action="/user/update" method="POST"> 
                                @csrf()
                                @method('PUT')                    
                                <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="text" placeholder="Name" name="name" class="form-control" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" placeholder="Email" name="email" class="form-control" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-sm btn-white" type="submit">Edit profile</button>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal" action="/user/updatePhoto" enctype="multipart/form-data" method="POST"> 
                                @csrf()
                                <div class="form-group"><label class="col-lg-2 control-label">Photo</label>
                                    <div class="col-lg-10"><img src="/storage/uploads/{{$user->photo}}" width="200" alt="user photo"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">New Photo</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-sm btn-white" type="submit">Change photo profile</button>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal" action="/user/changePassword" method="POST"> 
                                @csrf()
                                @method('PUT')
                                <div class="form-group"><label class="col-lg-2 control-label">New Password</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="New Password" name="password" class="form-control" value="{{old('password')}}">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Confirm New Password</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="Confirm New Password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-sm btn-white" type="submit">Change password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>                
              </div>             
          </div>
      </div>
  </div>
@endsection