<!-- Check Auth -->
<?php if (!$_COOKIE['user_id']) {
  header('Location: /src/pages/auth.php');
} ?>

<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">
<!-- Head -->
<?php require('src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4' id="snow-animation-container">

  <!-- Header -->
  <?php require('src/components/header.php'); ?>

  <!-- Footer -->
  <?php require('src/components/footer.php'); ?>

  <div class="containermain" style="margin-top: 20px;">
    <div class="row">
      <div class="col-md-4">
        <div class="d-flex justify-content-center">
          <div class="card" style="width: 100%; margin-left: 10px;">
            <!--img-->
            <div class="card-body">
              <h5 class="card-title">Информация о пользователе</h5>
              <p class="card-text">Чтобы просмотреть полную информацию, перейдите в боковое меню.</p>
            </div>
            <ul class="list-group list-group-flush">

              <?php
              if ($_COOKIE['user_id']) {
                $user_id = $_COOKIE['user_id'];
                $mysql = new mysqli('localhost', 'root', '00g65O2317', 'myself_progress_bd');
                $result = $mysql->query("SELECT * FROM `users` WHERE `id_user`=$user_id");

                $user = $result->fetch_assoc();
                $age = floor((time() - strtotime($user['date_birthday'])) / (60 * 60 * 24 * 365.25));
                echo '
            

                <li class="list-group-item">Имя: ' . $user['name'] . '</li>
                <li class="list-group-item">Фамилия: ' . $user['last_name'] . '</li>
                <li class="list-group-item">Возраст: ' . $age . ' лет</li>

            
                ';
              } ?>
            </ul>
            <div class="card-body">

              <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Профиль</button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                  <h5 id="offcanvasRightLabel">Профиль</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
                </div>
                <div class="offcanvas-body">

                  <div class="container-fluid d-flex justify-content-center align-items-center p-0">
                    <div class="text-center" style="background-image: url('./uploads/<?php echo $user['img']; ?>'); width: 150px; height: 150px; background-position: center;  background-size: cover; border-radius: 80px;">
                    </div>
                  </div>
                  <div class="text-center">

                    <button type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModalUpload">Изменить фото</button>
                  </div>

                  <div class="text-center mt-5">


                    <div class="card bg-c-pink order-card mb-2">
                      <div class="card-block">
                        <h6 class="m-b-20">Имя</h6>
                        <h5 class="text-muted f-w-400"><?php echo $user['name']; ?></h5>
                      </div>
                    </div>

                    <div class="card bg-c-pink order-card mb-2">
                      <div class="card-block">
                        <h6 class="m-b-20">Фамилия</h6>
                        <h5 class="text-muted f-w-400"><?php echo $user['last_name']; ?></h5>
                      </div>
                    </div>

                    <div class="card bg-c-pink order-card mb-2">
                      <div class="card-block">
                        <h6 class="m-b-20">Дата рождения</h6>
                        <h5 class="text-muted f-w-400"><?php echo $user['date_birthday']; ?></h5>
                      </div>
                    </div>


                    <div class="card bg-c-pink order-card mb-2  ">
                      <div class="card-block">
                        <h6 class="m-b-20">Номер телефона</h6>
                        <h5 class="text-muted f-w-400"><?php echo $user['number_phone']; ?></h5>
                      </div>
                    </div>


                    <div class="card bg-c-pink order-card">
                      <div class="card-block">
                        <h6 class="m-b-20">Почта</h6>
                        <h5 class="text-muted f-w-400"><?php echo $user['mail']; ?></h5>
                      </div>
                    </div>

                    <div class="text-center mt-4">
                      <a href="./src/pages/changeDataUser.php"><button type="button" class="btn btn-dark">Изменить данные</button></a>
                    </div>

                  </div>

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card" style="width: 100%; margin-left: 10px; height: 100%">
          <div class="card-body">
            <div class="row">
              <div class="d-flex justify-content-center">
                <div class="col-md-5" style="width: 100%; min-height: 250px" id="myChart"></div>
                <div class="col-md-5" style="width: 100%; min-height: 250px" id="myChart2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


  </div>


  <!--Modal Upload-->
  <div class="modal fade" id="exampleModalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalUploadLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalUploadLabel">Загрузите изображение</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="errorMs"></p>
          <form action="upload.php" id="form" method="post" enctype="multipart/form-data">

            <input type="file" id="myImage">

          </form>
          <div class="gallery">
            <img src="./uploads/default.png" style="width: 200px; margin-top:20px" id="preImg">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="submit" id="submitUpload" value="Upload" class="btn btn-primary">Сохранить</button>
        </div>
      </div>
    </div>
  </div>




  <div class="containermain" style="margin-top: 20px;">
    <div class="row">

      <div class="col-md-4">
        <div class="d-flex justify-content-center">
          <div class="card" style="width: 100%; margin-left: 10px;">
            <!--img-->
            <div class="card-body">
              <h5 class="card-title">Список оставшихся задач</h5>
              <p class="card-text">В данном блоке содержуться некоторые задачи из вашего списка дел... Не откладывай их на потом!</p>
            </div>
            <form method="post">
              <ul id="haveTaskMain" class="list-group list-group-flush" style="overflow: auto; max-height:27vh;margin-left: 25px;">



              </ul>
            </form>
            <div class="card-body">
              <a href="./src/pages/task.php" class="card-link">Перейти к полному списку задач</a>
              <a href="./src/pages/taskStudy.php" class="card-link">Посмотреть задачи по учебе</a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mt-2 mb-7">
            <div class="card" style=" margin-left: 10px">
              <div class="card-body">


                <h5 class="card-title">Рейтинг пользователей</h5>
                <div class="row">


                  <style>
                    .table-wrap {
                      max-width: 1000px;
                      margin: 0 auto;
                    }

                    .table-wrap .table {
                      border: 5px solid SlateGray;
                      min-width: 100px;
                    }

                    @-moz-document url-prefix() {
                      fieldset {
                        display: table-cell;
                      }
                    }

                    .table-wrap thead tr {
                      background: SlateGray !important;
                      color: WhiteSmoke;
                    }

                    .table-wrap tfoot tr {
                      background: SlateGray !important;
                      color: WhiteSmoke;
                    }

                    .table-wrap td,
                    th {
                      padding-top: 1em !important;
                      padding-bottom: 1em !important;
                      border: 0px !important;
                      vertical-align: middle !important;
                    }

                    .table-wrap tfoot td,
                    tfoot th {
                      padding: 1em !important;
                    }

                    .table-wrap th {
                      font-family: 'Black Ops One', cursive;
                    }

                    .table-wrap tr {
                      font-family: 'Boogaloo', cursive;
                      font-size: 1.5em;
                      color: SlateGray;
                    }

                    .table-wrap tr td:nth-child(1) {
                      padding-left: 1.5em !important;
                    }

                    tr td:nth-child(2) {
                      padding-left: 0em !important;
                    }

                    .table-wrap tr td:nth-child(3) {
                      text-align: right;
                      width: 60%;
                      padding-right: 1.5em !important;
                    }

                    .table-wrap tr th:nth-child(1) {
                      padding-left: 1.5em !important;
                    }

                    .table-wrap tr th:nth-child(2) {
                      padding-left: 0em !important;
                    }

                    .table-wrap tr th:nth-child(3) {
                      text-align: right;
                      width: 20%;
                      padding-right: 1.5em !important;
                    }

                    .table-wrap .circle {
                      font-family: 'Black Ops One', cursive;
                      font-size: 1.5em;
                      width: 45px !important;
                      height: 45px !important;
                      background: DimGray;
                      color: white;
                      display: table-cell;
                      vertical-align: middle;
                      text-align: center;
                      border-radius: 100%;
                    }

                    .table-wrap .first {
                      background: Coral;
                    }

                    .table-wrap .second {
                      background: Goldenrod;
                    }

                    .table-wrap .third {
                      background: Grey;
                    }
                  </style>

                  <div class="table-wrap">
                    <div class="table-responsive">

                      <table class="table">
                        <thead>
                          <tr>
                            <th>Ранг </th>
                            <th colspan="2">Имя</th>
                            <th>Кол-во задач</th>
                          </tr>
                        </thead>
                        <tbody>


                          <?php

                          $mysql1 = new mysqli('localhost', 'root', '00g65O2317', 'myself_progress_bd');
                          $result11 = $mysql1->query("SELECT * FROM `rating_users` ORDER BY `count_success_task` DESC");


                          $i = 1;
                          $array = array();
                          while (($i != 5) && ($row = mysqli_fetch_assoc($result11))) {

                            $arrya[$i] = $row['id_user'];

                            $i = $i + 1;
                          }

                          $one = $arrya[1];
                          $two = $arrya[2];
                          $three = $arrya[3];
                          $four = $arrya[4];


                          $result111 = $mysql1->query("SELECT * FROM `users` WHERE `id_user` = $one");
                          $result111dop = $mysql1->query("SELECT * FROM `rating_users` WHERE `id_user` = $one");


                          $result14 = $mysql1->query("SELECT * FROM `users` WHERE `id_user` = $four");


                          $row111 = mysqli_fetch_assoc($result111);
                          $row111dop = mysqli_fetch_assoc($result111dop);
                          ?>


                          <tr>
                            <td>
                              <div class="circle second">
                                1
                              </div>
                            </td>
                            <td colspan="2"><?php echo $row111['name'];
                                            echo " ";
                                            echo $row111['last_name']; ?></td>
                            <td><?php echo $row111dop['count_success_task']; ?></td>
                          </tr>

                          <?php

                          $result12 = $mysql1->query("SELECT * FROM `users` WHERE `id_user` = $two");
                          $result12dop = $mysql1->query("SELECT * FROM `rating_users` WHERE `id_user` = $two");

                          $row12 = mysqli_fetch_assoc($result12);
                          $row12dop = mysqli_fetch_assoc($result12dop);

                          ?>


                          <tr>
                            <td>
                              <div class="circle third">
                                2
                              </div>
                            </td>
                            <td colspan="2"><?php echo $row12['name'];
                                            echo " ";
                                            echo $row12['last_name']; ?></td>
                            <td><?php echo $row12dop['count_success_task']; ?></td>
                          </tr>

                          <?php

                          $result13 = $mysql1->query("SELECT * FROM `users` WHERE `id_user` = $three");
                          $result13dop = $mysql1->query("SELECT * FROM `rating_users` WHERE `id_user` = $three");

                          $row13 = mysqli_fetch_assoc($result13);
                          $row13dop = mysqli_fetch_assoc($result13dop);


                          ?>

                          <tr>
                            <td>
                              <div class="circle first">
                                3
                              </div>
                            </td>
                            <td colspan="2"><?php echo $row13['name'];
                                            echo " ";
                                            echo $row13['last_name']; ?></td>
                            <td><?php echo $row13dop['count_success_task']; ?></td>
                          </tr>

                          <?php

                          $result14 = $mysql1->query("SELECT * FROM `users` WHERE `id_user` = $four");
                          $result14dop = $mysql1->query("SELECT * FROM `rating_users` WHERE `id_user` = $four");

                          $row14 = mysqli_fetch_assoc($result14);
                          $row14dop = mysqli_fetch_assoc($result14dop);

                          ?>

                          <tr>
                            <td>
                              <div class="circle">
                                4
                              </div>
                            </td>
                            <td colspan="2"><?php echo $row14['name'];
                                            echo " ";
                                            echo $row14['last_name']; ?></td>
                            <td><?php echo $row14dop['count_success_task']; ?></td>
                          </tr>

                        </tbody>
                      </table>

                    </div><!-- ./table-responsive -->
                  </div><!-- ./table-wrap -->


                </div><!-- ./row -->


              </div>
            </div>
          </div>
        </div>

      </div>


      <div class="col-md-3">
        <div class="d-flex justify-content-center">
          <div class="card" style="width: 100%; margin-left: 10px;">
            <!--img-->
            <div class="card-body">
              <h5 class="card-title">Расписание</h5>
              <p class="card-text">Завтра у тебя будут следующие пары... Смотри не проспи)</p>
            </div>

            <div class="card-body">

              <?php

              $id_user = $_COOKIE['user_id'];

              $server = "localhost";
              $username = "root";
              $password = "00g65O2317";
              $database = "myself_progress_bd";
              $conn = mysqli_connect($server, $username, $password, $database);


              $n = date("w", mktime(0, 0, 0, date("m"), date("d"), date("Y"))); // День недели возвращается в виде числа (0=Воскресенье, 1=Понедельник и т.д.)

              $ddate =  date('Y-m-d');
              $duedt = explode("-", $ddate);
              $date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
              $week  = (int)date('W', $date);


              if (($week % 2) == 0) {
                $type = 'Четная';
              } else {
                $type = 'Нечетная';
              }


              if ($n == 0) {
                $sql1 = "SELECT * FROM `lesson_monday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }
              if ($n == 1) {
                $sql1 = "SELECT * FROM `lesson_tuesday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }
              if ($n == 2) {
                $sql1 = "SELECT * FROM `lesson_wednesday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }
              if ($n == 3) {
                $sql1 = "SELECT * FROM `lesson_thursday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }
              if ($n == 4) {
                $sql1 = "SELECT * FROM `lesson_friday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }
              if ($n == 5) {
                $sql1 = "SELECT * FROM `lesson_saturday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }
              if ($n == 6) {
                $sql1 = "SELECT * FROM `lesson_sunday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
                $result1 = mysqli_query($conn, $sql1);
              }


              $sqltime = "SELECT * FROM `lesson_time` WHERE `id_user`= $id_user";
              $resulttime = mysqli_query($conn, $sqltime);




              while ($row = mysqli_fetch_assoc($result1)) {
                while ($time = mysqli_fetch_assoc($resulttime)) {
              ?>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Время</th>
                        <th scope="col">Предмет</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td><?php echo $time['one_lesson']; ?></td>
                        <td><?php echo $row['one_lesson']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td><?php echo $time['two_lesson']; ?></td>
                        <td><?php echo $row['two_lesson']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td><?php echo $time['three_lesson']; ?></td>
                        <td><?php echo $row['three_lesson']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td><?php echo $time['four_lesson']; ?></td>
                        <td><?php echo $row['four_lesson']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td><?php echo $time['five_lesson']; ?></td>
                        <td><?php echo $row['five_lesson']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td><?php echo $time['six_lesson']; ?></td>
                        <td><?php echo $row['six_lesson']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td><?php echo $time['seven_lesson']; ?></td>
                        <td><?php echo $row['seven_lesson']; ?></td>
                      </tr>

                    </tbody>
                  </table>

              <?php
                }
              }
              ?>
              <a href="./src/pages/rasp.php" class="card-link">Перейти к расписанию</a>

            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4" style="margin-bottom: 70px;">
        <div class="d-flex justify-content-center">
          <div class="card" style="width: 100%; margin-left: 10px;">
            <!--img-->
            <div class="card-body">
              <h5 class="card-title">Расходы</h5>
              <p class="card-text">В данном блоке содержиться статистика о твоих расходах за последнии несколько месяцев.</p>
            </div>
            <div class="card-body">
              <div class=" ct-chart ct-square chartjs-render-monitor"></div>

            </div>
          </div>
        </div>
      </div>




    </div>

  </div>



  </div>












  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.14/highcharts.js"></script>
  <script src="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.min.js"></script>





  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>

  <!-- snow -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>


  <script>
    $(document).ready(function() {
      var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [
          [5, 4, 3, 7, 5, 1, 3, 4, 5, 1, 6, 8]
        ]
      };
      var options = {
        seriesBarDistance: 15
      };
      var responsiveOptions = [
        ['screen and (min-width: 300px) and (max-width: 500px)', {
          seriesBarDistance: 10,
          axisX: {
            labelInterpolationFnc: function(value) {
              return value;
            }
          }
        }],
        ['screen and (max-width: 400px)', {
          seriesBarDistance: 5,
          axisX: {
            labelInterpolationFnc: function(value) {
              return value[0];
            }
          }
        }]
      ];
      new Chartist.Bar('.ct-chart', data, {
        showPoint: true,
      });
    });
  </script>


  <?php

  $id_user = $_COOKIE['user_id'];


  $server = "localhost";
  $username = "root";
  $password = "00g65O2317";
  $database = "myself_progress_bd";

  $conn = mysqli_connect($server, $username, $password, $database);

  if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
  }


  $sql = "SELECT * FROM `task` WHERE `id_user`= $id_user AND `ready_task` = 0";
  $result = mysqli_query($conn, $sql);

  $sql1 = "SELECT * FROM `task` WHERE `id_user`= $id_user AND `ready_task` = 1";
  $result1 = mysqli_query($conn, $sql1);

  $sql2 = "SELECT * FROM `taskstudy` WHERE `id_user`= $id_user AND `ready_task` = 0";
  $result2 = mysqli_query($conn, $sql2);

  $sql12 = "SELECT * FROM `taskstudy` WHERE `id_user`= $id_user AND `ready_task` = 1";
  $result12 = mysqli_query($conn, $sql12);



  $countNotReady = mysqli_num_rows($result) + mysqli_num_rows($result2);
  $countReady = mysqli_num_rows($result1) + mysqli_num_rows($result12);



  ?>



  <script>
    var ready = <?php echo $countReady; ?>;
    var noready = <?php echo $countNotReady; ?>;

    $('#myChart2').highcharts({
      chart: {
        type: 'pie'
      },
      title: {
        text: 'Задачи'
      },
      xAxis: {
        type: 'category'
      },
      credits: {
        enabled: false
      },
      legend: {
        enabled: false
      },

      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true,
          }
        }
      },

      series: [{
        name: 'Задачи ',
        colorByPoint: true,
        data: [{
          name: 'Выполнено',
          y: ready,
          drilldown: 'u'
        }, {
          name: 'Не выполнено',
          y: noready,
          drilldown: 'un'
        }]
      }],
    });


    $('#myChart').highcharts({
      chart: {
        type: 'pie'
      },
      title: {
        text: 'Бюджет'
      },
      xAxis: {
        type: 'category'
      },
      credits: {
        enabled: false
      },
      legend: {
        enabled: false
      },

      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true,
          }
        }
      },

      series: [{
        name: 'Потрачено',
        colorByPoint: true,
        data: [{
          name: 'Потрачено',
          y: 5000,
          drilldown: 'u'
        }, {
          name: 'Осталось',
          y: 2000,
          drilldown: 'un'
        }]
      }],
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script>
    $(document).ready(function() {
      // Show Tasks
      function loadTasks() {
        $.ajax({
          url: "./src/pages/task/showTask.php",
          type: "POST",
          success: function(data) {
            $("#haveTaskMain").html(data);
          }
        });

      };
      loadTasks();

      // Remove Task
      $(document).on("click", "#removeBtnNR", function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          url: "./src/pages/task/removetask.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });



      $(document).on("click", "#trashBtnNR", function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          url: "./src/pages/task/trash.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });


    });
  </script>


  <script>
    $(document).ready(function() {

      $("#submitUpload").click(function(e) {
        e.preventDefault();

        let form_data = new FormData();
        let img = $("#myImage")[0].files;

        // Check image selected or not
        if (img.length > 0) {
          form_data.append('my_image', img[0]);

          $.ajax({
            url: '/assets/php/uploadFile/upload.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(res) {
              const data = JSON.parse(res);

              if (data.error != 1) {
                let path = "./uploads/" + data.src;
                $("#preImg").attr("src", path);
                $("#ava").attr("src", path);
                $("#preImg").fadeOut(1).fadeIn(1000);
                $("#myImage").val('');

              } else {
                $("#errorMs").text(data.em);
              }
            }

          });

        } else {
          $("#errorMs").text("Пожалуйста выберите изображение.");
        }
      });

    });
  </script>

</body>

</html>