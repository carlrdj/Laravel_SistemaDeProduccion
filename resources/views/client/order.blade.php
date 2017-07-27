@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Pedidos
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
        <h2 id="vc_fullname"></h2> 
      </div>
      <!-- EndTitle -->
      <!-- TableProduct -->
      <div class="col s12 m12 l12">
        <table class="highlight responsive-table">
          <thead>
            <tr>
              <th data-field="priority">Prioridad</th>
              <th data-field="date_delivery_estimated">Fecha de entrega</th>
              <th data-field="time_delivery_estimated">Hora de entrega</th>
              <th data-field="total_amount">Monto total</th>
              <th class="td-btn" data-field="vieworder"></th>
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
      <button class="btn-floating green" data-target="ModalInsertOrder">
        <i class="material-icons">add</i>
      </button>
    </li>
    <!-- EndButtonAdd --> 
  </ul>
  <!-- EndOptionsFloatingButton --> 
</div>
<!-- FloatingButton -->

<!-- ModalInsertOrder -->
<div id="ModalInsertOrder" class="modal">
  <div class="modal-content">
    <h4>Agregar pedido</h4>
    <div class="row">
      <form id="InsertOrderForm" class="col s12" enctype="multipart/form-data"> 
        <input type="hidden" name="client_id" value="{{$id}}">
        <div class="input-field col s12">
          <select name="priority" id="io_priority">
            <option value="" disabled selected>Selecione el prioridad</option>
            <option value="Normal">Normal</option>
            <option value="Alta">Alta</option>
          </select>
          <label>Selecione el prioridad</label>
        </div>
        <div class="input-field col s12">
          <input id="io_date_delivery_estimated" name="date_delivery_estimated" placeholder="Fecha de entrega" type="date" class="validate">
          <label for="io_date_delivery_estimated" class="active">Fecha de entrega</label>
        </div>
        <div class="input-field col s12">
          <input id="io_time_delivery_estimated" name="time_delivery_estimated" placeholder="Hora de entrega" type="time" class="validate">
          <label for="io_time_delivery_estimated" class="active">Hora de entrega</label>
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
<!-- EndModalInsertOrder -->

<!-- ModalUpdateOrder -->
<div id="ModalUpdateOrder" class="modal">
  <div class="modal-content">
    <h4>Modificar pedido</h4>
    <div class="row">
      <form id="UpdateOrderForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" id="uo_id" name="id">
        <div class="input-field col s12">
          <select name="priority" id="uo_priority">
            <option value="" disabled selected>Selecione el prioridad</option>
            <option value="Normal" selected>Normal</option>
            <option value="Alta">Alta</option>
          </select>
          <label>Selecione el prioridad</label>
        </div>
        <div class="input-field col s12">
          <input id="uo_date_delivery_estimated" name="date_delivery_estimated" placeholder="Fecha de entrega" type="date" class="validate">
          <label for="uo_date_delivery_estimated" class="active">Fecha de entrega</label>
        </div>
        <div class="input-field col s12">
          <input id="uo_time_delivery_estimated" name="time_delivery_estimated" placeholder="Hora de entrega" type="time" class="validate">
          <label for="uo_time_delivery_estimated" class="active">Hora de entrega</label>
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
<!-- EndModalUpdateOrder -->

<!-- ModalDeleteOrder -->
<div id="ModalDeleteOrder" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea eliminar pedido</h4>
    <p>¿Esta seguro que desea pedido?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteOrderForm" method="POST" enctype="multipart/form-data">
      <input id="do_id" type="hidden" name="id">
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
        Aceptar
      </button>
    </form>
  </div>
</div>
<!-- EndModalDeleteOrder -->





<!-- ModalViewOrder -->
<div id="ModalViewOrder" class="modal bottom-sheet">
  <div class="modal-content">
    <h4>Productos solicitados</h4>
    <ul class="collection" id="resultViewOrder">
    </ul>
  </div>
  <div class="modal-footer">
    <button id="modal_add_detail_order_product" class="modal-action waves-effect waves-green btn-flat light-green white-text">
      <i class="material-icons">add</i>
    </button>
  </div>
</div>
<!-- EndModalViewOrder -->


<!-- modalInsertDetailOrderProduct -->
<div id="ModalInsertDetailOrderProduct" class="modal">
  <div class="modal-content">
    <h4>Añadir producto a pedido</h4>
    <div class="row">
      <form id="InsertDetailOrderProductForm" class="col s12" enctype="multipart/form-data"> 
        <input type="hidden" id="idop_order_id" name="order_id">
        <div class="input-field col s12">
          <select id="idop_product_id" name="product_id">
          </select>
          <label>Selecione Producto</label>
        </div>
        <div class="input-field col s12">
          <select name="lot_product_id" id="idop_lot_product_id">
          </select>
          <label>Selecione Lote</label>
        </div>
        <div class="input-field col s12">
          <input id="idop_quantity_order" name="quantity_order" placeholder="Cantidad" type="number" step="any" min="0" class="validate">
          <label for="idop_quantity_order" class="active">Cantidad</label>
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
<!-- EndmodalInsertDetailOrderProduct -->

