<!DOCTYPE html>
<html lang="en">

  <!-- Header -->
  <?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4' id="snow-animation-container">
  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Авторизация</h2>
                <form method="POST" action="../../assets/php/au.php" class="needs-validation" novalidate>
                  <div class="form-outline mb-4">
                    <input type="email" id="mailAuth" name="mailAuth" class="form-control" required>
                    <label class="form-label" for="mailAuth">Почта</label>
                    <div class="invalid-feedback feedback-pos">
                      Пожалуйста, введите почту!
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="passAuth" name="passAuth" class="form-control" required>
                    <label class="form-label" for="passAuth">Пароль</label>
                    <div class="invalid-feedback feedback-pos">
                      Пожалуйста, введите пароль!
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button id="btn_avtorize" type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Войти</button>
                  </div>
                  <p class="text-center text-muted mt-5 mb-0">Нет аккаунта? <a href="./register.php" class="fw-bold text-body"><u>Зарегистрируйся! </u></a></p>
                  <p class="text-center text-muted mt-3 mb-0">Забыл пароль? <a href="./register.php" class="fw-bold text-body"><u>Восстановить... </u></a></p>
                  <div id="textWarning" class="textWarning text-center mt-4 pt-2">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.14/highcharts.js"></script>
  <script src="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.min.js"></script>
  <script src="https://cdnjs.com/libraries/1000hz-bootstrap-validator"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
  <!-- snow -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
  <script src="../../assets/js/snow.js"></script>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
</body>

</html>