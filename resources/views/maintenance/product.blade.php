@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Configuración de producto
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
      <!-- UsingRawMaterial -->
      <div class="col s12 m12 l12">
        <table class="highlight responsive-table">
          <thead>
            <tr>
                <th data-field="fullname">Materia prima</th>
                <th data-field="ten">Und.</th>
                <th data-field="ten">10</th>
                <th data-field="twenty">20</th>
                <th data-field="thirty">30</th>
                <th data-field="forty">40</th>
                <th data-field="fifty">50</th>
                <th data-field="sixty">60</th>
                <th data-field="seventy">70</th>
                <th data-field="eighty">80</th>
                <th data-field="ninety">90</th>
                <th data-field="hundred">100</th>
                <th class="td-btn" data-field="update"></th>
                <th class="td-btn" data-field="remove"></th>
            </tr>
          </thead>
          <tbody id="resultDetailProductionPlanningRawMaterial">
          </tbody>
        </table>     
      </div>
      <!-- EnbUsingRawMaterial -->      
    </div>
  </div>
  <div class="row">
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
              <th data-field="fullname">Materia Prima</th>
              <th data-field="unit">Unidad</th>
              <th class="td-btn" data-field="add"></th>
          </tr>
        </thead>
        <tbody id="resultRawMaterial"></tbody>
      </table>     
    </div>
    <!-- EndTableProduct -->      
  </div>
  <!-- EndRowResult -->
  <!-- Pagination -->
  <div class="row">
    <div class="center-align">
      <ul class="pagination" id="paginationRawMaterial"></ul>
    </div>
  </div>
  <!-- EndPagination -->
</div>

@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')
<script type="text/javascript">

  $(document).ready(function (){
    viewProduct({{ $id }});
    resultRawMaterial();
    pagesRawMaterial();
    resultDetailProduction({{$id}});
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

  function searchRawMaterial()
  {
    var search = $('#searchRawMaterial').val();
    if (search.length > 1) {
      resultRawMaterial(search);
      pagesRawMaterial(search);
    }
  }

  function force_searchRawMaterial(){
    var search = $('#search').val();
    resultRawMaterial(search);
    pagesRawMaterial(search);
  }

  function pageRawMaterial(i_pag){
    var search = $('#search').val();
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
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light light-green" title="Agregar" onclick="InsertDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')">\
                <i class="material-icons">keyboard_arrow_up</i>\
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

  function InsertDetailProductionPlanningRawMaterial(i_id) {
    var formData = new FormData();
    formData.append('product_id', {{ $id }});
    formData.append('raw_material_id', i_id);
    $.ajax({
      url:"{{ url('/detail-production-planning-raw-raterial/InsertDetailProductionPlanningRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        resultDetailProduction({{$id}});
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
        });
      }      
    });
  }


  function resultDetailProduction(i_id) {
      console.log(i_id);
      $.ajax({
      url: "{{ url('/api/detail-production-planning-raw-raterial/getDetailProductionPlanningRawMaterials') }}/" + i_id,
      type: 'GET',
      success(result){
        console.log(result);
        var html = '';
        for (var i = 0; i < result.length; i++) {
          html += '\
          <tr>\
            <td class="center-align">\
              <a href="#" onclick="modalViewProduct(\'' + result[i].id + '\'); return false;">\
                ' + result[i].fullname + '\
              </a>\
            </td>\
            <td class="center-align">' + result[i].unit + '</td>\
            <td>\
              <input id="ten' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].ten + '">\
            </td>\
            <td>\
              <input id="twenty' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].twenty + '">\
            </td>\
            <td>\
              <input id="thirty' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].thirty + '">\
            </td>\
            <td>\
              <input id="forty' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].forty + '">\
            </td>\
            <td>\
              <input id="fifty' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].fifty + '">\
            </td>\
            <td>\
              <input id="sixty' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].sixty + '">\
            </td>\
            <td>\
              <input id="seventy' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].seventy + '">\
            </td>\
            <td>\
              <input id="eighty' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].eighty + '">\
            </td>\
            <td>\
              <input id="ninety' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].ninety + '">\
            </td>\
            <td>\
              <input id="hundred' + result[i].id + '" type="text" onkeyup="UpdateDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')" value="' + result[i].hundred + '">\
            </td>\
            <td class="td-btn">\
              <button class="btn-floating waves-effect waves-light red" title="Remover" onclick="DeleteDetailProductionPlanningRawMaterial(\'' + result[i].id + '\')">\
                <i class="material-icons">keyboard_arrow_down</i>\
              </button>\
            </td>\
          </tr>';
        }
        $('#resultDetailProductionPlanningRawMaterial').html(html);
      }
    });
  }

  function DeleteDetailProductionPlanningRawMaterial(i_id) {
    var formData = new FormData();
    formData.append('id', i_id);
    $.ajax({
      url:"{{ url('/detail-production-planning-raw-raterial/DeleteDetailProductionPlanningRawMaterial') }}",
      type:'POST',
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(msj){
        Materialize.toast(msj['success'], 4000, 'light-green darken-1');
        resultDetailProduction({{$id}});  
      },
      error: function(xhr,err) {
        var msj = JSON.parse(xhr.responseText);
        $.each(msj, function(message) {
          Materialize.toast(msj[message], 4000, 'red darken-2');
        });
      }      
    });
  }

  function UpdateDetailProductionPlanningRawMaterial(i_id) {
    var formData = new FormData();
    formData.append('id', i_id);
    formData.append('ten', $('#ten' + i_id).val());
    formData.append('twenty', $('#twenty' + i_id).val());
    formData.append('thirty', $('#thirty' + i_id).val());
    formData.append('forty', $('#forty' + i_id).val());
    formData.append('fifty', $('#fifty' + i_id).val());
    formData.append('sixty', $('#sixty' + i_id).val());
    formData.append('seventy', $('#seventy' + i_id).val());
    formData.append('eighty', $('#eighty' + i_id).val());
    formData.append('ninety', $('#ninety' + i_id).val());
    formData.append('hundred', $('#hundred' + i_id).val());

    $.ajax({
      url:"{{ url('/detail-production-planning-raw-raterial/UpdateDetailProductionPlanningRawMaterial') }}",
      type:'POST',
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
        });
      }      
    });
  }
    
</script>
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->