<?php if (!$_COOKIE['user_id']) {
  header('Location: /src/pages/auth.php');
} ?>

<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

<!-- Head -->
<?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4' id="snow-animation-container">

  <!-- Header -->
  <?php require('../../src/components/header.php'); ?>

  <!-- Footer -->
  <?php require('../../src/components/footer.php'); ?>



  <section class="vh-100 gradient-custom" style="background-repeat: no-repeat; background-position: center; background-size: cover; background-image: url('https://phonoteka.org/uploads/posts/2021-04/1617805407_55-p-krasivii-fon-na-ekran-57.jpg');">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-3 ml-3" style="width: 98%;">
          <div class="card-body">
            <div class="tab-content" id="nav-tabContent-zametki">
              <!-- Zametki -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--alert good-->
    <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
      <div id="liveToastChange" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">

        <div class="toast-body">
          Заметки обновлены!
          <button type="button" class="btn-close float-right" data-bs-dismiss="toast" aria-label="Закрыть"></button>

        </div>
      </div>
    </div>


  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.14/highcharts.js"></script>
  <script src="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.min.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
  <!-- SNOW -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


  <script>
    $(document).ready(function() {
      // Show Tasks
      function loadTextZametka() {
        $.ajax({
          url: "./zametkiPhpScripts/loadMainTextZametki.php",
          type: "POST",
          success: function(data) {
            $("#nav-tabContent-zametki").html(data);
          }
        });

      };

      loadTextZametka();

      $(document).on("click", "#saveCangeZametki", function(e) {
        e.preventDefault();

        var serializeFormData = $('#formChangeZametki').serialize();
        serializeFormData = serializeFormData.toString();

        $.ajax({
          url: "./zametkiPhpScripts/saveChangeZametki.php",
          type: "POST",
          data: serializeFormData,
          success: function(data) {

            loadTextZametka();

            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }

            $('#liveToastChange').toast('show');
          }
        });
      });
    });
  </script>
</body>
</html>