<!-- ModalUpdateDetailOrderProduct -->
<div id="ModalUpdateDetailOrderProduct" class="modal">
  <div class="modal-content">
    <h4>Modificar pedido</h4>
    <div class="row">
      <form id="UpdateDetailOrderProductForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" id="udop_id" name="id">
        <input type="hidden" id="udop_order_id" name="order_id">
        <div class="input-field col s12">
          <select name="product_id" id="udop_product_id" disabled>
          </select>
          <label>Selecione Producto</label>
        </div>
        <div class="input-field col s12">
          <select name="lot_product_id" id="udop_lot_product_id" disabled>
          </select>
          <label>Selecione Lote</label>
        </div>
        <div class="input-field col s12">
          <input id="udop_quantity_order" name="quantity_order" placeholder="Cantidad" type="number" step="any" min="0" class="validate">
          <label for="udop_quantity_order" class="active">Cantidad</label>
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
<!-- EndModalUpdateDetailOrderProduct -->

<!-- ModalDeleteDetailOrderProduct -->
<div id="ModalDeleteDetailOrderProduct" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea retirar producto</h4>
    <p>¿Esta seguro que desea retirar producto <b id="ddop_fullname"></b>?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteDetailOrderProductForm" method="POST" enctype="multipart/form-data">
      <input id="ddop_id" type="hidden" name="id">
        <input type="hidden" id="ddop_order_id" name="order_id">
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
        Aceptar
      </button>
    </form>
  </div>
</div>
<!-- EndModalDeleteDetailOrderProduct -->

