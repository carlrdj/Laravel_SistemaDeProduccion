@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Mantenimiento
@endsection
<!-- *********** ****** ***** EndTitle ***** ****** *********** -->
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
@section('container')

<ul id="tabs-swipe-demo" class="tabs">
  <li class="tab col s3">
	  <a href="#Position" class="active">
	  	Cargos
	  </a>
  </li>
  <li class="tab col s3">
    <a href="#raw-material">
      Material prima
    </a>
  </li>
  <li class="tab col s3">
    <a href="#production">
      Produccion
    </a>
  </li>
</ul>
<!-- Position -->
<div id="Position" class="col s12">
	<div class="container">
	  <!-- RowResult --> 
	  <div class="row">
	    <div class="col s12 m12 l12">
	      <!-- Title -->
	      <div class="col s12">
	        <h2>Cargo</h2> 
	      </div>
	      <!-- EndTitle -->
	      <!-- Search -->
	      <div class="input-field col s12 m9">
	        <i class="material-icons prefix">search</i>
	        <input id="searchPosition" type="text" class="validate" onkeyup="searchPosition()">
	        <label for="searchPosition">Buscar</label>
	      </div>
	      <div class="input-field col s12 m3">
	        <button class="col s12 waves-effect waves-light btn" onclick="force_searchPosition()">Buscar</button>
	      </div>
	      <!-- EndSearch -->
	      <!-- TableProduct -->
	      <div class="col s12 m12 l12">
	        <table class="highlight responsive-table">
	          <thead>
	            <tr>
	                <th data-field="position">Cargo</th>
	                <th class="td-btn" data-field="edit"></th>
	                <th class="td-btn" data-field="delete"></th>
	            </tr>
	          </thead>
	          <tbody id="resultPosition">
	          </tbody>
	        </table>     
	      </div>
	      <!-- EndTableProduct -->
	    </div>
	  </div>
	  <!-- EndRowResult -->
	  <!-- Pagination -->
	  <div class="row">
	    <div class="center-align">
	      <ul class="pagination" id="paginationPosition">
	      </ul>
	    </div>
	  </div>
	  <!-- EndPagination -->
	</div>

	<!-- FloatingButton --> 
	<div class="fixed-action-btn">
	  <a class="btn-floating btn-large blue">
	    <i class="large material-icons">mode_edit</i>
	  </a>
	  <!-- OptionsFloatingButton --> 
	  <ul>
	    <!-- ButtonAdd --> 
	    <li>
	      <button class="btn-floating green" data-target="ModalInsertPosition">
	        <i class="material-icons">add</i>
	      </button>
	    </li>
	    <!-- EndButtonAdd --> 
	  </ul>
	  <!-- EndOptionsFloatingButton --> 
	</div>
	<!-- FloatingButton -->

	<!-- ModalInsertPosition -->
	<div id="ModalInsertPosition" class="modal">
	  <div class="modal-content">
	    <h4>Agregar cargo</h4>
	    <div class="row">
	      <form id="InsertPositionForm" class="col s12" enctype="multipart/form-data">
	        <div class="input-field col s12">
	          <input id="ip_position" name="position" placeholder="Cargo" type="text" class="validate">
	          <label for="ip_position">Cargo</label>
	        </div>
	        <div class="input-field col s12 center-align">
	          <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
	            Guardar
	          </button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	<!-- EndModalInsertPosition -->

	<!-- ModalUpdatePosition -->
	<div id="ModalUpdatePosition" class="modal">
	  <div class="modal-content">
	    <h4>Modificar cargo</h4>
	    <div class="row">
	      <form id="UpdatePositionForm" class="col s12" enctype="multipart/form-data">
	        <input type="hidden" name="id" id="up_id">
	        <div class="input-field col s12">
	          <input id="up_position" name="position" placeholder="Cargo" type="text" class="validate">
	          <label for="up_position" class="active">Cargo</label>
	        </div>
	        <div class="input-field col s12 center-align">
	          <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
	            Guardar
	          </button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	<!-- EndModalUpdatePosition -->

	<!-- ModalDeletePosition -->
	<div id="ModalDeletePosition" class="modal red darken-4 white-text">
	  <div class="modal-content">
	    <h4>Desea eliminar cargo</h4>
	    <p>¿Esta seguro que desea eliminar el cargo de <b id="dp_position"></b>?</p>
	  </div>
	  <div class="modal-footer red darken-3">
	    <form id="DeletePositionForm" method="POST" enctype="multipart/form-data">
	      <input id="dp_id" type="hidden" name="id">
	      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
	        Cancelar
	      </button>
	      <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
	        Aceptar
	      </button>
	    </form>
	  </div>
	</div>
	<!-- EndModalDeletePosition -->	
