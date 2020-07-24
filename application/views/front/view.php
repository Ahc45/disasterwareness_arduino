  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
        LOGO Dito
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>View data</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
              <i class="now-ui-icons design_app"></i>
              <p>User</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="./index.html">
                <i class="now-ui-icons business_chart-pie-36"></i>Login
              </a>
              <button class="dropdown-item" data-toggle="modal" data-target="#myModal">
              <i class="now-ui-icons design_bullet-list-67"></i> Registers
            </button>
              
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header.jpg');">
      </div>
      <div class="container">
        <div class="content-center brand">
          <img class="n-logo" src="./assets/img/now-logo.png" alt="">
          <h1 class="h1-seo">Disaster Awareness</h1>
          <h3>Will help you monitor flood and earthquake</h3>
        </div>
        <h6 class="category category-absolute">Write
          Something here  
        </h6>
      </div>
    </div>
    <div class="main">

      <div class="section section-download" id="#download-section" >
        <div class="container">
          <div class="row text-center  " style=" border-radius: 10px 10px 0 0;">

           <div class="col-md-12 ml-auto mr-auto"><h2>Water Level</h2>
               <canvas id="myChart"></canvas>
          </div>
          <div class="col-md-6 ml-auto mr-auto">
              <br><br>
              <!-- <h2>sada</h2> -->
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                       <?php $this->load->view('front/register')?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
    <footer class="footer" data-background-color="black">
      <div class=" container ">
<!--         <nav>
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="http://presentation.creative-tim.com">
                About Us
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
          </ul>
        </nav> -->
     <script>

        // $.ajax(<?php #echo base_url('public_view/ajax_data')?>, {
        //   success: function(data) {
        //       console.log(data);
        //   },
        //   error: function() {
        //     console.log("somthing went wrong!")
        //     }
        //   });
          // var interval = 500; 
          // function doAjax() {
          //     $.ajax({
          //             type: 'GET',
          //             url: '<?php echo base_url('public_view/ajax_data')?>',
          //             data: $(this).serialize(),
          //             dataType: 'json',
          //             success: function (data) {
          //                     console.log(data)// first set the value 
          //                   var ctx = document.getElementById('myChart').getContext('2d');
          //                   let timel = [];
          //                   let water = [];
          //                     try {
          //                       data.map((item) => {
          //                         water.push(item.Data);
          //                         timel.push(item.created);
          //                       });

          //                       var myChart = new Chart(ctx, {
          //                             scaleOverride: true,
          //                              type: 'line',
          //                         data: {
          //                           labels: [...timel],
          //                           datasets: [{
          //                             label: 'Water Level',
          //                             data: [...water],
          //                              fillColor : "rgb(173,216,230)",
          //                             strokeColor : "rgb(173,216,230)",
          //                             pointColor : "rgb(173,216,230)",
          //                             pointStrokeColor : "BLUE",
          //                             backgroundColor: 'rgb(173,216,230)',
          //                             borderWidth: 2
          //                           }]
          //                         },    
          //                         options: {
          //                            animation: {
          //                                duration: 0
          //                                     }
          //                                 },

          //                       });

          //                     } catch (error) {
          //                       console.log(error);
          //                     }    
          //             },
          //             complete: function (data) {
          //                     // Schedule the next
          //                     setTimeout(doAjax, interval);
          //             }
          //     });
          // }
          // setTimeout(doAjax, interval);
      
     </script>
      </div>
    </footer>
  </div>

<?php  $this->load->view('_includes/footer')?>