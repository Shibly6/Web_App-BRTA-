<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRTA Home Pages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar -->
  <?php include 'nav.php'; ?>



          
          
          <div class="container">

              <!-- Slide -->
              <div id="carouselExampleIndicators" class="carousel slide pt-2">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="ui-img/s1.jpg" class="d-block w-100"  height="400">
                  </div>
                  <div class="carousel-item">
                    <img src="ui-img/s2.jpg" class="d-block w-100" height="400">
                  </div>
                  <div class="carousel-item">
                    <img src="ui-img/s3.jpg" class="d-block w-100" height="400">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

                <!-- Slide end -->
        </div>

        


                 <!-- Services -->
                 <div class="container text-center pt-2">
                    <h1 class="p-3">Services</h1>
                    <div class="row">
                      <div class="col order-last">
    
                        <div class="card" style="width: 18rem;">
                            <img src="ui-img/sr-1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Vehicle Registration</h5>
                              <p class="card-text">BRTA facilitates the registration of new vehicles.
                                It issues vehicle registration certificates.</p>
                            </div>
                          </div>
                      
                    </div>
                      <div class="col">
    
                        
                        <div class="card" style="width: 18rem;">
                            <img src="ui-img/sr-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h5 class="card-title">Vehicle Registration</h5>
                              <p class="card-text">BRTA facilitates the registration of new vehicles.
                                It issues vehicle registration certificates.</p>
                            </div>
                          </div>
                      
                    </div>
                      <div class="col order-first">
    
                        
                        <div class="card" style="width: 18rem;">
                            <img src="ui-img/sr-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h5 class="card-title">Vehicle Registration</h5>
                              <p class="card-text">BRTA facilitates the registration of new vehicles.
                                It issues vehicle registration certificates.</p>
                            </div>
                          </div>
                      
                    </div>
                    </div>
                  </div>


                  <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'subscribe.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            $('#subscribe-alert').removeClass('alert-danger').addClass('alert-success');
                        } else {
                            $('#subscribe-alert').removeClass('alert-success').addClass('alert-danger');
                        }

                        $('#subscribe-alert').text(response.message).show();
                    },
                    error: function () {
                        $('#subscribe-alert').removeClass('alert-success').addClass('alert-danger').text('An error occurred. Please try again.').show();
                    }
                });
            });
        });
    </script>

  </body>
</html>