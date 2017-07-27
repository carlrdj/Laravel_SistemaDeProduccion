@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Programar producción de producto
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
        <h2 id="vp_fullname"></h2> 
      </div>
      <!-- EndTitle -->
      <!-- TableProductionProduct -->
      <div class="col s12 m12 l12">
        <table class="highlight responsive-table">
          <thead>
            <tr>
              <th data-field="quantity_estimated">Cantidad</th>
              <th data-field="date_start">Inicio</th>
              <th class="td-btn" data-field="finished"></th>
              <th class="td-btn" data-field="raw-material"></th>
              <th class="td-btn" data-field="edit"></th>
              <th class="td-btn" data-field="delete"></th>
            </tr>
          </thead>
          <tbody id="result">
          </tbody>
        </table>     
      </div>
      <!-- EndTableProductionProduct -->
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
      <button class="btn-floating green" data-target="ModalInsertProductionProduct">
        <i class="material-icons">add</i>
      </button>
    </li>
    <!-- EndButtonAdd --> 
  </ul>
  <!-- EndOptionsFloatingButton --> 
</div>
<!-- FloatingButton -->

<!-- ModalInsertProductionProduct -->
<div id="ModalInsertProductionProduct" class="modal">
  <div class="modal-content">
    <h4>Agregar producción</h4>
    <div class="row">
      <form id="InsertProductionProductForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" id="ipp_product_id" name="product_id" value="{{ $id }}">
        <div class="input-field col s12">
          <select name="quantity_estimated" id="ipp_quantity_estimated">
            <option value="" disabled selected>Selecione Cantidad</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="60">60</option>
            <option value="70">70</option>
            <option value="80">80</option>
            <option value="90">90</option>
            <option value="100">100</option>
          </select>
          <label>Selecione Cantidad</label>
        </div>
        <div class="input-field col s12">
          <input id="ipp_date_start" name="date_start" placeholder="Fecha de inicio" type="date" class="validate">
          <label for="ipp_date_start" class="active">Fecha de inicio</label>
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
<!-- EndModalInsertProductionProduct -->

<!-- ModalUpdateProductionProduct -->
<div id="ModalUpdateProductionProduct" class="modal">
  <div class="modal-content">
    <h4>Modificar producción</h4>
    <div class="row">
      <form id="UpdateProductionProductForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" id="upp_id" name="id">
        <div class="input-field col s12">
          <select name="quantity_estimated" id="upp_quantity_estimated">
            <option value="" disabled selected>Selecione Cantidad</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="60">60</option>
            <option value="70">70</option>
            <option value="80">80</option>
            <option value="90">90</option>
            <option value="100">100</option>
          </select>
          <label>Selecione Cantidad</label>
        </div>
        <div class="input-field col s12">
          <input id="upp_date_start" name="date_start" placeholder="Fecha de inicio" type="date" class="validate">
          <label for="upp_date_start" class="active">Fecha de inicio</label>
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
<!-- EndModalUpdateProductionProduct -->

<!-- ModalDeleteProductionProduct -->
<div id="ModalDeleteProductionProduct" class="modal red darken-4 white-text">
  <div class="modal-content">
    <h4>Desea eliminar producción</h4>
    <p>¿Esta seguro que desea eliminar producción?</p>
  </div>
  <div class="modal-footer red darken-3">
    <form id="DeleteProductionProductForm" method="POST" enctype="multipart/form-data">
      <input id="dpp_id" type="hidden" name="id">
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="submit">
        Aceptar
      </button>
    </form>
  </div>
</div>
<!-- EndModalDeleteProductionProduct -->


<!-- ModalFinishedProductionProduct -->
<div id="ModalFinishedProductionProduct" class="modal">
  <div class="modal-content">
    <h4>Finalizar producción</h4>
    <div class="row">
      <form id="FinishedProductionProductForm" class="col s12" enctype="multipart/form-data">
        <input type="hidden" id="fpp_product_id" name="product_id" value="{{ $id }}">
        <input type="hidden" id="fpp_id" name="id">        
        <div class="input-field col s12">
          <input id="fpp_quantity_estimated" name="quantity_estimated" placeholder="Cantidad estimada" type="text" class="validate" disabled>
          <label for="fpp_quantity_estimated" class="active">Cantidad estimada</label>
        </div>
        <div class="input-field col s12">
          <input id="fpp_date_start" name="date_start" placeholder="Fecha de inicio" type="date" class="validate" disabled>
          <label for="fpp_date_start" class="active">Fecha de finalización</label>
        </div>
        <div class="input-field col s12">
          <input id="fpp_quantity_real" name="quantity_real" placeholder="Cantidad producida" type="text" class="validate">
          <label for="fpp_quantity_real" class="active">Cantidad producida</label>
        </div>
        <div class="input-field col s12">
          <input id="fpp_date_end" name="date_end" placeholder="Fecha de finalización" type="date" class="validate">
          <label for="fpp_date_end" class="active">Fecha de finalización</label>
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
<!-- EndModalFinishedProductionProduct -->

