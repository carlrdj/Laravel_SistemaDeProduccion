@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Personal
@endsection
<!-- *********** ****** ***** EndTitle ***** ****** *********** -->
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
@section('container')
<div class="container">
  <!-- RowResult --> 
  <div class="row">
    <div class="col s12 m12 l12">
      <!-- Title -->
      <div class="col s12">
        <h2>Personal</h2> 
      </div>
      <!-- EndTitle -->
      <!-- Search -->
      <div class="input-field col s12 m9">
        <i class="material-icons prefix">search</i>
        <input id="search" type="text" class="validate" onkeyup="search()">
        <label for="search">Buscar</label>
      </div>
      <div class="input-field col s12 m3">
        <button class="col s12 waves-effect waves-light btn" onclick="force_search()">Buscar</button>
      </div>
      <!-- EndSearch -->
      <!-- TableProduct -->
      <div class="col s12 m12 l12">
        <table class="highlight responsive-table">
          <thead>
            <tr>
                <th data-field="fullname">Nombre completo</th>
                <th data-field="position">Cargo</th>
                <th data-field="email">Correo Electrónico</th>
                <th data-field="cell_phone_number">Celular</th>
                <th class="td-btn" data-field="edit"></th>
                <th class="td-btn" data-field="delete"></th>
            </tr>
          </thead>
          <tbody id="result">
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
      <ul class="pagination" id="pagination">
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
      <button class="btn-floating green" data-target="ModalInsertStaff">
        <i class="material-icons">add</i>
      </button>
    </li>
    <!-- EndButtonAdd --> 
  </ul>
  <!-- EndOptionsFloatingButton --> 
</div>
<!-- FloatingButton -->

<!-- ModalInsertStaff -->
<div id="ModalInsertStaff" class="modal">
  <div class="modal-content">
    <h4>Agregar personal</h4>
    <div class="row">
      <form id="InsertStaffForm" class="col s12" enctype="multipart/form-data">      
        <div class="input-field col s12">
          <select name="position_id" id="is_position_id">
          </select>
          <label>Selecione Cargo</label>
        </div>
        <div class="input-field col s12">
          <input id="is_fullname" name="fullname" type="text" class="validate">
          <label for="is_fullname">Nombre Completo</label>
        </div>
        <div class="input-field col s12">
          <input id="is_address" name="address" type="text" class="validate">
          <label for="is_address">Dirección</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="is_phone_number" name="phone_number" type="text" class="validate">
          <label for="is_phone_number">Teléfono</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="is_cell_phone_number" name="cell_phone_number" type="text" class="validate">
          <label for="is_cell_phone_number">Celular</label>
        </div>        
        <div class="input-field col s12">
          <input id="is_email" name="email" type="email" class="validate">
          <label for="is_email">Correo Electrónico</label>
        </div>
        <div class="input-field col s12">
          <select name="civil_status">
            <option value="" disabled selected>Selecione Estado Civil</option>
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
          </select>
          <label>Selecione Estado Civil</label>
        </div>
        <div class="input-field col s12">
          <input id="is_date" name="date" type="date" placeholder="Fecha de Nacimiento" class="datepicker">
          <label for="is_date" class="active">Fecha de Nacimiento</label>
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
<!-- EndModalInsertStaff -->

<!-- ModalUpdateStaff -->
<div id="ModalUpdateStaff" class="modal">
  <div class="modal-content">
    <h4>Modificar personal</h4>
    <div class="row">
      <form id="UpdateStaffForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" name="id" id="us_id" value="">
        <div class="input-field col s12">
          <select name="position_id" id="us_position_id">
          </select>
          <label>Selecione Cargo</label>
        </div>
        <div class="input-field col s12">
          <input id="us_fullname" name="fullname" placeholder="Nombre Completo" type="text" class="validate">
          <label for="us_fullname" class="active">Nombre Completo</label>
        </div>
        <div class="input-field col s12">
          <input id="us_address" name="address" placeholder="Dirección" type="text" class="validate">
          <label for="us_address" class="active">Dirección</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="us_phone_number" name="phone_number" placeholder="Teléfono" type="text" class="validate">
          <label for="us_phone_number" class="active">Teléfono</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="us_cell_phone_number" name="cell_phone_number" placeholder="Celular" type="text" class="validate">
          <label for="us_cell_phone_number" class="active">Celular</label>
        </div>        
        <div class="input-field col s12">
          <input id="us_email" name="email" placeholder="Correo Electrónico" type="email" class="validate">
          <label for="us_email" class="active">Correo Electrónico</label>
        </div>
        <div class="input-field col s12">
          <select name="civil_status" id="us_civil_status">
            <option value="" disabled selected>Selecione Estado Civil</option>
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
          </select>
          <label>Selecione Estado Civil</label>
        </div>
        <div class="input-field col s12">
          <input id="us_date" name="date" type="date" placeholder="Fecha de Nacimiento" class="datepicker">
          <label for="us_date" class="active">Fecha de Nacimiento</label>
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
<!-- EndModalUpdateStaff -->

