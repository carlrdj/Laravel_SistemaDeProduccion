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
        <h2>Usuarios</h2> 
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
                <th data-field="username">Nickname</th>
                <th data-field="rol">Rol</th>
                <th data-field="email">Correo Electrónico</th>
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
      <button class="btn-floating green" data-target="ModalInsertUser">
        <i class="material-icons">add</i>
      </button>
    </li>
    <!-- EndButtonAdd --> 
  </ul>
  <!-- EndOptionsFloatingButton --> 
</div>
<!-- FloatingButton -->

<!-- ModalInsertUser -->
<div id="ModalInsertUser" class="modal">
  <div class="modal-content">
    <h4>Agregar usuario</h4>
    <div class="row">
      <form id="InsertUserForm" class="col s12" enctype="multipart/form-data">      
        <div class="input-field col s12">
          <select name="rol_id" id="iu_rol_id">
          </select>
          <label>Selecione Rol</label>
        </div>
        <div class="input-field col s12">
          <select name="staff_id" id="iu_staff_id" onchange="getStaff()">
          </select>
          <label>Selecione Personal</label>
        </div>
        <div class="input-field col s12">
          <input id="iu_fullname" name="fullname" placeholder="Nombre Completo" type="text" class="validate">
          <label for="iu_fullname" class="active">Nombre Completo</label>
        </div>
        <div class="input-field col s12">
          <input id="iu_username" name="username" type="text" class="validate">
          <label for="iu_username">Nickname</label>
        </div>            
        <div class="input-field col s12">
          <input id="iu_email" name="email" placeholder="Correo Electrónico" type="email" class="validate">
          <label for="iu_email" class="active">Correo Electrónico</label>
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
<!-- EndModalInsertUser -->

<!-- ModalUpdateUser -->
<div id="ModalUpdateUser" class="modal">
  <div class="modal-content">
    <h4>Modificar usuario</h4>
    <div class="row">
      <form id="UpdateUserForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" name="id" id="uu_id">    
        <div class="input-field col s12">
          <select name="rol_id" id="uu_rol_id">
          </select>
          <label>Selecione Rol</label>
        </div>
        <div class="input-field col s12">
          <input id="uu_fullname" name="fullname" placeholder="Nombre Completo" type="text" class="validate">
          <label for="uu_fullname" class="active">Nombre Completo</label>
        </div>
        <div class="input-field col s12">
          <input id="uu_username" name="username" placeholder="Nickname" type="text" class="validate">
          <label for="uu_username" class="active">Nickname</label>
        </div>            
        <div class="input-field col s12">
          <input id="uu_email" name="email" placeholder="Correo Electrónico" type="email" class="validate">
          <label for="uu_email" class="active">Correo Electrónico</label>
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
<!-- EndModalUpdateUser -->

<!-- ModalDeleteUser -->
<div id="ModalDeleteUser" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea eliminar usuario</h4>
    <p>¿Esta seguro que desea eliminar a <b id="du_fullname"></b>?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteUserForm" method="POST" enctype="multipart/form-data">
      <input id="du_id" type="hidden" name="id">
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
    roles();
    staffs();
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
      url: "{{ url('/api/user/getUsers') }}",
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
            <td>' + result[i].username + '</td>\
            <td>' + result[i].rol + '</td>\
            <td>' + result[i].email + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateUser(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteUser(\'' + result[i].id + '\')">\
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
      url: "{{ url('/api/user/getUserPage') }}",
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

  function modalDeleteUser(i_id) {
    $.ajax({
      url: "{{ url('/api/user/getUser') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#du_fullname').html(result[0].fullname);
        $('#du_id').val(result[0].id);
        $('#ModalDeleteUser').modal('open');
      }
    });
  }

  function modalUpdateUser(i_id) {
    $.ajax({
      url: "{{ url('/api/user/getUser') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#uu_id').val(result[0].id);
        roles(result[0].rol_id);
        $('#uu_fullname').val(result[0].fullname);
        $('#uu_username').val(result[0].username);
        $('#uu_email').val(result[0].email);
        $('#ModalUpdateUser').modal('open');
      }
    });
  }

  $("#DeleteUserForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/user/deleteUser') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteUser').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#du_'+message).focus();
        });
      }      
    });
  });

  //Roles
  function roles(i_id) {
    $.ajax({
      url: "{{ url('/api/rol/getRoles') }}",
      success: function(result) {
        var html = '';
        var selected = '';
        html += '<option value="" disabled selected>Seleccione Rol</option>';
        for (var i = 0; i < result.length; i++) {
          if(i_id == result[i].id){
            selected = 'selected';
          }
          html += '<option value="' + result[i].id + '" '+ selected +'>' + result[i].rol + '</option>';  
          selected = '';        
        }
        $('#iu_rol_id').html(html);
        $('#uu_rol_id').html(html);
        $('select').material_select();
      }
    });
  }

  //Staffs
  function staffs() {
    $.ajax({
      url: "{{ url('/api/user/getStaffWithoutUser') }}",
      success: function(result) {
        var html = '';
        var selected = '';
        html += '<option value="" disabled selected>Seleccione Personal</option>';
        for (var i = 0; i < result.length; i++) {
          html += '<option value="' + result[i].id + '">' + result[i].fullname + '</option>';   
        }
        $('#iu_staff_id').html(html);
        $('select').material_select();
      }
    });
  }

  //getStaff
  function getStaff() {
    $.ajax({
      url: "{{ url('/api/staff/getStaff') }}/" + $('#iu_staff_id').val(),
      type: 'GET',
      success(result){
        $('#iu_fullname').val(result[0].fullname);
        $('#iu_email').val(result[0].email);
      }
    });
  }

  //InsertUserForm
  $("#InsertUserForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/user/insertUser') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertUser').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#iu_'+message).focus();
        });
      }      
    });
  });


  //UpdateStaffForm
  $("#UpdateUserForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/user/updateUser') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateUser').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#uu_'+message).focus();
        });
      }      
    });
  });
</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->