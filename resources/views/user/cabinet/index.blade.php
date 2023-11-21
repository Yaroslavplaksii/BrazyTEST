@extends('admin.layout')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>User profile</h5>
                  <div class="ibox-content">
                <div class="row"> 
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">                        
                        <div class="ibox-content">
                            <div class="form-horizontal">                               
                                <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-10"> <span>{{$user->name}}</span> 
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10"><span>{{$user->email}}</span></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Photo</label>
                                    <div class="col-lg-10"><img src="/storage/uploads/{{$user->photo}}" width="200" alt="user photo"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <a class="btn btn-sm btn-white" href="/user/edit">Edit profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="ibox float-e-margins">                        
                        <div class="ibox-content">
                            <div class="form-horizontal">                               
                            <form class="form-horizontal" action="/user/deleteProfile" method="POST"> 
                                @csrf()
                                @method('PUT')
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button onclick="return confirm('Do you wont to delete your profile?')" style="background-color: red" class="btn btn-sm btn-white" type="submit">Delete profile</button>
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
  </div>
@endsection