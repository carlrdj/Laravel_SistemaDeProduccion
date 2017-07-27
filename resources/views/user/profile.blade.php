@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Container ***** ****** *********** -->
@section('container')
<div class="container">
  <!-- RowForm --> 
  <div class="row">
  	<!-- SideRight -->
    <div class="col s12 m9 l10">
    	<!-- Title -->
    	<div class="col s12">
    		<h2>Editar producto</h2>	
    	</div>
    	<!-- EndTitle -->
    	<!-- ViewImage -->
    	<div class="col s12 center-align">
    		<img id="vp_image" class="col s12 m6 push-m3 l4 push-l4">
    	</div>
    	<!-- EndViewImage -->
    	<!-- Form -->
    	<form id="UpdateProfileForm" class="col s12" enctype="multipart/form-data">
	      <input id="up_id" name="id" type="hidden" value="0">	
	      <div class="row">
					<div class="file-field input-field">
			      <div class="btn blue darken-1">
			        <span>File</span>
			        <input id="up_image" name="image" type="file" accept="image/*">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
	        <div class="input-field col s12">
	          <input placeholder="Nombre Completo" id="up_fullname" name="fullname" type="text" class="active validate">
	          <label for="up_fullname" class="active">Nombre Completo</label>
	        </div>
	        <div class="input-field col s12">
	          <input placeholder="Nickname" id="up_username" name="username" type="text" class="active validate">
	          <label for="up_username" class="active">Nickname</label>
	        </div>
	        <div class="input-field col s12">
	          <input placeholder="Correo Electrónico" id="up_email" name="email" type="email" class="active validate">
	          <label for="up_email" class="active">Correo Electrónico</label>
	        </div>
	        <div class="input-field col s12 center-align">
	        	<button class="waves-effect waves-light blue darken-1 btn-large" type="submit">Guardar</button>
	        </div>
	      </div>
	    </form>
    	<!-- EndForm -->
    </div>
    <!-- EndSideRight-->
    <!-- SideLeft -->
		<div class="col hide-on-small-only m3 l2">
			<div class="toc-wrapper pin-top">
			  <div class="blue-text text-darken-2">
				  <b>Imagen</b>
				  <p class="blue-text">
				  	Las imagenes deben de tener las mismas dimensiones, tanto de alto como de ancho
				  </p>
			  </div>
			</div>
		</div>
		<!-- EndSideLeft -->
  </div>
  <!-- EndRowForm --> 
</div>
@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
  Productos
@endsection
<!-- *********** ****** ***** EndTitle ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">
  $(document).ready(function (){
  	getProduct({{ Auth::user()->id }});
  });

  function getProduct(i_id) {
  	$.ajax({
	  	type:'GET',
	    url:"{{ url('/api/user/getUser') }}/" + i_id,      
	    success:function(result){
	    	$('#up_id').val(result[0]['id']);
	    	$('#vp_image').attr('src', "{{ url('/images/user/200x200') }}/" + result[0]['avatar']);
	    	$('#vp_image').attr('title', result[0]['product']);	
	    	$('#up_fullname').val(result[0]['fullname']);
	    	$('#up_username').val(result[0]['username']);
	    	$('#up_email').val(result[0]['email']);
	    }
	  });
  }

	$('#UpdateProfileForm').submit(function (event) {
	  event.preventDefault();
	  var formData = new FormData(this);
	  $.ajax({
	  	type:'POST',
	    url:"{{ url('/user/updateProfile') }}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
	    data:formData,
	    cache:false,
	    contentType: false,
	    processData: false,
	    success:function(msj){
				Materialize.toast(msj['success'], 4000, 'light-green darken-1');
	    },
	    error: function(xhr,err) {
			  var msj = JSON.parse(xhr.responseText);
			  $.each(msj, function(message) {
					Materialize.toast(msj[message], 4000, 'red darken-2');
					$('#up_'+message).focus();
	      });
			}
		});
	});

</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->