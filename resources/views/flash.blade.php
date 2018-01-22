@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    {{ $message }}
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               {{ $message }}
              </div>
@endif
@if ($message = Session::get('warning'))
 <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
   {{ $message }}
 </div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-info"></i> Alert!</h4>
	{{ $message }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" id="hide">×</button>	
	Please check the form below for errors
</div>
@endif
<script>
	setTimeout(function() {
            $('.alert').fadeOut('slow');
    }, 3000);

</script>