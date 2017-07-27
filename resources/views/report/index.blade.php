@extends('layouts.app')
@section('content')

@extends('layouts.menu')
<!-- *********** ****** ***** Title ***** ****** *********** -->
@section('title')
    Reportes
@endsection
<!-- *********** ****** ***** EndTitle ***** ****** *********** -->
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
@section('container')
<ul id="tabs-swipe-demo" class="tabs">
  <li class="tab col s6">
    <a class="active" href="#tabReportOrder" onclick="goToReportOrder()">
      Nivel de cumplimiento de entrega
    </a>
  </li>
  <li class="tab col s6">
    <a href="#tabReportProduction" onclick="goToReportProduction()">
      Nivel de productividad
    </a>
  </li>
  <li class="tab col s6">
    <a href="#tabReportSoldProducts" onclick="goToReportSoldProduct()">
      Venta de productos
    </a>
  </li>
  <li class="tab col s6">
    <a href="#tabReportClient" onclick="goToReportClient()">
      Cliente
    </a>
  </li>


</ul>
<div id="tabReportOrder" class="col s12">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h2>Nivel de cumplimiento de entrega</h2> 
      </div>

<!--
      <div class="col s12 m12 l12 center-align eq-c">
        <div class="input-field col s12 m5">
          <input type="date" id="roDateStart" class="validate">
          <label for="roDateStart">Fecha inicial</label>
        </div>
        <div class="input-field col s12 m5">
          <input type="date" id="roDateEnd"  class="validate">
          <label for="roDateEnd">Fecha final</label>
        </div>
        <div class="input-field col s12 m2">
          <button class="btn waves-effect waves-light" name="action" onclick="reportOrderSearch()">
            <i class="material-icons center-align">search</i>
          </button>
        </div>
      </div>
-->
      <div id="ReportOrders" class="col s12 m12 l12" style="height: 500px;"></div>
      <div class="col s12 m12 l12 center-align eq-c">
        <i>Nivel de cumplimiento de entrega</i> = 
        <div class="fraction">
        <span class="fup"><i>Números de pedido<br>entregados correctamente</i></span>
        <span class="bar">/</span>
        <span class="fdn"><i>Números total de<br>pedidos solicitados</i></span>
        </div> =
        <span id="LevelOfDeliveryCompliance"></span>
      </div>
      <div class="col s12 m12 l12">
        <div class="col s12 m12 l12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                <th data-field="fullname">Cliente</th>
                <th data-field="Fecha_programada">Fecha</th>
                <th data-field="enregados">N° pedidos entregados correctamente</th>
                <th data-field="solicitados">N° pedidos solicitados</th>
                <th data-field="np">NCEP</th>
                <th data-field="view"></th>
              </tr>
            </thead>
            <tbody id="resultOrder">
            </tbody>
          </table>     
        </div>
      </div>
    </div>
  </div>
</div>
<div id="tabReportProduction" class="col s12">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h2>Nivel de cumplimiento de productividad</h2> 
      </div>


<!--
      <div class="col s12 m12 l12 center-align eq-c">
        <div class="input-field col s12 m5">
          <input type="date" id="rpDateStart" class="validate">
          <label for="rpDateStart">Fecha inicial</label>
        </div>
        <div class="input-field col s12 m5">
          <input type="date" id="rpDateEnd"  class="validate">
          <label for="rpDateEnd">Fecha final</label>
        </div>
        <div class="input-field col s12 m2">
          <button class="btn waves-effect waves-light" name="action" onclick="reportProductionSearch()">
            <i class="material-icons center-align">search</i>
          </button>
        </div>
      </div>
-->

      <div id="ReportProduction" class="col s12 m12 l12" style="height: 500px;">
      </div>
      <div class="col s12 m12 l12 center-align eq-c">
        <i>Nivel de productividad</i> = 
        <div class="fraction">
        <span class="fup"><i>Productos elaborados<br>satisfactoriamente</i></span>
        <span class="bar">/</span>
        <span class="fdn"><i>Productos realizables<br>estimador</i></span>
        </div> =
        <span id="LevelOfProductivity"></span>
      </div>
      <div class="col s12 m12 l12">
        <div class="col s12 m12 l12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                <th data-field="fullname">Item</th>
                <th data-field="date_start">Fecha</th>
                <th data-field="product_estimated">Productos estimados</th>
                <th data-field="product_real">Productos elaborados</th>
                <th data-field="np">NP</th>
              </tr>
            </thead>
            <tbody id="resultProduction">
            </tbody>
          </table>     
        </div>
      </div>
    </div>
  </div>
</div>