@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    viewOrder({{ $id }});
    result();
    $('select').material_select();
  });
  
  function viewOrder(i_id)
  {
    $.ajax({
      url: "{{ url('/api/client/getClient') }}/" + i_id,
      type: 'GET',
      success(result){
        $('#vc_fullname').html(result[0].fullname);
      }
    });
  }

  function result()
  {
    $.ajax({
      url: "{{ url('/api/order/getOrders') }}/"+{{$id}},
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <tr>\
            <td>' + result[i].priority + '</td>\
            <td>' + result[i].date_delivery_estimated + '</td>\
            <td>' + result[i].time_delivery_estimated + '</td>\
            <td>' + result[i].total_amount + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo" title="Pedidos" onclick="modalViewOrder(\'' + result[i].id + '\')">\
                <i class="material-icons">visibility</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateOrder(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteOrder(\'' + result[i].id + '\')">\
                <i class="material-icons">delete</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#result').html(html);
      }
    });
  }

  function modalDeleteOrder(i_id) {
    $.ajax({
      url: "{{ url('/api/order/getOrder') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#do_id').val(result[0].id);
        $('#ModalDeleteOrder').modal('open');
      }
    });
  }

  function modalUpdateOrder(i_id) {
    $.ajax({
      url: "{{ url('/api/order/getOrder') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#uo_id').val(result[0].id);
        $('#uo_client_id').val(result[0].client_id);
        $('#uo_priority').val(result[0].priority);
        $('#uo_date_delivery_estimated').val(result[0].date_delivery_estimated);
        $('#uo_time_delivery_estimated').val(result[0].time_delivery_estimated);
        $('#ModalUpdateOrder').modal('open');
        $('select').material_select();
      }
    });
  }

  $("#DeleteOrderForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/order/deleteOrder') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteOrder').modal('close');        
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#do_'+message).focus();
        });
      }      
    });
  });  

  $("#InsertOrderForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/order/insertOrder') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertOrder').modal('close');        
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#io_'+message).focus();
        });
      }      
    });
  });

  $("#UpdateOrderForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/order/updateOrder') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateOrder').modal('close');        
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#uo_'+message).focus();
        });
      }   
    });  
  });

  function modalViewOrder(i_id) {
    $.ajax({
      url: "{{ url('/api/detail-order-product/getDetailOrderProducts') }}/"+i_id,
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '<li class="collection-item avatar">';
          html += '<i class="pointer material-icons circle red" onclick="modalUpdateDetailOrderProduct('+result[i].id+', '+i_id+')">done</i>';
          html += '<span class="title pointer" onclick="modalUpdateDetailOrderProduct('+result[i].id+', '+i_id+')">'+result[i].fullname+'</span>';
          html += '<p class="pointer" onclick="modalUpdateDetailOrderProduct('+result[i].id+', '+i_id+')">Cantidad: '+result[i].quantity_order+'</p>';
          html += '<a href="#" class="secondary-content"><i class="material-icons" onclick="modalDeleteDetailOrderProduct('+result[i].id+', '+i_id+')">delete</i></a>';
          html += '</li>';      
        }
        $('#resultViewOrder').html(html);
        $('#modal_add_detail_order_product').attr('onclick', 'modalInsertDetailOrderProduct('+i_id+')');
        $('#ModalViewOrder').modal('open');
      }
    }); 
  }

  function modalInsertDetailOrderProduct(i_id) {
    products();
    $('#ModalInsertDetailOrderProduct').modal('open');
    $('#idop_order_id').val(i_id);
  }

  function products(i_id) {
    $.ajax({
      url: "{{ url('/api/product/getProducts') }}",
      success: function(result) {
        var html = '';
        var selected = '';
        html += '<option value="" disabled selected>Seleccione Producto</option>';
        for (var i = 0; i < result.length; i++) {
          if(i_id == result[i].id){
            selected = 'selected disabled';
          }
          html += '<option value="' + result[i].id + '" '+ selected +'>' + result[i].fullname + ' ('+result[i].stock+')</option>';  
          selected = '';        
        }
        $('#idop_product_id').html(html);
        $('#udop_product_id').html(html);
        $('select').material_select();
      }
    });
  }

  function lotproducts(i_id, i_product_id) {
    $.ajax({
      url: "{{ url('/api/lot-product/getLotProducts') }}/"+i_product_id,
      success: function(result) {
        var html = '';
        var selected = '';
        html += '<option value="" disabled selected>Seleccione Producto</option>';
        for (var i = 0; i < result.length; i++) {
          if(i_id == result[i].id){
            selected = 'selected disabled';
          }
          html += '<option value="' + result[i].id + '" '+ selected +'>' + result[i].quantity + '   ( producido :'+result[i].date_production+' )</option>';  
          selected = '';        
        }
        $('#idop_lot_product_id').html(html);
        $('#udop_lot_product_id').html(html);
        $('select').material_select();        
      }
    });
  }
  $('#idop_product_id').on('change', function() {
    lotproducts('', this.value);
  })

  $('#idop_lot_product_id').on('change', function() {
    $.ajax({
      url: "{{ url('/api/lot-product/getLotProduct') }}/"+this.value,
      success: function(result) { 
        $('#idop_quantity_order').attr('max',result[0].quantity);    
      }
    });
  })

  $('#udop_lot_product_id').on('change', function() {
    $.ajax({
      url: "{{ url('/api/lot-product/getLotProduct') }}/"+this.value,
      success: function(result) { 
        $('#idop_quantity_order').attr('max',result[0].quantity);    
      }
    });
  })


  function modalUpdateDetailOrderProduct(i_id, i_order_id) {
    $.ajax({
      url: "{{ url('/api/detail-order-product/getDetailOrderProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#udop_id').val(result[0].id);
        $('#udop_order_id').val(i_order_id);
        $('#udop_product_id').val(result[0].product_id);
        $('#udop_lot_product_id').val(result[0].lot_product_id);
        $('#udop_quantity_order').val(result[0].quantity_order);
        $('#ModalUpdateDetailOrderProduct').modal('open');
        products(result[0].product_id);
        lotproducts(result[0].lot_product_id, result[0].product_id);        
      }
    });
    /*Revisar*/ 
    /*
    *Numero maxhimo en el casillero de cantidad
    */  
  }


  function modalDeleteDetailOrderProduct(i_id, i_order_id) {
    $.ajax({
      url: "{{ url('/api/detail-order-product/getDetailOrderProduct') }}/"+i_id,
      type: 'GET',
      success(result){
        $('#ddop_id').val(result[0].id);
        $('#ddop_order_id').val(i_order_id);
        $('#ModalDeleteDetailOrderProduct').modal('open');
      }
    });
  }


  $("#DeleteDetailOrderProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/detail-order-product/deleteDetailOrderProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteOrder').modal('close'); 
        modalViewOrder(msj['id']);
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
        });
      }      
    });
  });  

  $("#InsertDetailOrderProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/detail-order-product/insertDetailOrderProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertDetailOrderProduct').modal('close');   
        modalViewOrder(msj['id']);
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#io_'+message).focus();
        });
      }      
    });
  });

  $("#UpdateDetailOrderProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/detail-order-product/updateDetailOrderProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');  
        $('#ModalUpdateDetailOrderProduct').modal('close');     
        modalViewOrder(msj['id']);
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#uo_'+message).focus();
        });
      }   
    });  
  });


</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->