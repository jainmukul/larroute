 @extends('template/admin/layout/master')

 @section('content')
 <div class="content-wrapper">
  
  <section class="content-header">

      <h1>
       Profile
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
  </section>
 <section class="content">
       @include('flash')
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form  method="POST" action="{{ url('/userProfile') }}" enctype="multipart/form-data">
            
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="text" name="name" value="{{$users[0]->name}}" placeholder="Enter Username">
                    @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email address</label>
                 <input id="email" type="email" class="form-control" name="email" value="{{$users[0]->email}}" placeholder="Email">
                    @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file" id="file" onchange="readURL(this);">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token" >
                  <p class="help-block">Click here to upload profile image</p>
                </div>
                <img id="blah" src="{{asset('uploads/').'/'.$users[0]->image}}" class="thumbnail img-responsive" height="200px" width="200px" >
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
    </section>
</div>

<script>
/**
 *@script for show image
 */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
    $('#blah')
    .attr('src', e.target.result)
    .attr('class', 'thumbnail img-responsive')
    .width(200)
    .height(200);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

</script>
@endsection