<!-- ModalRawMaterial -->
<div id="ModalRawMaterial" class="modal bottom-sheet">
  <div class="modal-content">
    <div class="row">
      <div class="col s8 left-align"><h4 id="vlrm_title"></h4></div>
      <div class="col s4 right-align"><h4 id="vlrm_stock"></h4></div>
    </div>
    <ul class="collection" id="resultRawMaterial">
    </ul>
  </div>  
</div>
<!-- EndModalRawMaterial -->
@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    result();
    viewProduct({{ $id }});
    $('select').material_select();
  });  

  function viewProduct(i_id)
  {
    $.ajax({
      url: "{{ url('/api/product/getProduct') }}/" + i_id,
      type: 'GET',
      success(result){
        $('#vp_fullname').html(result[0].fullname);
      }
    });
  }

  function result(i_search, i_pag)
  {
    $.ajax({
      url: "{{ url('/api/production-product/getProductionProducts') }}/"+{{$id}},
      type: 'GET',
      data:{
        search : i_search,
        page : i_pag,
      },
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {
          var culmino = '';
          if(result[i].state==2){
            culmino = '<td class="td-btn"><a href="#" title="Finalizado" onclick="modalFinishedProductionProduct(\'' + result[i].id + '\'); return false;">Culminar</a></td>';
          }else{
            culmino = '<td></td>'
          }
          html += '\
          <tr>\
            <td>\
              <a href="#" onclick="modalViewProductionProduct(\'' + result[i].id + '\'); return false;">\
                ' + result[i].quantity_estimated + '\
              </a>\
            </td>\
            <td>' + result[i].date_start + '</td>\
            '+ culmino +'\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo pulse" title="Materia Prima" onclick="modalRawMaterial(\'' + result[i].product_id + '\', \'' + result[i].quantity_estimated + '\', \'' + result[i].id + '\')">\
                <i class="material-icons">report</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light amber" title="Editar" onclick="modalUpdateProductionProduct(\'' + result[i].id + '\')">\
                <i class="material-icons">edit</i>\
              </button>\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Eliminar" onclick="modalDeleteProductionProduct(\'' + result[i].id + '\')">\
                <i class="material-icons">delete</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#result').html(html);
      }
    });
  }


  function modalDeleteProductionProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/production-product/getProductionProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#dpp_id').val(result[0].id);
        $('#ModalDeleteProductionProduct').modal('open');
      }
    });
  }


  function modalUpdateProductionProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/production-product/getProductionProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#upp_id').val(result[0].id);
        $('#upp_date_start').val(result[0].date_start);
        $('#upp_quantity_estimated').val(result[0].quantity_estimated);
        $('#ModalUpdateProductionProduct').modal('open');

      }
    });
  }

  function modalFinishedProductionProduct(i_id) {
    $.ajax({
      url: "{{ url('/api/production-product/getProductionProduct') }}/"+ i_id,
      type: 'GET',
      success(result){
        $('#fpp_id').val(result[0].id);
        $('#fpp_date_start').val(result[0].date_start);
        $('#fpp_quantity_estimated').val(result[0].quantity_estimated);
        $('#ModalFinishedProductionProduct').modal('open');
      }
    });
  }
  

  $("#DeleteProductionProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/production-product/deleteProductionProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalDeleteProductionProduct').modal('close');        
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#dpp_'+message).focus();
        });
      }      
    });
  });  

  //InsertStaffForm
  $("#InsertProductionProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/production-product/insertProductionProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalInsertProductionProduct').modal('close');
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#ipp_'+message).focus();
        });
      }      
    });
  });

  //UpdateProductionProductForm
  $("#UpdateProductionProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/production-product/updateProductionProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalUpdateProductionProduct').modal('close');        
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#upp_'+message).focus();
        });
      }      
    });
  });


  $("#FinishedProductionProductForm").submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"{{ url('/production-product/finishedProductionProduct') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        $('#ModalFinishedProductionProduct').modal('close');        
        result();
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
          $('#fpp_'+message).focus();
        });
      }      
    });
  });


  function modalRawMaterial(i_id, i_quantity, i_production_id) {
    
    $.ajax({
      url: "{{ url('/api/detail-production-planning-raw-raterial/getDetailProductionPlanningRawMaterials') }}/" + i_id,
      type: 'GET',
      success(result){
        var html = '';
        for (var i = 0; i < result.length; i++) {          
          $conjunt='';
          switch(i_quantity) {
            case '10':
                $conjunt = result[i].ten;
                break;
            case '20':
                $conjunt = result[i].twenty;
                break;
            case '30':
                $conjunt = result[i].thirty;
                break;
            case '40':
                $conjunt = result[i].forty;
                break;
            case '50':
                $conjunt = result[i].fifty;
                break;
            case '60':
                $conjunt = result[i].sixty;
                break;
            case '70':
                $conjunt = result[i].seventy;
                break;
            case '80':
                $conjunt = result[i].eighty;
                break;
            case '90':
                $conjunt = result[i].ninety;
                break;
            case '100':
                $conjunt = result[i].hundred;
                break;
          }
          resultLotRawMaterial(i, result[i].id, i_production_id, result[i].rm_id);

          html += '<li class="collection-item avatar">';
          html += '<i class="material-icons circle purple">whatshot</i>';
          html += '<span class="title"><b>' + result[i].fullname + '</b></span>';

      
          
          html += '<div id="resultLotRawMaterial'+i+'"></div>';
          html += '';
          html += '';


          html += '<a href="#" class="secondary-content" onclick="return false;">' + $conjunt+ '</a>';
          html += '</li>';
          

        }
        $('#resultRawMaterial').html(html);
        $('#ModalRawMaterial').modal('open');        
      }
    });

    function resultLotRawMaterial(i_i, i_id, i_production_id, i_raw_material_id) {
      //i_i de orden
      //i_id de rawmaterial
      $.ajax({
        url: "{{ url('/api/lot-raw-material/getLotRawMaterials') }}/"+ i_raw_material_id,
        type: 'GET',
        success(lotrawmaterial){
      console.log(i_raw_material_id);
          var htmlraw = '';
          htmlraw += '<div class="row">';
          for (var l = 0; l < lotrawmaterial.length; l++) {
            valueDetailProductionProductLotRawMaterial(lotrawmaterial[l].id, i_production_id);
            htmlraw += '<div>';
            htmlraw += '<div class="input-field col s8 m8 l8">';
            htmlraw += '<b>cantidad : '+lotrawmaterial[l].quantity+'</b>';
            htmlraw += '<p>fecha de entrada : '+lotrawmaterial[l].date_entry+'</p>';
            htmlraw += '<p>fecha de expiración : '+lotrawmaterial[l].date_expiration+'</p>';
            htmlraw += '</div>';
            htmlraw += '<div class="input-field col s2 m2 l2">';
            htmlraw += '<input id="quantityLotRawMaterial' + lotrawmaterial[l].id + '" onkeyup="UpdateProductionProductLotRawMaterial(' + lotrawmaterial[l].id + ', '+i_production_id+', '+i_raw_material_id+')" type="number" sted="any" min="0" max="' + lotrawmaterial[l].quantity + '" class="validate">';
            htmlraw += '</div>';
            htmlraw += '</div>';
          }
          htmlraw += '</div>';

          $('#resultLotRawMaterial'+i_i).html(htmlraw);
        }
      });
    }
  }

  function UpdateProductionProductLotRawMaterial(i_lot_rawmaterial_id, i_production_id, i_raw_material_id) {

    var formData = new FormData();
    formData.append('production_product_id', i_production_id);
    formData.append('raw_material_id', i_raw_material_id);
    formData.append('lot_raw_material_id', i_lot_rawmaterial_id);
    formData.append('quantity', $('#quantityLotRawMaterial' + i_lot_rawmaterial_id).val());

    $.ajax({
      url:"{{ url('/detail-production-product-lot-raw-material/updateDetailProductionProductLotRawMaterial') }}",
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
        Materialize.toast('Datos han sido guardado.', 4000, 'light-green darken-1');
        result();
        /*var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
        });*/
      }  
    });
  }

  function valueDetailProductionProductLotRawMaterial(i_lotrawmaterial_id, i_production_id) {
    $.ajax({
      url:"{{ url('/api/detail-production-product-lot-raw-material/getDetailProductionProductLotRawMaterial') }}/"+i_production_id+"/"+i_lotrawmaterial_id,
      type: 'GET',
      success(result){
        for(var i in result) { 
          $('#quantityLotRawMaterial'+i_lotrawmaterial_id).val(result[0].quantity); 
        }
      }   
    });
  }

</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->