</div>
<!-- EndPosition -->







<div id="raw-material" class="col s12">
  <div class="container">
    <!-- RowResult --> 
    <div class="row">
      <div class="col s12 m12 l12">
        <!-- Title -->
        <div class="col s12">
          <h2>Materia prima</h2> 
        </div>
        <!-- EndTitle -->
        <!-- Search -->
        <div class="input-field col s12 m9">
          <i class="material-icons prefix">search</i>
          <input id="searchRawMaterial" type="text" class="validate" onkeyup="searchRawMaterial()">
          <label for="searchRawMaterial">Buscar</label>
        </div>
        <div class="input-field col s12 m3">
          <button class="col s12 waves-effect waves-light btn" onclick="force_searchRawMaterial()">Buscar</button>
        </div>
        <!-- EndSearch -->
        <!-- TableProduct -->
        <div class="col s12 m12 l12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                  <th data-field="fullname">Materia prima</th>
                  <th data-field="unit">Unidad</th>
                  <th data-field="quantity">Cantidad</th>
                  <th class="td-btn" data-field="view"></th>
                  <th class="td-btn" data-field="add"></th>
                  <th class="td-btn" data-field="edit"></th>
                  <th class="td-btn" data-field="delete"></th>
              </tr>
            </thead>
            <tbody id="resultRawMaterial">
            </tbody>
          </table>     
        </div>
        <!-- EndTableProduct -->
      </div>
    </div>
    <!-- EndRowResult -->
    <!-- Pagination -->
    <div class="row">
      <div class="center-align">
        <ul class="pagination" id="paginationRawMaterial">
        </ul>
      </div>
    </div>
    <!-- EndPagination -->
  </div>

  <!-- FloatingButton --> 
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large blue">
      <i class="large material-icons">mode_edit</i>
    </a>
    <!-- OptionsFloatingButton --> 
    <ul>
      <!-- ButtonAdd --> 
      <li>
        <button class="btn-floating green" data-target="ModalInsertRawMaterial">
          <i class="material-icons">add</i>
        </button>
      </li>
      <!-- EndButtonAdd --> 
    </ul>
    <!-- EndOptionsFloatingButton --> 
  </div>
  <!-- FloatingButton -->

  <!-- ModalInsertRawMaterial -->
  <div id="ModalInsertRawMaterial" class="modal">
    <div class="modal-content">
      <h4>Agregar materia prima</h4>
      <div class="row">
        <form id="InsertRawMaterialForm" class="col s12" enctype="multipart/form-data">
          <div class="input-field col s12">
            <input id="irm_fullname" name="fullname" type="text" class="validate">
            <label for="irm_fullname">Materia Prima</label>
          </div>
          <div class="input-field col s12">
            <select id="irm_unit" name="unit">
              <option value="" disabled>Selecione Unidad de medida</option>
              <!--<option value="T">Tonelada</option>-->
              <option value="Kg" selected>Kilogramo</option>
              <!--<option value="g">Gramo</option>
              <option value="mg">Miligramo</option>
              <option value="m&#179;">Metro Cubico</option>
              <option value="f&#179;">Pie Cubico</option>
              <option value="l">Litro</option>
              <option value="ml">Mililitro</option>-->
            </select>
            <label>Unidad de medida</label>
          </div>
          <div class="input-field col s12 center-align">
            <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EndModalInsertRawMaterial -->

  <!-- ModalUpdateRawMaterial -->
  <div id="ModalUpdateRawMaterial" class="modal">
    <div class="modal-content">
      <h4>Modificar materia prima</h4>
      <div class="row">
        <form id="UpdateRawMaterialForm" class="col s12" enctype="multipart/form-data">
          <input type="hidden" name="id" id="urm_id">
          <div class="input-field col s12">
            <input id="urm_fullname" name="fullname" placeholder="Materia Prima" type="text" class="validate">
            <label for="urm_fullname" class="active">Materia Prima</label>
          </div>
          <div class="input-field col s12">
            <select id="urm_unit" name="unit">
              <option value="" disabled selected>Selecione Unidad de medida</option>
              <!--<option value="T">Tonelada</option>-->
              <option value="Kg">Kilogramo</option>
              <!--<option value="g">Gramo</option>
              <option value="mg">Miligramo</option>
              <option value="m&#179;">Metro Cubico</option>
              <option value="f&#179;">Pie Cubico</option>
              <option value="l">Litro</option>
              <option value="ml">Mililitro</option>-->
            </select>
            <label>Unidad de medida</label>
          </div>
          <div class="input-field col s12 center-align">
            <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EndModalUpdateRawMaterial -->

  <!-- ModalDeleteRawMaterial -->
  <div id="ModalDeleteRawMaterial" class="modal red darken-4 white-text">
    <div class="modal-content">
      <h4>Desea eliminar materia prima</h4>
      <p>¿Esta seguro que desea eliminar <b id="drm_position"></b>?</p>
    </div>
    <div class="modal-footer red darken-3">
      <form id="DeleteRawMaterialForm" method="POST" enctype="multipart/form-data">
        <input id="drm_id" type="hidden" name="id">
        <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
          Cancelar
        </button>
        <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
          Aceptar
        </button>
      </form>
    </div>
  </div>
  <!-- EndModalDeleteRawMaterial --> 

  <!-- ModalViewLotRawMaterial -->
  <div id="ModalViewLotRawMaterial" class="modal bottom-sheet">
    <div class="modal-content">
      <div class="row">
        <div class="col s8 left-align"><h4 id="vlrm_title"></h4></div>
        <div class="col s4 right-align"><h4 id="vlrm_stock"></h4></div>
      </div>
      <ul class="collection" id="resultLotRawMaterial">
      </ul>
    </div>    
    <div class="modal-footer">
      <button id="vlrm_modal_add" class="modal-action waves-effect waves-green btn-flat light-green white-text">
        <i class="material-icons">add</i>
      </button>
    </div>
  </div>
  <!-- EndModalViewLotRawMaterial -->

  <!-- ModalInsertLotRawMaterial -->
  <div id="ModalInsertLotRawMaterial" class="modal">
    <div class="modal-content">
      <h4>Agregar lote de materia prima</h4>
      <div class="row">
        <form id="InsertLotRawMaterialForm" class="col s12" enctype="multipart/form-data">
          <input type="hidden" id="ilrm_raw_material_id" name="raw_material_id">
          <div class="input-field col s12">
            <input id="ilrm_quantity" name="quantity" type="number" step="any" class="validate">
            <label for="ilrm_quantity">Cantidad</label>
          </div>
          <div class="input-field col s12">
            <input id="ilrm_date_entry" name="date_entry" placeholder="Fecha de ingreso" type="date">
            <label for="ilrm_date_entry" class="active">Fecha de ingreso</label>
          </div>
          <div class="input-field col s12">
            <input id="ilrm_date_expiration" name="date_expiration" placeholder="Fecha de expiración" type="date">
            <label for="ilrm_date_expiration" class="active">Fecha de expiración</label>
          </div>
          <div class="input-field col s12 center-align">
            <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EndModalInsertRawMaterial -->

  <!-- ModalUpdateLotRawMaterial -->
  <div id="ModalUpdateLotRawMaterial" class="modal">
    <div class="modal-content">
      <h4>Agregar lote de materia prima</h4>
      <div class="row">
        <form id="UpdateLotRawMaterialForm" class="col s12" enctype="multipart/form-data">
          <input type="hidden" id="ulrm_id" name="id">
          <input type="hidden" id="ulrm_raw_material_id" name="raw_material_id">
          <input type="hidden" id="ulrm_before_quantity" name="before_quantity">
          <div class="input-field col s12">
            <input id="ulrm_quantity" name="quantity" type="number" step="any" class="validate">
            <label for="ulrm_quantity">Cantidad</label>
          </div>
          <div class="input-field col s12">
            <input id="ulrm_date_entry" name="date_entry" placeholder="Fecha de ingreso" type="date">
            <label for="ulrm_date_entry" class="active">Fecha de ingreso</label>
          </div>
          <div class="input-field col s12">
            <input id="ulrm_date_expiration" name="date_expiration" placeholder="Fecha de expiración" type="date">
            <label for="ulrm_date_expiration" class="active">Fecha de expiración</label>
          </div>
          <div class="input-field col s12 center-align">
            <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EndModalUpdateLotRawMaterial -->