<div id="tabReportSoldProducts" class="col s12">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h2>Venta de productos</h2> 
      </div>



      <div class="col s12 m12 l12 center-align eq-c">
        <div class="input-field col s12 m5">
          <input type="date" id="rspDateStart" class="validate">
          <label for="rspDateStart">Fecha inicial</label>
        </div>
        <div class="input-field col s12 m5">
          <input type="date" id="rspDateEnd"  class="validate">
          <label for="rspDateEnd">Fecha final</label>
        </div>
        <div class="input-field col s12 m2">
          <button class="btn waves-effect waves-light" name="action" onclick="reportSoldProductSearch()">
            <i class="material-icons center-align">search</i>
          </button>
        </div>
      </div>


      <div id="ReportSoldProduct" class="col s12 m12 l12" style="height: 500px;">
      </div>      
      <div class="col s12 m12 l12">
        <div class="col s12 m12 l12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                <th data-field="fullname">Producto</th>
                <th data-field="quantity">Cantidad vendidad</th>
                <th data-field="client">Cliente</th>
                <th data-field="amounttotal">(S/.) Monto total</th>
              </tr>
            </thead>
            <tbody id="resultSoldProduct">
            </tbody>
          </table>     
        </div>
      </div>
    </div>
  </div>
</div>
<div id="tabReportClient" class="col s12">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h2>Productos</h2> 
      </div>
      <div id="ReportClient" class="col s12 m12 l12" style="height: 500px;">
      </div>      
      <div class="col s12 m12 l12">
        <div class="col s12 m12 l12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                <th data-field="ranking">N°</th>
                <th data-field="fullname">Producto</th>
              </tr>
            </thead>
            <tbody id="resultClient">
            </tbody>
          </table>     
        </div>
      </div>
    </div>
  </div>
</div>



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
<br><br><br>
<!-- EndModalViewOrder -->

@endsection
<!-- *********** ****** ***** EndContainer ***** ****** *********** -->
<!-- *********** ****** ***** Script ***** ****** *********** -->
@section('script')

<script type="text/javascript" src="/js/loader.js"></script>

