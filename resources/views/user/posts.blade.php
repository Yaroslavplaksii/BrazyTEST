@extends('user.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Posts list</h2>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active"><strong>Posts list</strong></li>
        </ol>
    </div>
</div>
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-content">              
                  <table class="footable table table-stripped toggle-arrow-tiny">
                      <thead>
                      <tr>
                          <th data-toggle="true">#</th>
                          <th>Post Name</th>
                          <th>Image</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(isset($posts))
                        @foreach($posts as $post)
                        <tr>
                            <td></td>
                            <td>{{$post->title}}</td> 
                            <td><img src="{{$post->image}}" width="200" alt="image"></td>
                        </tr>
                        @endforeach
                      @endif
                      @empty($posts)
                      <tr>
                        <td colspan="11">No data</td>
                      </tr>
                      @endempty
                      </tbody>
                      <tfoot>
                      <tr>
                          <td colspan="5">
                              <ul class="pagination pull-right"></ul>
                          </td>
                      </tr>
                      </tfoot>
                  </table>
                  <div>{{$posts->links()}}</div>
              </div>
          </div>
      </div>
  </div>
  
@endsection