</div>










<div id="production" class="col s12">
  <div class="container">
    <!-- RowResult --> 
    <div class="row">
      <div class="col s12 m12 l12">
        <!-- Title -->
        <div class="col s12">
          <h2>Productos</h2> 
        </div>
        <!-- EndTitle -->
        <!-- Search -->
        <div class="input-field col s12 m9">
          <i class="material-icons prefix">search</i>
          <input id="searchProduct" type="text" class="validate" onkeyup="searchProduct()">
          <label for="searchProduct">Buscar</label>
        </div>
        <div class="input-field col s12 m3">
          <button class="col s12 waves-effect waves-light btn" onclick="force_searchProduct()">Buscar</button>
        </div>
        <!-- EndSearch -->
        <!-- TableProduct -->
        <div class="col s12 m12 l12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                  <th data-field="fullname">Nombre Completo</th>
                  <th data-field="stock">Stock</th>
                  <th class="td-btn" data-field="config"></th>
              </tr>
            </thead>
            <tbody id="resultProduct">
            </tbody>
          </table>     
        </div>
        <!-- EndTableProduct -->
      </div>
    </div>
    <!-- EndRowResult -->
    <!-- Pagination -->
    <div class="row">
      <div class="center-align">
        <ul class="pagination" id="paginationProduct">
        </ul>
      </div>
    </div>
    <!-- EndPagination -->
  </div>

  <!-- ModalConfigProduct -->
  <div id="ModalConfigProduct" class="modal indigo darken-4 white-text">
    <div class="modal-content">
      <h4>Desea configurar producto</h4>
      <p>¿Esta seguro que desea configurar <b id="vp_fullname"></b>?</p>
    </div>
    <div class="modal-footer indigo darken-3">
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <a class="modal-action modal-close waves-effect btn-flat white-text" id="linkConfigProduct">
        Aceptar
      </a>
    </div>
  </div>
  <!-- EndModalConfigProduct --> 
