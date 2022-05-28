<!DOCTYPE html>
<html lang="en">

  <!-- Header -->
  <?php require('../../src/components/head.php'); ?>

<style>
  #message {
    display: none;
    background: #f1f1f1;
    border-radius: 10px;
    color: #000;
    position: relative;
    padding-left: 15px;
    margin-top: 5px;
  }
  #message p {
    padding: 0 25px;
  }
  /* Add a green text color and a checkmark when the requirements are right */
  .valid {
    color: green;
  }
  .valid:before {
    position: relative;
    left: -35px;
    content: "✔";
  }
  /* Add a red text color and an "x" when the requirements are wrong */
  .invalid {
    color: red;
  }
  .invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
  }
</style>

<body style='overflow-x:hidden; background-color: #d4d4d4' id="snow-animation-container">
  <section class="vh-100 gradient-custom" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Регистрация</h3>
              <form id="regForm" action="/assets/php/reg.php" class="needs-validation" method="post" novalidate>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" class="form-control" id="firstNameReg" name="firstNameReg" required>
                      <label class="form-label" for="firstNameReg">Имя</label>
                      <div class="invalid-feedback">
                        Пожалуйста, введите имя!
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="lastNameReg" id="lastNameReg" class="form-control" required>
                      <label class="form-label" for="lastNameReg">Фамилия</label>
                      <div class="invalid-feedback">
                        Пожалуйста, введите фамилию!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                      <input type="date" name="birthdayDateReg" class="form-control" id="birthdayDateReg" required>
                      <label for="birthdayDateReg" class="form-label">Дата рождения</label>
                      <div class="invalid-feedback" style="margin-top: 2px">
                        Пожалуйста, введите дату рождения!
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <select class="form-select" name="maleReg" id="maleReg" required aria-label="select example">
                      <option value="">Укажите ваш пол</option>
                      <option value="Мужской">Мужской</option>
                      <option value="Женский">Женский</option>
                      <option value="Другое">Другое</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                      <input type="email" name="emailReg" class="email form-control" id="emailReg" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                      <label class="form-label" for="emailReg">Почта</label>
                      <div class="invalid-feedback feedback-pos">
                        Пожалуйста, введите почту!
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                      <input type="tel" id="phoneNumberReg" name="phoneNumberReg" class="form-control" required>
                      <label class="form-label" for="phoneNumberReg">Номер телефона</label>
                      <div class="invalid-feedback">
                        Пожалуйста, введите номер телефона!
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 pb-4">
                    <select class="form-select" id="universityReg" name="universityReg" required aria-label="select example">
                      <option value="">Укажите ваш ВУЗ</option>
                      <option value="ТПУ">ТПУ</option>
                      <option value="ТГУ">ТГУ</option>
                      <option value="ТГАСУ">ТГАСУ</option>
                      <option value="ТУСУР">ТУСУР</option>
                      <option value="ТПГУ">ТПГУ</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 ">
                    <div class="form-outline mb-4">
                      <input type="password" name="passwordReg" id="passwordReg" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                      <label class="form-label" for="passwordReg">Пароль</label>
                    </div>
                    <div id="message">
                      <p>Пароль должен содержать:</p>
                      <p id="letter" class="invalid">Хотя бы одну <b>маленькую</b> букву</p>
                      <p id="capital" class="invalid">Хотя бы одну <b>заглавную</b> букву</p>
                      <p id="number" class="invalid">Хотя бы одну <b>цифру</b></p>
                      <p id="length" class="invalid">Минимум <b>8 символов</b></p>
                    </div>
                  </div>
                  <div class="mt-4 pt-2 text-center">
                    <input class="btn btn-primary btn-lg" id="btn_reg" type="submit" value="Зарегистрироваться" />
                    <p class="text-center text-muted mt-5 mb-0">Уже есть аккаунт? <a href="./auth.php" class="fw-bold text-body"><u>Авторизуйся! </u></a></p>
                  </div>
                  <div id="textWarning" class="textWarning text-center mt-4 pt-2">
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="goodModal" tabindex="-1" role="dialog" aria-labelledby="goodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Вы зарегистрировались!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>На вашу электронную почту направленно письмо, содержащее ссылку на подтверждение регистрации. Перейдите по этой ссылки для завершения регистрации.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="errModal" tabindex="-1" role="dialog" aria-labelledby="errModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Что-то пошло не так...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Обратитесь к администратору проекта. Заранее спасибо.</p>
        </div>
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    var myInput = document.getElementById("passwordReg");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");



    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {


      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    };
  </script>
</body>
</html>