<!-- ModalDelete -->
<div id="ModalDeleteStaff" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea eliminar personal</h4>
    <p>¿Esta seguro que desea eliminar a <b id="ds_fullname"></b>?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteStaffForm" method="POST" enctype="multipart/form-data">
      <input id="ds_id" type="hidden" name="id">
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
        Aceptar
      </button>
    </form>
  </div>
</div>
<!-- EndModalDelete -->
@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    result();
    pages();
    positions();
    $('select').material_select();
  });

  function search()
  {
    var search = $('#search').val();
    if (search.length > 3) {
      result(search);
      pages(search);
    }
  }

  function force_search(){
    var search = $('#search').val();
    result(search);
    pages(search);
  }

  function page(i_pag){
    var search = $('#search').val();
    result(search, i_pag);
  }

  function result(i_search, i_pag)
  {
    $.ajax({
      url: "{{ url('/api/staff/getStaffs') }}",
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
            <td>' + result[i].position + '</td>\
            <td>' + result[i].email + '</td>\
            <td>' + result[i].cell_phone_number + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateStaff(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteStaff(\'' + result[i].id + '\')">\
                <i class="material-icons">delete</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#result').html(html);
      }
    });
  }

  function pages(i_search){
    $.ajax({
      url: "{{ url('/api/staff/getStaffPage') }}",
      type: 'GET',
      data:{
        search : i_search,
      },
      success(result){  
        $('#pagination').twbsPagination('destroy');
        $('#pagination').twbsPagination({
          totalPages: result,
          visiblePages: 8,
          onPageClick: function (event, page) {
          }
        });
      }
    });
  }

  function modalDeleteStaff(i_id) {
    $.ajax({
      url: "{{ url('/api/staff/getStaff') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#ds_fullname').html(result[0].fullname);
        $('#ds_id').val(result[0].id);
        $('#ModalDeleteStaff').modal('open');
      }
    });
  }

  function modalUpdateStaff(i_id) {
    $.ajax({
      url: "{{ url('/api/staff/getStaff') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#us_id').val(result[0].id);
        positions(result[0].position_id);
        $('#us_fullname').val(result[0].fullname);
        $('#us_address').val(result[0].address);
        $('#us_phone_number').val(result[0].phone_number);
        $('#us_cell_phone_number').val(result[0].cell_phone_number);
        $('#us_email').val(result[0].email);
        $('#us_civil_status').val(result[0].civil_status);
        $('#us_date').val(result[0].date);
        $('#ModalUpdateStaff').modal('open');
      }
    });
  }

  $("#DeleteStaffForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/staff/deleteStaff') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteStaff').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#ds_'+message).focus();
        });
      }      
    });
  });

  //Positions
  function positions(i_id) {
    $.ajax({
      url: "{{ url('/api/position/getPositions') }}",
      success: function(result) {
        var html = '';
        var selected = '';
        html += '<option value="" disabled selected>Seleccione Cargo</option>';
        for (var i = 0; i < result.length; i++) {
          if(i_id == result[i].id){
            selected = 'selected';
          }
          html += '<option value="' + result[i].id + '" '+ selected +'>' + result[i].position + '</option>';  
          selected = '';        
        }
        $('#is_position_id').html(html);
        $('#us_position_id').html(html);
        $('select').material_select();
      }
    });
  }

  //InsertStaffForm
  $("#InsertStaffForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/staff/insertStaff') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertStaff').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#is_'+message).focus();
        });
      }      
    });
  });

  //UpdateStaffForm
  $("#UpdateStaffForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/staff/updateStaff') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateStaff').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#us_'+message).focus();
        });
      }      
    });
  });
</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->