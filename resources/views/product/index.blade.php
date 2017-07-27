@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Productos
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
        <h2>Productos</h2> 
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
                <th data-field="stock">Stock</th>
                <th data-field="price">Precio (S/.)</th>
                <th data-field="offer">Oferta (S/.)</th>
                <th class="td-btn" data-field="production"></th>
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
      <button class="btn-floating green" data-target="ModalInsertProduct">
        <i class="material-icons">add</i>
      </button>
    </li>
    <!-- EndButtonAdd --> 
  </ul>
  <!-- EndOptionsFloatingButton --> 
</div>
<!-- FloatingButton -->

<!-- ModalInsertProduct -->
<div id="ModalInsertProduct" class="modal">
  <div class="modal-content">
    <h4>Agregar producto</h4>
    <div class="row">
      <form id="InsertProductForm" class="col s12" enctype="multipart/form-data"> 
        <div class="input-field col s12">
          <input id="ip_fullname" name="fullname" type="text" class="validate">
          <label for="ip_fullname">Nombre de Producto</label>
        </div>
        <input type="hidden" name="stock" value="0">
        <div class="input-field col s12">
          <input id="ip_price" name="price" type="text" class="validate">
          <label for="ip_price">Precio (S/.)</label>
        </div>
        <div class="input-field col s12">
          <input id="ip_offer" name="offer" type="text" class="validate" value="0.00">
          <label for="ip_offer">Oferta (S/.)</label>
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
<!-- EndModalInsertProduct -->

<!-- ModalUpdateProduct -->
<div id="ModalUpdateProduct" class="modal">
  <div class="modal-content">
    <h4>Modificar producto</h4>
    <div class="row">
      <form id="UpdateProductForm" class="col s12" enctype="multipart/form-data">
      <input type="hidden" id="up_id" name="id">
        <div class="input-field col s12">
          <input id="up_fullname" name="fullname" placeholder="Nombre de Producto" type="text" class="validate">
          <label for="up_fullname" class="active">Nombre de Producto</label>
        </div>
        <div class="input-field col s12">
          <input id="up_price" name="price" placeholder="Precio (S/.)" type="text" class="validate">
          <label for="up_price" class="active">Precio (S/.)</label>
        </div>
        <div class="input-field col s12">
          <input id="up_offer" name="offer" placeholder="Oferta (S/.)" type="text" class="validate">
          <label for="up_offer" class="active">Oferta (S/.)</label>
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
<!-- EndModalUpdateProduct -->

<!-- ModalDeleteProduct -->
<div id="ModalDeleteProduct" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea eliminar producto</h4>
    <p>¿Esta seguro que desea eliminar a <b id="dp_fullname"></b>?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteProductForm" method="POST" enctype="multipart/form-data">
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
<!-- EndModalDeleteProduct -->

<!-- ModalProductionProduct -->
<div id="ModalProductionProduct" class="modal indigo darken-4 white-text">
  <div class="modal-content">
    <h4>Desea programar producción</h4>
    <p>¿Esta seguro que desea programar producción d <b id="pp_fullname"></b>?</p>
  </div>
  <div class="modal-footer indigo darken-3">
    <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
      Cancelar
    </button>
    <a id="linkProductionProduct" class="modal-action modal-close waves-effect btn-flat white-text">
      Aceptar
    </a>
  </div>
</div>
<!-- EndModalProductionProduct -->
@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    result();
    pages();
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
            <td>' + result[i].price + '</td>\
            <td>' + result[i].offer + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo" title="Programar" onclick="modalProductionProduct(\'' + result[i].id + '\')">\
                <i class="material-icons">swap_vertical_circle</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateProduct(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteProduct(\'' + result[i].id + '\')">\
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
      url: "{{ url('/api/product/getProductPage') }}",
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

  function modalDeleteProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/product/getProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#dp_fullname').html(result[0].fullname);
        $('#dp_id').val(result[0].id);
        $('#ModalDeleteProduct').modal('open');
      }
    });
  }

  function modalUpdateProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/product/getProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#up_id').val(result[0].id);
        $('#up_fullname').val(result[0].fullname);
        $('#up_price').val(result[0].price);
        $('#up_offer').val(result[0].offer);
        $('#ModalUpdateProduct').modal('open');
      }
    });
  }

  $("#DeleteProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/product/deleteProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteProduct').modal('close');        
        force_search();
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

  //InsertStaffForm
  $("#InsertProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/product/insertProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertProduct').modal('close');        
        force_search();
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

  //UpdateProductForm
  $("#UpdateProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/product/updateProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateProduct').modal('close');        
        force_search();
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

  function modalProductionProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/product/getProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#pp_fullname').html(result[0].fullname);       
        $('#linkProductionProduct').attr('href', "{{ url('/product/production') }}/" + result[0].id);
        $('#ModalProductionProduct').modal('open');
      }
    });
  }
</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->