<script type="text/javascript">

  $(document).ready(function (){
    reportOrder();
    $('select').material_select();
  });

  function goToReportOrder() {
    reportProduction();
  }

  function reportOrderSearch() {
    reportOrder($('#roDateStart').val(), $('#roDateEnd').val());
  }
  
  function reportOrder(i_date_start, i_date_end){

    google.charts.load('current', {'packages':['corechart']});

    $.ajax({
      url: "{{ url('/api/report/getReportOrder') }}",
      type: 'GET',
      data:{
        date_start : i_date_start,
        date_end : i_date_end,
      },
      success(result){
        var html = '';
        var orderSuccessReal=0;
        var orderSuccessEstimated=0;
        var totalOrder=0;

        for (var i = 0; i < result.length; i++) {
          if(result[i].total_quantity_delivered>=result[i].total_quantity_order){
            html += '<tr class="lime lighten-4">';
          }else{
            html += '<tr class="red lighten-4">';
          }
          
          html += '<td><a href="#" onclick="return false;">' + result[i].fullname + '</a></td>';
          html += '<td>' + result[i].date_delivery_real + '</td>';
          html += '<td>' + result[i].total_quantity_delivered + '</td>';
          html += '<td>' + result[i].total_quantity_order + '</td>';
          //html += '<td>' + result[i].total_quantity_delivered/result[i].total_quantity_order*100  + ' %</td>';
          var cadena = "";
          var temp = "";
          if(result[i].total_quantity_delivered != result[i].total_quantity_order){
            temp = ((result[i].total_quantity_delivered/result[i].total_quantity_order) *100).toString();
            cadena = temp.substring(0,5);            
          }else{
            cadena = "100"
          }
          html += '<td>' + cadena  + ' %</td>';
          html += '<td class="td-btn">\
              <button class="btn-floating waves-effect waves-light indigo" title="Pedidos" onclick="modalViewOrder(\'' + result[i].id + '\')">\
                <i class="material-icons">visibility</i>\
              </button>\
            </td>';

          html += '</tr>';
          orderSuccessReal += parseFloat(result[i].total_quantity_delivered);
          orderSuccessEstimated += parseFloat(result[i].total_quantity_order);
        }
        console.log(orderSuccessReal);
        console.log(orderSuccessEstimated);
       $('#LevelOfDeliveryCompliance').html((orderSuccessReal/orderSuccessEstimated).toFixed(2));
    
        $('#resultOrder').html(html);
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Cumplimiento de entrega'],
          ['Pedido entregados correctamente', (orderSuccessEstimated - orderSuccessReal)],
          ['Pedidos solicitados', orderSuccessReal]
        ]);

        var options = {
          title: 'Cumplimiento de entrega',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('ReportOrders'));
        chart.draw(data, options);
      }
    });
  }

  function goToReportProduction() {
    reportProduction();
  }

  function reportProductionSearch() {
    reportProduction($('#rpDateStart').val(), $('#rpDateEnd').val());
  }

  function reportProduction(i_date_start, i_date_end){

    //google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.load('current', {'packages':['corechart']});
    $.ajax({
      url: "{{ url('/api/report/getReportProduction') }}",
      type: 'GET',
      data:{
        date_start : i_date_start,
        date_end : i_date_end,
      },
      success(result){
        var f_quantity_estimated=0;
        var f_quantity_real=0;
        /*
          quantity_estimated
          quantity_real
        */
        var html = '';
        var product_id = '';
        //var arrayData = [];
        //arrayData.push(['PRODUCTOS', 'Programados', 'Producidos']);
        for (var i = 0; i < result.length; i++) {
          /*arrayData.push([result[i].fullname, 
            parseFloat(result[i].quantity_estimated), 
            parseFloat(result[i].quantity_real)]);*/
          if(result[i].quantity_estimated<=result[i].quantity_real){
            html += '<tr class="lime lighten-4">';
          }else{
            html += '<tr class="red lighten-4">';
          }
          html += '<td><a href="#" onclick="return false;">' + result[i].fullname + '</a></td>';
          html += '<td>' + result[i].date_start + '</td>';
          html += '<td>' + result[i].quantity_estimated + '</td>';
          html += '<td>' + result[i].quantity_real + '</td>';
          //html += '<td>' + result[i].quantity_real/result[i].quantity_estimated*100  + ' %</td>';
          var cadena = "";
          var temp = "";
          if(result[i].quantity_real != result[i].quantity_estimated){
            temp = ((result[i].quantity_real/result[i].quantity_estimated) *100).toString();
            cadena = temp.substring(0,5);            
          }else{
            cadena = "100"
          }
          //html += '<td>' + ((26/26) *100).toFixed(3) + cadena+ ' %</td>';
          html += '<td>' + cadena + ' %</td>';
          html += '</tr>';
          f_quantity_estimated += parseFloat(result[i].quantity_estimated);
          f_quantity_real += parseFloat(result[i].quantity_real);
        } 

        $('#LevelOfProductivity').html((f_quantity_real/f_quantity_estimated).toFixed(2));
        $('#resultProduction').html(html);

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Productividad'],
          ['Productos estimados', (f_quantity_estimated - f_quantity_real)],
          ['Productos elaborados', f_quantity_real]
        ]);
        /*var options = {
          chart: {
            //title: 'Company Performance',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal'
        };

        var chart = new google.charts.Bar(document.getElementById('ReportProduction'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        */
        var options = {
          title: 'Nivel de productividad',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('ReportProduction'));
        chart.draw(data, options);
        

      }
    });
  }


  
  function goToReportSoldProduct() {
    reportSoldProduct();
  }

  function reportSoldProductSearch() {
    reportSoldProduct($('#rspDateStart').val(), $('#rspDateEnd').val());    
  }
  function reportSoldProduct(i_date_start, i_date_end){

    google.charts.load('current', {'packages':['corechart']});

    $.ajax({
      url: "{{ url('/api/report/getReportSoldProduct') }}",
      type: 'GET',
      data:{
        date_start : i_date_start,
        date_end : i_date_end,
      },
      success(result){
        var html = '';
        var product_id = '';
        var arrayData = [];
        arrayData.push(['PRODUCTOS', 'Programados']);
        for (var i = 0; i < result.length; i++) {
          arrayData.push([result[i].fullname, 
            parseFloat(result[i].total_quantity_order)]);
          html += '<tr>';
          html += '<td><a href="#" onclick="return false;">' + result[i].fullname + '</a></td>';
          html += '<td>' + result[i].total_quantity_order + '</td>';
          html += '<td>' + result[i].client_fullname + '</td>';
          html += '<td>' + result[i].total_amount + '</td>';
          html += '</tr>';
        }
        $('#resultSoldProduct').html(html);
    
        var data = google.visualization.arrayToDataTable(arrayData);

        var options = {
          //is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('ReportSoldProduct'));
        chart.draw(data, options);

      }
    });
  }

  function goToReportClient() {
    reportClient();
  }
  function reportClient(i_date_start, i_date_end){

    google.charts.load('current', {'packages':['corechart', 'bar']});

    $.ajax({
      url: "{{ url('/api/report/getReportClient') }}",
      type: 'GET',
      data:{
        date_start : i_date_start,
        date_end : i_date_end,
      },
      success(result){
        var html = '';
        var arrayData = [];
        arrayData.push(['CLIENTES', 'Ventas']);
        var rank = 0;
        for (var i = 0; i < result.length; i++) {
          rank++;
          arrayData.push([result[i].client_fullname, 
            parseFloat(result[i].total_total_amount)]);
          html += '<tr>';
          html += '<td>' + rank + '</td>';
          html += '<td><a href="#" onclick="return false;">' + result[i].client_fullname + '</a></td>';
          html += '</tr>';
        }

        $('#resultClient').html(html);

        var data = google.visualization.arrayToDataTable(arrayData);
        var options = {
          chart: {
            //title: 'Company Performance',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          //bars: 'horizontal',
          bars: 'vertical'
        };

        var chart = new google.charts.Bar(document.getElementById('ReportClient'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        

      }
    });
  }
/*
  function reportProductionProduct(i_date_start, i_date_end){
    i_date_start = new Date('2017-05-16');
    i_date_end = new Date('2017-05-25');
    google.charts.load('current', {'packages':['line']});

    var data = new google.visualization.DataTable();
    data.addColumn('date', 'Fecha');

    $.ajax({
      url: "{{ url('/api/product/getProducts') }}",
      type: 'GET',
      success(result){
        for (var i = 0; i < result.length; i++) {
          data.addColumn('number', result[i].fullname);
        }

        ////
        var start = i_date_start;
        var end = i_date_end;
        var countDate = 0;
        var arrayDataData = [];

        var d_year = '';
        var d_month = '';
        var d_day = '';
        while(start<=end){
          var newDate = start.setDate(start.getDate() + 1);
          start = new Date(newDate);
          d_year = start.getFullYear();
          d_month = start.getMonth();
          d_day = start.getDate();
          var arrayData = [];
          arrayData.push(new Date(d_year, d_month, d_day));
          for (var r = 0; r < result.length; r++) {
            
            $.ajax({
              url: "{{ url('/api/report/getReportProductionProduct') }}",
              type: 'GET',
              data:{
                date : d_year + '-' + d_month + '-' + d_day,
                product_id: result[r].id
              },success(register){
                if(register){
                  arrayData.push(register[0].total_quantity_real);
                }else{
                  arrayData.push("");
                }
              }
            });
          }
          if(start>end){
            console.log(arrayDataData);
            break;
          }
          
          
          arrayDataData.push(arrayData);
          countDate++;
        }
        ///



        var arrayDataProductionProduct = [];
        arrayDataProductionProduct.push(['Year', 'Sales', 'Expenses', 'Profit']);
        //console.log(arrayDataProductionProduct);


        var date = new Date('2017-05-26');
        var d_year = date.getFullYear();
        var d_month = date.getMonth();
        var d_day = date.getDate();
        //console.log(d_year);
        //console.log(d_month);
        //console.log(d_day);

        data.addRows([
              [new Date(2008, 0, 1), 80, 32, 41, 43, 51]
            ]);

        data.addRows([
          [new Date(2008, 0, 12), 20, 35, 42, 40, 51],
          [new Date(2008, 0, 13), 21, 30, 4, 44, 55]
            ]);


        data.addRows([
          [new Date(2008, 1, 11), 20, 35, 42, 40, 51]
            ]);

              
        var options = {
          width: 900,
          height: 500,
          axes: {
            x: {
              0: {side: 'top'}
              }
            }
          };
        var chart = new google.charts.Line(document.getElementById('ReportProductionProduct'));
        chart.draw(data, google.charts.Line.convertOptions(options));
        
      }
    });
  }

  function productionProduct(i_date, i_product_id) {
    var data = '';
    console.log(i_date + ' ///// ' + i_product_id);
    $.ajax({
      url: "{{ url('/api/report/getReportProductionProduct') }}",
      type: 'GET',
      data:{
        date : i_date,
        product_id: i_product_id
      },success(register){
        data = register;
        //console.log(d_year + '-' + d_month + '-' + d_day);
        //console.log(register);
        //for (var r = 0; r < register.length; r++) {
        //  arrayData.push(register[r].date_end);
        //}
      }
    });
    return data;
  }
  */

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
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
          html += '<p class="pointer"><h5> Cantidad solicitada:'+ result[i].quantity_order +'</h5></p>';
          html += '<a href="#" class="secondary-content">Cantidad entregada: <br><center><h3>'+ result[i].quantity_delivered +'</h3></center></a>';
          html += '</li>';      
        }
        $('#resultViewOrder').html(html);
        $('#modal_add_detail_order_product').attr('onclick', 'modalInsertDetailOrderProduct('+i_id+')');
        $('#ModalViewOrder').modal('open');
      }
    }); 
  }
</script> 
@endsection
<!-- *********** ****** ***** EndScript ***** ****** *********** -->