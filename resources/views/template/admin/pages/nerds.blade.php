 @extends('template/admin/layout/master')
 @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Users</a></li>
        
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SNo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Nerd Level</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($nerds as $key => $value)
                <tr>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->name }} </td>
                  <td>{{ $value->email }}</td>
                  <td>@if ($value->nerd_level==1) First level @elseif ($value->nerd_level==2) Second Level @endif</td>
                  <td><!-- <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . Crypt::encrypt($value->id)) }}"></a> -->
                  <button type="button" class="btn btn-small btn-success" data-toggle="modal" data-target="#myModal" onclick="showModal({{$value}})"><i class="fa fa-eye"></i></button>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info " href="{{ URL::to('edit/' . Crypt::encrypt($value->id) ) }}"><i class="fa fa-edit"></i></a></td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- show view model-->
   @extends('template/admin/pages/showNerds')
</div>

<script>
 /**
  *@method:showModal
  *@param:data
  *@author:mukul jain
  */
  function showModal(data){
      $('#username').text(data.name);
      $('#email').text(data.email);
      if(data.nerd_level==1){
        var val="First Level";
      }else if(data.nerd_level==2){
        var val="Second Level";
      }else{
        var val="NA";
      }
      $('#level').text(val);
  }
</script>
@endsection