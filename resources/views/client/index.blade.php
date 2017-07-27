@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Clientes
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
        <h2>Clientes</h2> 
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
              <th data-field="fullname">Nombre Completo</th>
              <th data-field="document_type">T. Doc</th>
              <th data-field="number">N° Doc</th>
              <th data-field="address">Dirección</th>
              <th data-field="email">Correo Electrónico</th>
              <th data-field="phone_number">Teléfono</th>
              <th data-field="cell_phone_number">Celular</th>
              <th class="td-btn" data-field="order"></th>
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
      <button class="btn-floating green" data-target="ModalInsertClient">
        <i class="material-icons">add</i>
      </button>
    </li>
    <!-- EndButtonAdd --> 
  </ul>
  <!-- EndOptionsFloatingButton --> 
</div>
<!-- FloatingButton -->

<!-- ModalInsertClient -->
<div id="ModalInsertClient" class="modal">
  <div class="modal-content">
    <h4>Agregar cliente</h4>
    <div class="row">
      <form id="InsertClientForm" class="col s12" enctype="multipart/form-data"> 
        <div class="input-field col s12">
          <input id="ic_fullname" name="fullname" type="text" class="validate">
          <label for="ic_fullname">Nombre Completo</label>
        </div>
        <div class="input-field col s12">
          <select name="document_type" id="ic_document_type">
            <option value="" disabled selected>Selecione el tipo de documento</option>
            <option value="RUC">RUC</option>
            <option value="DNI">DNI</option>
            <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
          </select>
          <label>Tipo de Documento</label>
        </div>
        <div class="input-field col s12">
          <input id="ic_number" name="number" type="number" class="validate">
          <label for="ic_number">N° Documento</label>
        </div>
        <div class="input-field col s12">
          <input id="ic_address" name="address" type="text" class="validate">
          <label for="ic_address">Dirección</label>
        </div>
        <div class="input-field col s12">
          <input id="ic_email" name="email" type="email" class="validate">
          <label for="ic_email">Correo Electrónico</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="ic_phone_number" name="phone_number" type="text" class="validate">
          <label for="ic_phone_number">Teléfono</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="ic_cell_phone_number" name="cell_phone_number" type="text" class="validate">
          <label for="ic_cell_phone_number">Celular</label>
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
<!-- EndModalInsertClient -->

<!-- ModalUpdateClient -->
<div id="ModalUpdateClient" class="modal">
  <div class="modal-content">
    <h4>Modificar cliente</h4>
    <div class="row">
      <form id="UpdateClientForm" class="col s12" enctype="multipart/form-data">
      <input type="hidden" id="uc_id" name="id">
        <div class="input-field col s12">
          <input id="uc_fullname" name="fullname" placeholder="Nombre Completo" type="text" class="validate">
          <label for="uc_fullname" class="active">Nombre Completo</label>
        </div>
        <div class="input-field col s12">
          <select name="document_type" id="uc_document_type">
            <option value="" disabled selected>Selecione el tipo de documento</option>
            <option value="RUC">RUC</option>
            <option value="DNI">DNI</option>
            <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
          </select>
          <label>Tipo de Documento</label>
        </div>
        <div class="input-field col s12">
          <input id="uc_number" name="number" placeholder="N° Documento" type="number" class="validate">
          <label for="uc_number" class="active">N° Documento</label>
        </div>
        <div class="input-field col s12">
          <input id="uc_address" name="address" placeholder="Dirección" type="text" class="validate">
          <label for="uc_address" class="active">Dirección</label>
        </div>
        <div class="input-field col s12">
          <input id="uc_email" name="email" placeholder="Correo Electrónico" type="email" class="validate">
          <label for="uc_email" class="active">Correo Electrónico</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="uc_phone_number" name="phone_number" placeholder="Teléfono" type="text" class="validate">
          <label for="uc_phone_number" class="active">Teléfono</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="uc_cell_phone_number" name="cell_phone_number" placeholder="Celular" type="text" class="validate">
          <label for="uc_cell_phone_number" class="active">Celular</label>
        </div>
        <div class="input-field col s12 center-align">
          <button class="button-modal-save modal-action waves-effect btn btn-large blue darken-1 white-text" type="submit">
            Guardar
          </button>
        </div>
      </form>
      </form>
    </div>
  </div>
