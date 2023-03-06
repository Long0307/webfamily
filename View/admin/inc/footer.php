

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Core Js -->
    <script src="../../public/Admin/templateAdmin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../public/Admin/templateAdmin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->

    <!-- Waves Effect Plugin Js -->
    <script src="../../public/Admin/templateAdmin/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../../public/Admin/templateAdmin/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../../public/Admin/templateAdmin/plugins/raphael/raphael.min.js"></script>
    <script src="../../public/Admin/templateAdmin/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../../public/Admin/templateAdmin/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../../public/Admin/templateAdmin/plugins/flot-charts/jquery.flot.js"></script>
    <script src="../../public/Admin/templateAdmin/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../../public/Admin/templateAdmin/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../../public/Admin/templateAdmin/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../../public/Admin/templateAdmin/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../../public/Admin/templateAdmin/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../../public/Admin/templateAdmin/js/admin.js"></script>
    <script src="../../public/Admin/templateAdmin/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../../public/Admin/templateAdmin/js/demo.js"></script>
    <script src="../../public/Admin/select2/js/select2.min.js"></script>
    <script src="../../public/Admin/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#accordion").accordion();
        });
    </script>

    <script>

        var url = window.location.href;  

            for(var i = 1;i <= $("ul.list li").length; i++){
                
                var addactive = url.indexOf($("ul.list li:nth-child("+i+") a").attr("href"));

                if(addactive > 0){
                    $(".active").removeClass('active'); 
                    $("ul.list li:nth-child("+i+") a").parent().addClass('active');
                }
                
            }   

            $("div.pagination.pagination-style-three.m-t-20 a.page-link:nth-child(1)").css('background','#ff6407').css('color','white');

            for(var i = 1;i <= $("div.pagination.pagination-style-three.m-t-20 a.page-link").length; i++){
                
                var addactive = url.indexOf($("div.pagination.pagination-style-three.m-t-20 a.page-link:nth-child("+i+")").attr("href"));

                if(addactive > 0){
                    $("div.pagination.pagination-style-three.m-t-20 a").css({ 'background-color' : '', 'color' : '' });
                    $("div.pagination.pagination-style-three.m-t-20 a.page-link:nth-child("+i+")").css('background','#ff6407').css('color','white');
                }
                
            } 
    </script>
    <script>
        
            $("#navbar_phone").click(function(event) {
                $("#leftsidebar").css("margin-left","0");
                $("#navbar_phone").css("display","none");
                $("#close_phone").css("display","block");
            });
            $("#close_phone").click(function(event) {
                if($(window).width() < 768){
                    $("#leftsidebar").css("margin-left","-100%");
                    $("#navbar_phone").css("display","block");
                    $("#close_phone").css("display","none");
                }
            });
        
    </script>

<style type="text/css" media="screen">

    #navbar_phone{
        display: none;
    }

    #close_phone{
        display: none;
    }

    @media screen and (max-width: 768px){

        #navbar_phone{
            display: block;
        }

        #close_phone{
            display: none;
        }
  
    }
</style>
</body>

</html>
