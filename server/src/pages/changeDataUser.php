<?php if (!$_COOKIE['user_id']) {header('Location: /src/pages/auth.php');}?>

<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

  <!-- Header -->
  <?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4' id="snow-animation-container">

  <!-- Header -->
  <?php require('../../src/components/header.php'); ?>

  <!-- Footer -->
  <?php require('../../src/components/footer.php'); ?>

  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Изменение данных пользователя</h2>
                <?php
                $id_user = $_COOKIE['user_id'];
                $tel = $_POST['one_lesson1'];
                $name = $_POST['one_lesson2'];
                $last_name = $_POST['one_lesson3'];
                $data = $_POST['one_lesson4'];

                $server = "localhost";
                $username = "root";
                $password = "00g65O2317";
                $database = "myself_progress_bd";

                $conn = mysqli_connect($server, $username, $password, $database);

                if (!$conn) {
                  die("<script>alert('Connection Failed.')</script>");
                }
                $sql1 = "SELECT * FROM `users` WHERE id_user = $id_user";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                ?>
                <form id="chData" method="POST" class="needs-validation" novalidate>
                  <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $row1['name']; ?>">
                    <label class="form-label" for="mailAuth">Имя</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $row1['last_name']; ?>">
                    <label class="form-label" for="passAuth">Фамилия</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="date" id="data" name="data" class="form-control" value="<?php echo $row1['date_birthday']; ?>">
                    <label class="form-label" for="passAuth">Дата рождения</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="tel" id="tel" name="tel" class="form-control" value="<?php echo $row1['number_phone']; ?>">
                    <label class="form-label" for="passAuth">Номер телефона</label>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button id="btn_ch_data" type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Изменить</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!--alert good-->
    <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
      <div id="liveToast" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
          Данные обновлены!
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
  <!-- snow -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script>
    $(document).ready(function() {
      $(document).on("click", "#btn_ch_data", function(e) {
        e.preventDefault();
        var serializeFormData = $('#chData').serialize();
        serializeFormData = serializeFormData.toString();
        $.ajax({
          url: "../../assets/php/changeUserData.php",
          type: "POST",
          data: serializeFormData,
          success: function(data) {

            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }

            $('#liveToast').toast('show');
          }
        });
      });
    });
  </script>
</body>
</html>