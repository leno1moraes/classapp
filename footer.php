

    <!-- FECHA AQUI O PAGINA PRINCIPAL -->
  </div>
  <!-- /.content-wrapper -->

  <!--
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <font style="font-style: italic;"> "The only easy day was yesterday" </font>
  </footer>
  -->
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="AdminTLEFiles/jquery.min.js.download"></script>
<!-- Bootstrap 3.3.7 -->
<script src="AdminTLEFiles/bootstrap.min.js.download"></script>
<!-- FastClick -->
<script src="AdminTLEFiles/fastclick.js.download"></script>
<!-- AdminLTE App -->
<script src="AdminTLEFiles/adminlte.min.js.download"></script>
<!-- Sparkline -->
<script src="AdminTLEFiles/jquery.sparkline.min.js.download"></script>
<!-- jvectormap  -->
<script src="AdminTLEFiles/jquery-jvectormap-1.2.2.min.js.download"></script>
<script src="AdminTLEFiles/jquery-jvectormap-world-mill-en.js.download"></script>
<!-- SlimScroll -->
<script src="AdminTLEFiles/jquery.slimscroll.min.js.download"></script>
<!-- ChartJS -->
<script src="AdminTLEFiles/Chart.js.download"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="AdminTLEFiles/dashboard2.js.download"></script>
<!-- AdminLTE for demo purposes -->
<script src="AdminTLEFiles/demo.js.download"></script>

<script src="AdminTLEFiles/jquery.min.js"></script>
<script src="AdminTLEFiles/bootstrap-datepicker.min.js"></script>
<script src="AdminTLEFiles/bootstrap-datepicker.pt-BR.min.js"></script>

<!--<div class="jvectormap-label"></div>-->
  <script>
    $(document).ready(function(){
      $(".DateField").datepicker({
        multidate:false,
          format: "dd/mm/yyyy",
          language: "pt-BR",    
      });

      $(".table-condensed tbody").click(function(){
        setTimeout(function(){ $('.abc').val($('.DateField[type=hidden]').val()); }, 1000)
      });
    });


    /*$("#bt1").click(function(){
        alert("Olá Mundo");
    });*/

     $("#tableMaster").on("click", "td", function() {
       //alert($( this ).text());
       //alert(this.id);
       $(this).css('background-color', '#0044cc');
       //alert($('background-color').value);
     });  

     $("#btnFinalizarSolicitacao").on("click", function() {
        alert("Solicitação Finalizada com Sucesso");
        location.replace("myrequests.php");
     }); 

  </script>

</body>
</html>