</div>
<!-- EndModalUpdateClient -->

<!-- ModalDeleteClient -->
<div id="ModalDeleteClient" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea eliminar cliente</h4>
    <p>¿Esta seguro que desea eliminar a <b id="dc_fullname"></b>?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteClientForm" method="POST" enctype="multipart/form-data">
      <input id="dc_id" type="hidden" name="id">
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
        Aceptar
      </button>
    </form>
  </div>
</div>
<!-- EndModalDeleteClient -->



<!-- ModalOrderClient -->
<div id="ModalOrderClient" class="modal indigo darken-4 white-text">
  <div class="modal-content">
    <h4>Desea solicitar pedido a cliente</h4>
    <p>¿Esta seguro que desea solicitar pedido para <b id="oc_fullname"></b>?</p>
  </div>
  <div class="modal-footer indigo darken-3">
    <input id="dc_id" type="hidden" name="id">
    <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
      Cancelar
    </button>
    <a id="linkOrderClient" class="modal-action modal-close waves-effect btn-flat white-text">
      Aceptar
    </a>
  </div>
</div>
<!-- EndModalOrderClient -->
@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    result();
    pages();
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
      url: "{{ url('/api/client/getClients') }}",
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
            <td>' + result[i].document_type + '</td>\
            <td>' + result[i].number + '</td>\
            <td>' + result[i].address + '</td>\
            <td>' + result[i].email + '</td>\
            <td>' + result[i].phone_number + '</td>\
            <td>' + result[i].cell_phone_number + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo" title="Pedidos" onclick="modalOrderClient(\'' + result[i].id + '\')">\
                <i class="material-icons">add_shopping_cart</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateClient(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteClient(\'' + result[i].id + '\')">\
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
      url: "{{ url('/api/client/getClientPage') }}",
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

  function modalDeleteClient(i_id) {
    $.ajax({
      url: "{{ url('/api/client/getClient') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#dc_fullname').html(result[0].fullname);
        $('#dc_id').val(result[0].id);
        $('#ModalDeleteClient').modal('open');
      }
    });
  }

  function modalUpdateClient(i_id) {
    $.ajax({
      url: "{{ url('/api/client/getClient') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#uc_id').val(result[0].id);
        $('#uc_fullname').val(result[0].fullname);
        $('#uc_document_type').val(result[0].document_type);
        $('#uc_number').val(result[0].number);
        $('#uc_address').val(result[0].address);
        $('#uc_email').val(result[0].email);
        $('#uc_phone_number').val(result[0].phone_number);
        $('#uc_cell_phone_number').val(result[0].cell_phone_number);
        $('#ModalUpdateClient').modal('open');
        $('select').material_select();
      }
    });
  }

  $("#DeleteClientForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/client/deleteClient') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteClient').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#dc_'+message).focus();
        });
      }      
    });
  });  

  //InsertStaffForm
  $("#InsertClientForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/client/insertClient') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertClient').modal('close');        
        force_search();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#ic_'+message).focus();
        });
      }      
    });
  });

  //UpdateClientForm
  $("#UpdateClientForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/client/updateClient') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateClient').modal('close');        
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

  function modalOrderClient(i_id){
    $.ajax({
      url: "{{ url('/api/client/getClient') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#oc_fullname').html(result[0].fullname);
        $('#linkOrderClient').attr('href', "{{url('/client/order')}}/"+result[0].id);
        $('#ModalOrderClient').modal('open');        
      }
    });
  }
</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->