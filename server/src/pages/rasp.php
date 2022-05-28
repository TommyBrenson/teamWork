<?php if (!$_COOKIE['user_id']) {header('Location: /src/pages/auth.php');}?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4;' id="snow-animation-container">
  <!-- Header -->
  <?php require('../../src/components/header.php'); ?>

  <!-- Footer -->
  <?php require('../../src/components/footer.php'); ?>

  <!-- Modal -->
  <div class="modal fade" id="changeRaspModal" tabindex="-1" role="dialog" aria-labelledby="changeRaspModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeRaspModalLabel">Изменить время начала и окончания занятий</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Укажите время начала и окончания занятий:</p>
          <hr />
          <form method="post" id="formChangeTime">
            <div class="row">
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

              $sql = "SELECT * FROM `lesson_time` WHERE `id_user`= $id_user";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $rows1 = explode('-', $row['one_lesson']);
                  $rows2 = explode('-', $row['two_lesson']);
                  $rows3 = explode('-', $row['three_lesson']);
                  $rows4 = explode('-', $row['four_lesson']);
                  $rows5 = explode('-', $row['five_lesson']);
                  $rows6 = explode('-', $row['six_lesson']);
                  $rows7 = explode('-', $row['seven_lesson']);
                  echo '
                  <div class="col-12 mt-2"><h6>1 пара:</h6><input name="time" id="time_one_s" type="time" value="' . $rows1[0] . '" /> - <input name="time_one_e" id="time_one_e" type="time" value="' . $rows1[1] . '" /></div>
                  <div class="col-12 mt-2"><h6>2 пара:</h6><input name="time_two_s" id="time_two_s" type="time" value="' . $rows2[0] . '" /> - <input name="time_two_e" id="time_two_e" type="time" value="' . $rows2[1] . '" /></div>
                  <div class="col-12 mt-2"><h6>3 пара:</h6><input name="time_three_s" id="time_three_s" type="time" value="' . $rows3[0] . '" /> - <input name="time_three_e" id="time_three_e" type="time" value="' . $rows3[1] . '" /></div>
                  <div class="col-12 mt-2"><h6>4 пара:</h6><input name="time_four_s" id="time_four_s" type="time" value="' . $rows4[0] . '" /> - <input name="time_four_e" id="time_four_e" type="time" value="' . $rows4[1] . '" /></div>
                  <div class="col-12 mt-2"><h6>5 пара:</h6><input name="time_five_s" id="time_five_s" type="time" value="' . $rows5[0] . '" /> - <input name="time_five_e" id="time_five_e" type="time" value="' . $rows5[1] . '" /></div>
                  <div class="col-12 mt-2"><h6>6 пара:</h6><input name="time_six_s" id="time_six_s" type="time" value="' . $rows6[0] . '" /> - <input name="time_six_e" id="time_six_e" type="time" value="' . $rows6[1] . '" /></div>
                  <div class="col-12 mt-2"><h6>7 пара:</h6><input name="time_seven_s" id="time_seven_s" type="time" value="' . $rows7[0] . '" /> - <input name="time_seven_e" id="time_seven_s" type="time" value="' . $rows7[1] . '" /></div>
                  ';
                }
              }
              ?>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button id="changeTimeLesson" type="button" data-dismiss="modal" class="btn btn-primary">Сохранить</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="changeRaspModalTwo" tabindex="-1" role="dialog" aria-labelledby="changeRaspModalTwoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="width: 1080px;">
        <div class="modal-header">
          <h5 class="modal-title" id="changeRaspModalTwoLabel">Изменить данные расписания</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home-change" role="tab" aria-controls="nav-home" aria-selected="true">Четная неделя</a>
          <a class="nav-item nav-link" id="nav-profile-change-tab" data-toggle="tab" href="#nav-profile-change" role="tab" aria-controls="nav-profile" aria-selected="false">Нечетная неделя</a>
        </div>
        <div class="modal-body">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home-change" role="tabpanel" aria-labelledby="nav-home-tab">
              <?php
              $id_user = $_COOKIE['user_id'];
              $server = "localhost";
              $username = "root";
              $password = "00g65O2317";
              $database = "myself_progress_bd";
              $type = "Четная";

              $conn = mysqli_connect($server, $username, $password, $database);

              if (!$conn) {
                die("<script>alert('Connection Failed.')</script>");
              }

              $sql1 = "SELECT * FROM `lesson_monday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result1 = mysqli_query($conn, $sql1);

              $sql2 = "SELECT * FROM `lesson_tuesday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result2 = mysqli_query($conn, $sql2);

              $sql3 = "SELECT * FROM `lesson_wednesday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result3 = mysqli_query($conn, $sql3);

              $sql4 = "SELECT * FROM `lesson_thursday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result4 = mysqli_query($conn, $sql4);

              $sql5 = "SELECT * FROM `lesson_friday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result5 = mysqli_query($conn, $sql5);

              $sql6 = "SELECT * FROM `lesson_saturday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result6 = mysqli_query($conn, $sql6);

              if (mysqli_num_rows($result) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                      while ($row4 = mysqli_fetch_assoc($result4)) {
                        while ($row5 = mysqli_fetch_assoc($result5)) {
                          while ($row6 = mysqli_fetch_assoc($result6)) {
                            echo '
                          <form method="POST" id="raspDiffTable">
                                <table class="table">
                            <thead  class="thead-dark">
                              <tr>
                                <th scope="col">Понедельник</th>
                                <th scope="col">Вторник</th>
                                <th scope="col">Среда</th>
                                <th scope="col">Четверг</th>
                                <th scope="col">Пятница</th>
                                <th scope="col">Суббота</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input name="one_lesson1" type="text" style="max-width: 100px" value="' . $row1['one_lesson'] . '"></td>
                                <td><input name="one_lesson2" type="text" style="max-width: 100px" value="' . $row2['one_lesson'] . '"></td>
                                <td><input name="one_lesson3" type="text" style="max-width: 100px" value="' . $row3['one_lesson'] . '"></td>
                                <td><input name="one_lesson4" type="text" style="max-width: 100px" value="' . $row4['one_lesson'] . '"></td>
                                <td><input name="one_lesson5" type="text" style="max-width: 100px" value="' . $row5['one_lesson'] . '"></td>
                                <td><input name="one_lesson6" type="text" style="max-width: 100px" value="' . $row6['one_lesson'] . '"></td>

                              </tr>
                              <tr>
                                <td><input name="two_lesson1" type="text" style="max-width: 100px" value="' . $row1['two_lesson'] . '"></td>
                                <td><input name="two_lesson2" type="text" style="max-width: 100px" value="' . $row2['two_lesson'] . '"></td>
                                <td><input name="two_lesson3" type="text" style="max-width: 100px" value="' . $row3['two_lesson'] . '"></td>
                                <td><input name="two_lesson4" type="text" style="max-width: 100px" value="' . $row4['two_lesson'] . '"></td>
                                <td><input name="two_lesson5" type="text" style="max-width: 100px" value="' . $row5['two_lesson'] . '"></td>
                                <td><input name="two_lesson6" type="text" style="max-width: 100px" value="' . $row6['two_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="three_lesson1" type="text" style="max-width: 100px" value="' . $row1['three_lesson'] . '"></td>
                                <td><input name="three_lesson2" type="text" style="max-width: 100px" value="' . $row2['three_lesson'] . '"></td>
                                <td><input name="three_lesson3" type="text" style="max-width: 100px" value="' . $row3['three_lesson'] . '"></td>
                                <td><input name="three_lesson4" type="text" style="max-width: 100px" value="' . $row4['three_lesson'] . '"></td>
                                <td><input name="three_lesson5" type="text" style="max-width: 100px" value="' . $row5['three_lesson'] . '"></td>
                                <td><input name="three_lesson6" type="text" style="max-width: 100px" value="' . $row6['three_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="four_lesson1" type="text" style="max-width: 100px" value="' . $row1['four_lesson'] . '"></td>
                                <td><input name="four_lesson2" type="text" style="max-width: 100px" value="' . $row2['four_lesson'] . '"></td>
                                <td><input name="four_lesson3" type="text" style="max-width: 100px" value="' . $row3['four_lesson'] . '"></td>
                                <td><input name="four_lesson4" type="text" style="max-width: 100px" value="' . $row4['four_lesson'] . '"></td>
                                <td><input name="four_lesson5" type="text" style="max-width: 100px" value="' . $row5['four_lesson'] . '"></td>
                                <td><input name="four_lesson6" type="text" style="max-width: 100px" value="' . $row6['four_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="five_lesson1" type="text" style="max-width: 100px" value="' . $row1['five_lesson'] . '"></td>
                                <td><input name="five_lesson2" type="text" style="max-width: 100px" value="' . $row2['five_lesson'] . '"></td>
                                <td><input name="five_lesson3" type="text" style="max-width: 100px" value="' . $row3['five_lesson'] . '"></td>
                                <td><input name="five_lesson4" type="text" style="max-width: 100px" value="' . $row4['five_lesson'] . '"></td>
                                <td><input name="five_lesson5" type="text" style="max-width: 100px" value="' . $row5['five_lesson'] . '"></td>
                                <td><input name="five_lesson6" type="text" style="max-width: 100px" value="' . $row6['five_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="six_lesson1" type="text" style="max-width: 100px" value="' . $row1['six_lesson'] . '"></td>
                                <td><input name="six_lesson2" type="text" style="max-width: 100px" value="' . $row2['six_lesson'] . '"></td>
                                <td><input name="six_lesson3" type="text" style="max-width: 100px" value="' . $row3['six_lesson'] . '"></td>
                                <td><input name="six_lesson4" type="text" style="max-width: 100px" value="' . $row4['six_lesson'] . '"></td>
                                <td><input name="six_lesson5" type="text" style="max-width: 100px" value="' . $row5['six_lesson'] . '"></td>
                                <td><input name="six_lesson6" type="text" style="max-width: 100px" value="' . $row6['six_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="seven_lesson1" type="text" style="max-width: 100px" value="' . $row1['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson2" type="text" style="max-width: 100px" value="' . $row2['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson3" type="text" style="max-width: 100px" value="' . $row3['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson4" type="text" style="max-width: 100px" value="' . $row4['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson5" type="text" style="max-width: 100px" value="' . $row5['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson6" type="text" style="max-width: 100px" value="' . $row6['seven_lesson'] . '"></td>
                              </tr>
                            </tbody>
                          </table>
                          </form>
                          ';
                          }
                        }
                      }
                    }
                  }
                }
              }
              ?>
            </div>
            <div class="tab-pane fade" id="nav-profile-change" role="tabpanel" aria-labelledby="nav-profile-change-tab">
              <?php

              $id_user = $_COOKIE['user_id'];
              $server = "localhost";
              $username = "root";
              $password = "00g65O2317";
              $database = "myself_progress_bd";
              $type = "Нечетная";

              $conn = mysqli_connect($server, $username, $password, $database);

              if (!$conn) {
                die("<script>alert('Connection Failed.')</script>");
              }

              $sql1 = "SELECT * FROM `lesson_monday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result1 = mysqli_query($conn, $sql1);

              $sql2 = "SELECT * FROM `lesson_tuesday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result2 = mysqli_query($conn, $sql2);

              $sql3 = "SELECT * FROM `lesson_wednesday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result3 = mysqli_query($conn, $sql3);

              $sql4 = "SELECT * FROM `lesson_thursday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result4 = mysqli_query($conn, $sql4);

              $sql5 = "SELECT * FROM `lesson_friday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result5 = mysqli_query($conn, $sql5);

              $sql6 = "SELECT * FROM `lesson_saturday` WHERE `id_user`= $id_user AND `type_week` = '$type'";
              $result6 = mysqli_query($conn, $sql6);

              if (mysqli_num_rows($result) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                      while ($row4 = mysqli_fetch_assoc($result4)) {
                        while ($row5 = mysqli_fetch_assoc($result5)) {
                          while ($row6 = mysqli_fetch_assoc($result6)) {


                            echo '
                          <form method="POST" id="raspDiffTableNechetn">
                                <table class="table">
                            <thead  class="thead-dark">
                              <tr>
                                <th scope="col">Понедельник</th>
                                <th scope="col">Вторник</th>
                                <th scope="col">Среда</th>
                                <th scope="col">Четверг</th>
                                <th scope="col">Пятница</th>
                                <th scope="col">Суббота</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input name="one_lesson1" type="text" style="max-width: 100px" value="' . $row1['one_lesson'] . '"></td>
                                <td><input name="one_lesson2" type="text" style="max-width: 100px" value="' . $row2['one_lesson'] . '"></td>
                                <td><input name="one_lesson3" type="text" style="max-width: 100px" value="' . $row3['one_lesson'] . '"></td>
                                <td><input name="one_lesson4" type="text" style="max-width: 100px" value="' . $row4['one_lesson'] . '"></td>
                                <td><input name="one_lesson5" type="text" style="max-width: 100px" value="' . $row5['one_lesson'] . '"></td>
                                <td><input name="one_lesson6" type="text" style="max-width: 100px" value="' . $row6['one_lesson'] . '"></td>

                              </tr>
                              <tr>
                                <td><input name="two_lesson1" type="text" style="max-width: 100px" value="' . $row1['two_lesson'] . '"></td>
                                <td><input name="two_lesson2" type="text" style="max-width: 100px" value="' . $row2['two_lesson'] . '"></td>
                                <td><input name="two_lesson3" type="text" style="max-width: 100px" value="' . $row3['two_lesson'] . '"></td>
                                <td><input name="two_lesson4" type="text" style="max-width: 100px" value="' . $row4['two_lesson'] . '"></td>
                                <td><input name="two_lesson5" type="text" style="max-width: 100px" value="' . $row5['two_lesson'] . '"></td>
                                <td><input name="two_lesson6" type="text" style="max-width: 100px" value="' . $row6['two_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="three_lesson1" type="text" style="max-width: 100px" value="' . $row1['three_lesson'] . '"></td>
                                <td><input name="three_lesson2" type="text" style="max-width: 100px" value="' . $row2['three_lesson'] . '"></td>
                                <td><input name="three_lesson3" type="text" style="max-width: 100px" value="' . $row3['three_lesson'] . '"></td>
                                <td><input name="three_lesson4" type="text" style="max-width: 100px" value="' . $row4['three_lesson'] . '"></td>
                                <td><input name="three_lesson5" type="text" style="max-width: 100px" value="' . $row5['three_lesson'] . '"></td>
                                <td><input name="three_lesson6" type="text" style="max-width: 100px" value="' . $row6['three_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="four_lesson1" type="text" style="max-width: 100px" value="' . $row1['four_lesson'] . '"></td>
                                <td><input name="four_lesson2" type="text" style="max-width: 100px" value="' . $row2['four_lesson'] . '"></td>
                                <td><input name="four_lesson3" type="text" style="max-width: 100px" value="' . $row3['four_lesson'] . '"></td>
                                <td><input name="four_lesson4" type="text" style="max-width: 100px" value="' . $row4['four_lesson'] . '"></td>
                                <td><input name="four_lesson5" type="text" style="max-width: 100px" value="' . $row5['four_lesson'] . '"></td>
                                <td><input name="four_lesson6" type="text" style="max-width: 100px" value="' . $row6['four_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="five_lesson1" type="text" style="max-width: 100px" value="' . $row1['five_lesson'] . '"></td>
                                <td><input name="five_lesson2" type="text" style="max-width: 100px" value="' . $row2['five_lesson'] . '"></td>
                                <td><input name="five_lesson3" type="text" style="max-width: 100px" value="' . $row3['five_lesson'] . '"></td>
                                <td><input name="five_lesson4" type="text" style="max-width: 100px" value="' . $row4['five_lesson'] . '"></td>
                                <td><input name="five_lesson5" type="text" style="max-width: 100px" value="' . $row5['five_lesson'] . '"></td>
                                <td><input name="five_lesson6" type="text" style="max-width: 100px" value="' . $row6['five_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="six_lesson1" type="text" style="max-width: 100px" value="' . $row1['six_lesson'] . '"></td>
                                <td><input name="six_lesson2" type="text" style="max-width: 100px" value="' . $row2['six_lesson'] . '"></td>
                                <td><input name="six_lesson3" type="text" style="max-width: 100px" value="' . $row3['six_lesson'] . '"></td>
                                <td><input name="six_lesson4" type="text" style="max-width: 100px" value="' . $row4['six_lesson'] . '"></td>
                                <td><input name="six_lesson5" type="text" style="max-width: 100px" value="' . $row5['six_lesson'] . '"></td>
                                <td><input name="six_lesson6" type="text" style="max-width: 100px" value="' . $row6['six_lesson'] . '"></td>
                              </tr>
                              <tr>
                              <td><input name="seven_lesson1" type="text" style="max-width: 100px" value="' . $row1['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson2" type="text" style="max-width: 100px" value="' . $row2['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson3" type="text" style="max-width: 100px" value="' . $row3['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson4" type="text" style="max-width: 100px" value="' . $row4['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson5" type="text" style="max-width: 100px" value="' . $row5['seven_lesson'] . '"></td>
                                <td><input name="seven_lesson6" type="text" style="max-width: 100px" value="' . $row6['seven_lesson'] . '"></td>
                              </tr>
                            </tbody>
                          </table>
                          </form>
                          ';
                          }
                        }
                      }
                    }
                  }
                }
              }
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            <button id="changeRasp" type="button" data-dismiss="modal" class="btn btn-primary">Сохранить</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <section class="vh-100 gradient-custom" style="background-repeat: no-repeat;
    background-position: center;
    background-size: cover; background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="row pt-2">
      <div class="col-md-2">
        <div class="card ml-2">
          <div class="card-body">
            <h5 class="card-title">Навигация</h5>
            <button type="button" class="btn btn-light mt-2" style="width:100%" data-toggle="modal" data-target="#changeRaspModal">Изменить время пар</button>
            <button type="button" class="btn btn-light mt-2" style="width:100%" data-toggle="modal" data-target="#changeRaspModalTwo">Изменить данные расписания</button>
            <button type="button" class="btn btn-light mt-2" style="width:100%" disabled>Сессия</button>
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="card mr-2">
          <div class="card-body">
            <h5 class="card-title">Расписание</h5>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Четная неделя</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Нечетная неделя</a>
            </div>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div id="chetn-rasp">
                </div>
              </div>
              <div class="tab-pane fade mt-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div id="nechetn-rasp">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--alert good-->
        <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
          <div id="liveToast" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
              Расписание обновлено!
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

  <!--Тут AJAX-->
  <script>
    //loadTable
    $(document).ready(function() {
      // Show table
      function loadTableChetn() {
        $.ajax({
          url: "../../assets/php/loadRaspTableChentWeek.php",
          type: "POST",
          success: function(data) {
            $("#chetn-rasp").html(data);
          }
        });
      }

      function loadTableNechetn() {
        $.ajax({
          url: "../../assets/php/loadRaspTableNechetnWeek.php",
          type: "POST",
          success: function(data) {
            $("#nechetn-rasp").html(data);
          }
        });
      }
      loadTableNechetn();
      loadTableChetn();
      $(document).on("click", "#changeTimeLesson", function(e) {
        e.preventDefault();

        var serializeFormData = $('#formChangeTime').serialize();
        serializeFormData = serializeFormData.toString();
        $.ajax({
          url: "../../assets/php/changeTimeDB.php",
          type: "POST",
          data: serializeFormData,
          success: function(data) {
            loadTableNechetn();
            loadTableChetn();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
            $('#liveToast').toast('show');
          }
        });
      });

      $(document).on("click", "#changeRasp", function(e) {
        e.preventDefault();
        var serializeFormData = $('#raspDiffTable').serialize();
        serializeFormData = serializeFormData.toString();
        $.ajax({
          url: "../../assets/php/changeRasp.php",
          type: "POST",
          data: serializeFormData,
          success: function(data) {
            loadTableNechetn();
            loadTableChetn();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
            $('#liveToast').toast('show');
          }
        });
      });

      $(document).on("click", "#changeRasp", function(e) {
        e.preventDefault();
        var serializeFormData = $('#raspDiffTableNechetn').serialize();
        serializeFormData = serializeFormData.toString();
        $.ajax({
          url: "../../assets/php/changeRaspNechet.php",
          type: "POST",
          data: serializeFormData,
          success: function(data) {
            loadTableNechetn();
            loadTableChetn();

            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });
    });
  </script>

</body>
</html>