@extends('layouts.app')
@section('content')

@extends('layouts.menu')
@section('container')
<div class="container">
  <!-- RowResult -->
  <div class="row">
    <div class="col s12 m12 l12">
      <!-- Title -->
      <div class="col s12">
        <h2>Pedidos activos</h2> 
      </div>
      <!-- EndTitle -->
      <!-- TableProduct -->
      <div class="col s12 m12 l12">
        <table class="highlight responsive-table">
          <thead>
            <tr>
              <th data-field="fullname">Cliente</th>
              <th data-field="priority">Prioridad</th>
              <th data-field="date_delivery">Fecha de entrega</th>
              <th data-field="time_delivery">Hora de entrega</th>
              <th data-field="total_amount">Monto total</th>
              <th class="td-btn" data-field="finished"></th>
              <th class="td-btn" data-field="edit"></th>
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

  <!-- ModalViewOrder 
  <div id="ModalViewOrder" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="vc_fullname"></h4>
      <ul class="collection" id="ViewDetailOrderProduct">    
        
      </ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>-->
  <!-- EndModalViewOrder -->
  <!-- ModalDeleteUser -->
  <div id="ModalFinishedOrder" class="modal">
    <form id="FinishedOrderForm" method="POST" enctype="multipart/form-data">
      <input id="fo_id" type="hidden" name="id">
      <div class="modal-content">
        <h4>Pedido entregado</h4>
        <p>¿Esta seguro que desea registrar entrega?</p>
        <input type="date" name="date_delivery_real">
        <input type="time" name="time_delivery_real">
        <hr>
        <div>
          <ul class="collection" id="ViewDetailOrderProduct">
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect btn-flat" type="button">
          Cancelar
        </button>
        <button class="modal-action waves-effect btn-flat" type="submit">
          Aceptar
        </button>
      </div>
    </form>
  </div>
  <!-- EndModalDelete -->

  <!-- RowResult -->
  <div class="row">
    <div class="col s12 m12 l12">
      <!-- Title -->
      <div class="col s12">
        <h2>Produccion en curso</h2> 
      </div>
      <!-- EndTitle -->
      <!-- TableProduct -->
      <div class="col s12 m12 l12">
        <table class="highlight responsive-table">
          <thead>
            <tr>
              <th data-field="quantity_estimated">Cantidad</th>
              <th data-field="date_start">Inicio</th>
              <th data-field="product">Producto</th>
              <th class="td-btn" data-field="finished"></th>
            </tr>
          </thead>
          <tbody id="resultProduction">
          </tbody>
        </table>     
      </div>
      <!-- EndTableProduct -->
    </div>
  </div>
  <!-- EndRowResult -->
</div>
@endsection

@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    result();
    resultProduction();
    $('select').material_select();
  });
  
  function result()
  {
    $.ajax({
      url: "/api/order/toDeliver",
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <tr>\
            <td>' + result[i].fullname + '</td>\
            <td>' + result[i].priority + '</td>\
            <td>' + result[i].date_delivery_estimated + '</td>\
            <td>' + result[i].time_delivery_estimated + '</td>\
            <td>' + result[i].total_amount + '</td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo pulse" title="Pedidos" onclick="modalFinishedOrder(\'' + result[i].id + '\')">\
                <i class="material-icons">local_shipping</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <a href="{{url('/client/order')}}/'+result[i].client_id+'" class="btn-floating waves-effect waves-light amber" title="Editar pedido">\
                <i class="material-icons">edit</i>\
              </a>\
            </td>\
          </tr>';
        }
        $('#result').html(html);
      }
    });
  }

  function modalFinishedOrder(i_id) {
    $('#ModalFinishedOrder').modal('open');
    $('#fo_id').val(i_id);

    $.ajax({
      url: "/api/detail-order-product/getDetailOrderProducts/"+i_id,
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '<li class="collection-item avatar">';
          html += '<i class="material-icons circle red">business_center</i>';
          html += '<span class="title">Title</span>';
          html += '<p>Cantidad : '+ result[i].quantity_order +'</p>';
          html += '<div class="secondary-content"><input  id="op'+ result[i].id +'" type="number" onChange="updateOrderProducts('+ result[i].id +')" name="" min="0" max="'+ result[i].quantity_order +'" value="'+result[i].quantity_order+'"></div>';
          html += '</li>';
        }
        $('#ViewDetailOrderProduct').html(html);
      }
    });
  }

  function updateOrderProducts(i_id){
    var formData = new FormData();
    formData.append('id', i_id);
    formData.append('quantity_delivered', $('#op' + i_id).val());

    $.ajax({
      url:"{{ url('/order/updateDetailOrderProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        result();
      },
      error: function(xhr,err) {  
        console.log('Error');
      }  
    });
  }


  $("#FinishedOrderForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/order/finishedOrder') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalFinishedOrder').modal('close');
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


  function resultProduction()
  {
    $.ajax({
      url: "/api/production-product/toFinished",
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {    
          html += '\
          <tr>\
            <td>\
              <a href="#">\
                ' + result[i].quantity_estimated + '\
              </a>\
            </td>\
            <td>' + result[i].date_start + '</td>\
            <td class="td-btn">'+ result[i].fullname +'</td>\
            <td class="td-btn">\
              <a href="{{url('/product/production')}}/'+ result[i].product_id +'" class="btn-floating waves-effect waves-light blue pulse" title="Ir a producción de producto" >\
                <i class="material-icons">visibility</i>\
              </a>\
            </td>\
          </tr>';
        }
        $('#resultProduction').html(html);
      }
    });
  }
</script>
@endsection
