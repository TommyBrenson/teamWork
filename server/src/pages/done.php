</html>
<!DOCTYPE html>
<html lang="en">

  <!-- Header -->
  <?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4' id="snow-animation-container">
    <?php
    $dbUser = 'root';
    $dbName = 'myself_progress_bd';
    $dbPass = '00g65O2317';
    $mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName);
    $query = "set names utf8";
    $mysqli->query($query);
    $query = "update valid_register set token = '1' where token = '$_GET[special]';";
    $results = $mysqli->query($query);
    ?>

    <section class="vh-100 gradient-custom" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="row  justify-content-center">
            <div class="col-md-8" style="margin-top:5%;">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Спасибо большое за регистрацию!</h4>
                    <p>Вы успешно подтвердили свой аккаунт. Можете перейти на страницу авторизации и войти в свой аккаунт...</p>
                    <a href="./auth.php"><button type="button" class="btn btn-success">Войти в аккаунт</button></a>


                    <hr>
                    <p class="mb-0">Если у вас возникли проблемы с регистрацией или авторизацией в приложении, обратитесь к администратору сайта.</p>
                </div>
            </div>
        </div>
    </section>

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
</body>
</html>