</div>

<!-- EndModalDelete -->
@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    resultPosition();
    pagesPosition();
    resultRawMaterial();
    pagesRawMaterial();
    resultProduct();
    pagesProduct();
    $('select').material_select();
  });

  function searchPosition()
  {
    var search = $('#searchPosition').val();
    if (search.length > 1) {
      resultPosition(search);
      pagesPosition(search);
    }
  }

  function force_searchPosition(){
    var search = $('#searchPosition').val();
    resultPosition(search);
    pagesPosition(search);
  }

  function pagePosition(i_pag){
    var search = $('#searchPosition').val();
    resultPosition(search, i_pag);
  }

  function resultPosition(i_search, i_pag)
  {
    $.ajax({
      url: "{{ url('/api/position/getPositions') }}",
      type: 'GET',
      data:{
        search : i_search,
        page : i_pag,
      },
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <tr>\
            <td>\
              <a href="#" onclick="modalViewProduct(\'' + result[i].id + '\'); return false;">\
                ' + result[i].position + '\
              </a>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdatePosition(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeletePosition(\'' + result[i].id + '\')">\
                <i class="material-icons">delete</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#resultPosition').html(html);
      }
    });
  }

  function pagesPosition(i_search){
    $.ajax({
      url: "{{ url('/api/position/getPositionPage') }}",
      type: 'GET',
      data:{
        search : i_search,
      },
      success(result){  
        $('#paginationPosition').twbsPagination('destroy');
        $('#paginationPosition').twbsPagination({
          totalPages: result,
          visiblePages: 8,
          onPageClick: function (event, page) {
          }
        });
      }
    });
  }

  function modalDeletePosition(i_id) {
    $.ajax({
      url: "{{ url('/api/position/getPosition') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#dp_position').html(result[0].position);
        $('#dp_id').val(result[0].id);
        $('#ModalDeletePosition').modal('open');
      }
    });
  }

  function modalUpdatePosition(i_id) {
    $.ajax({
      url: "{{ url('/api/position/getPosition') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#up_id').val(result[0].id);
        $('#up_position').val(result[0].position);
        $('#ModalUpdatePosition').modal('open');
      }
    });
  }

  $("#DeletePositionForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/position/deletePosition') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeletePosition').modal('close');        
        force_searchPosition();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#dp_'+message).focus();
        });
      }      
    });
  });

  $("#InsertPositionForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/position/insertPosition') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertPosition').modal('close');        
        force_searchPosition();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#ip_'+message).focus();
        });
      }      
    });
  });

  $("#UpdatePositionForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/position/updatePosition') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdatePosition').modal('close');        
        force_searchPosition();
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














function searchRawMaterial()
  {
    var search = $('#searchRawMaterial').val();
    if (search.length > 1) {
      resultRawMaterial(search);
      pagesRawMaterial(search);
    }
  }

  function force_searchRawMaterial(){
    var search = $('#searchRawMaterial').val();
    resultRawMaterial(search);
    pagesRawMaterial(search);
  }

  function pageRawMaterial(i_pag){
    var search = $('#searchRawMaterial').val();
    resultRawMaterial(search, i_pag);
  }

  function resultRawMaterial(i_search, i_pag)
  {
    $.ajax({
      url: "{{ url('/api/raw-material/getRawMaterials') }}",
      type: 'GET',
      data:{
        search : i_search,
        page : i_pag,
      },
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <tr>\
            <td>\
              <a href="#" onclick="modalViewProduct(\'' + result[i].id + '\'); return false;">\
                ' + result[i].fullname + '\
              </a>\
            </td>\
            <td>' + result[i].unit + '</td>\
            <td>' + result[i].quantity + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo" title="Ver lotes de materia prima" onclick="modalViewLotRawMaterial(\'' + result[i].id + '\')">\
                <i class="material-icons">visibility</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateRawMaterial(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteRawMaterial(\'' + result[i].id + '\')">\
                <i class="material-icons">delete</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#resultRawMaterial').html(html);
      }
    });
  }

  function pagesRawMaterial(i_search){
    $.ajax({
      url: "{{ url('/api/raw-material/getRawMaterialPage') }}",
      type: 'GET',
      data:{
        search : i_search,
      },
      success(result){  
        $('#paginationRawMaterial').twbsPagination('destroy');
        $('#paginationRawMaterial').twbsPagination({
          totalPages: result,
          visiblePages: 8,
          onPageClick: function (event, page) {
          }
        });
      }
    });
  }

  function modalDeleteRawMaterial(i_id) {
    $.ajax({
      url: "{{ url('/api/raw-material/getRawMaterial') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#drm_fullname').html(result[0].fullname);
        $('#drm_id').val(result[0].id);
        $('#ModalDeleteRawMaterial').modal('open');
      }
    });
  }

  function modalUpdateRawMaterial(i_id) {
    $.ajax({
      url: "{{ url('/api/raw-material/getRawMaterial') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#urm_id').val(result[0].id);
        $('#urm_fullname').val(result[0].fullname);
        $('#urm_unit').val(result[0].unit);
        $('select').material_select();
        $('#ModalUpdateRawMaterial').modal('open');
      }
    });
  }

  $("#DeleteRawMaterialForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/raw-material/deleteRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteRawMaterial').modal('close');        
        force_searchRawMaterial();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#drm_'+message).focus();
        });
      }      
    });
  });

  $("#InsertRawMaterialForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/raw-material/insertRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertRawMaterial').modal('close');        
        force_searchRawMaterial();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#irm_'+message).focus();
        });
      }      
    });
  });

  $("#UpdateRawMaterialForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/raw-material/updateRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateRawMaterial').modal('close');        
        force_searchRawMaterial();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#urm_'+message).focus();
        });
      }      
    });
  });


  function modalViewLotRawMaterial(i_id) {
    $.ajax({
      url: "{{ url('/api/raw-material/getRawMaterial') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#vlrm_title').html(result[0].fullname);
        $('#vlrm_stock').html('Cantidad: ' + result[0].quantity);

        $('#vlrm_modal_add').attr('onclick', 'modalInsertLotRawMaterial(' + result[0].id + ')');
        resultLotRawMaterial(i_id);
      }
    });
  }

  function resultLotRawMaterial(i_id){
    $.ajax({
      url: "{{ url('/api/lot-raw-material/getLotRawMaterials') }}/"+ i_id,
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <li class="collection-item avatar">\
            <i class="material-icons circle purple">whatshot</i>\
            <span class="title"><b>Cantidad : ' + result[i].quantity + '</b></span>\
            <p>Fecha de ingreso : ' + result[i].date_entry + '</p>\
            <p>Fecha de caducidad : ' + result[i].date_expiration + '</p>\
            <a href="#" class="secondary-content" onclick="modalUpdateLotRawMaterial(' + result[i].id + '); return false;">\
              <i class="material-icons">edit</i>\
            </a>\
          </li>';
        }
        $('#resultLotRawMaterial').html(html);
        $('#ModalViewLotRawMaterial').modal('open');
      }
    });
  }

  function modalInsertLotRawMaterial(i_id) {
    $('#ilrm_raw_material_id').val(i_id);
    $('#ModalInsertLotRawMaterial').modal('open');
  }

  function modalUpdateLotRawMaterial(i_id) {
    $.ajax({
      url: "{{ url('/api/lot-raw-material/getLotRawMaterial') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#ulrm_id').val(result[0].id);
        $('#ulrm_raw_material_id').val(result[0].raw_material_id);        
        $('#ulrm_before_quantity').val(result[0].quantity);
        $('#ulrm_quantity').val(result[0].quantity);
        $('#ulrm_date_entry').val(result[0].date_entry);
        $('#ulrm_date_expiration').val(result[0].date_expiration);
        $('#ModalUpdateLotRawMaterial').modal('open');
      }
    });
  }

  $("#InsertLotRawMaterialForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/lot-raw-material/insertLotRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertLotRawMaterial').modal('close');
        modalViewLotRawMaterial(msj['id']);    
        force_searchRawMaterial();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#ilrm_'+message).focus();
        });
      }      
    });
  });

  $("#UpdateLotRawMaterialForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/lot-raw-material/updateLotRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateLotRawMaterial').modal('close');
        modalViewLotRawMaterial(msj['id']);    
        force_searchRawMaterial();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#ulrm_'+message).focus();
        });
      }      
    });
  });














  function searchProduct()
  {
    var search = $('#searchProduct').val();
    if (search.length > 3) {
      resultProduct(search);
      pagesProduct(search);
    }
  }

  function force_searchProduct(){
    var search = $('#searchProduct').val();
    resultProduct(search);
    pagesProduct(search);
  }

  function pageProduct(i_pag){
    var search = $('#search').val();
    resultProduct(search, i_pag);
  }

  function resultProduct(i_search, i_pag)
  {
    $.ajax({
      url: "{{ url('/api/product/getProducts') }}",
      type: 'GET',
      data:{
        search : i_search,
        page : i_pag,
      },
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <tr>\
            <td>\
              <a href="#" onclick="modalViewProduct(\'' + result[i].id + '\'); return false;">\
                ' + result[i].fullname + '\
              </a>\
            </td>\
            <td>' + result[i].stock + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo" title="Configurar" onclick="modalConfigProduct(\'' + result[i].id + '\')">\
                <i class="material-icons">settings</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#resultProduct').html(html);
      }
    });
  }

  function pagesProduct(i_search){
    $.ajax({
      url: "{{ url('/api/product/getProductPage') }}",
      type: 'GET',
      data:{
        search : i_search,
      },
      success(result){  
        $('#paginationProduct').twbsPagination('destroy');
        $('#paginationProduct').twbsPagination({
          totalPages: result,
          visiblePages: 8,
          onPageClick: function (event, page) {
          }
        });
      }
    });
  }

  function modalConfigProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/product/getProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#vp_fullname').html(result[0].fullname);
        $('#linkConfigProduct').attr('href', "{{ url('/maintenance/product') }}/" + result[0].id);
        $('#ModalConfigProduct').modal('open');
      }
    });
  }
</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->