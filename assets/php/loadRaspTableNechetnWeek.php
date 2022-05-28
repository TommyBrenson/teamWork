<?php
            
    $id_user = $_COOKIE['user_id'];
            $type = "Нечетная";

    $server = "localhost";
    $username = "root";
    $password = "00g65O2317";
    $database = "myself_progress_bd";
    $none = "Не указано";
    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }

            $sql = "SELECT * FROM `lesson_time` WHERE `id_user`= $id_user";
            $result = mysqli_query($conn, $sql);

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
                while ($row = mysqli_fetch_assoc($result)) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                ?>
<table class="table mt-2">
<thead  class="thead-dark">
    <tr>
      <th scope="col">Время</th>
      <th scope="col">Понедельник</th>
      <th scope="col">Вторник</th>
      <th scope="col">Среда</th>
      <th scope="col">Четверг</th>
      <th scope="col">Пятница</th>
      <th scope="col">Суббота</th>
      <th scope="col">Воскресенье</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php if (($row['one_lesson'] != '') &&  ($row['one_lesson'] != '-')) echo $row['one_lesson']; else echo $none;?></th>
      <td><?php echo $row1['one_lesson'];?></td>
      <td><?php echo $row2['one_lesson'];?></td>
      <td><?php echo $row3['one_lesson'];?></td>
      <td><?php echo $row4['one_lesson'];?></td>
      <td><?php echo $row5['one_lesson'];?></td>
      <td><?php echo $row6['one_lesson'];?></td>
      <td>Выходной</td>
    </tr>
    <tr>
      <th scope="row"><?php if (($row['two_lesson'] != '') &&  ($row['two_lesson'] != '-')) echo $row['two_lesson']; else echo $none;?></th>
      <td><?php echo $row1['two_lesson'];?></td>
      <td><?php echo $row2['two_lesson'];?></td>
      <td><?php echo $row3['two_lesson'];?></td>
      <td><?php echo $row4['two_lesson'];?></td>
      <td><?php echo $row5['two_lesson'];?></td>
      <td><?php echo $row6['two_lesson'];?></td>
      <td>Выходной</td>
    </tr>
    <tr>
      <th scope="row"><?php if (($row['three_lesson'] != '') &&  ($row['three_lesson'] != '-')) echo $row['three_lesson']; else echo $none;?></th>
      <td><?php echo $row1['three_lesson'];?></td>
      <td><?php echo $row2['three_lesson'];?></td>
      <td><?php echo $row3['three_lesson'];?></td>
      <td><?php echo $row4['three_lesson'];?></td>
      <td><?php echo $row5['three_lesson'];?></td>
      <td><?php echo $row6['three_lesson'];?></td>
      <td>Выходной</td>
    </tr>
    <tr>
      <th scope="row"><?php if (($row['four_lesson'] != '') &&  ($row['four_lesson'] != '-')) echo $row['four_lesson']; else echo $none;?></th>
      <td><?php echo $row1['four_lesson'];?></td>
      <td><?php echo $row2['four_lesson'];?></td>
      <td><?php echo $row3['four_lesson'];?></td>
      <td><?php echo $row4['four_lesson'];?></td>
      <td><?php echo $row5['four_lesson'];?></td>
      <td><?php echo $row6['four_lesson'];?></td>
      <td>Выходной</td>
    </tr>
    <tr>
      <th scope="row"><?php if (($row['five_lesson'] != '') &&  ($row['five_lesson'] != '-')) echo $row['five_lesson']; else echo $none;?></th>
      <td><?php echo $row1['five_lesson'];?></td>
      <td><?php echo $row2['five_lesson'];?></td>
      <td><?php echo $row3['five_lesson'];?></td>
      <td><?php echo $row4['five_lesson'];?></td>
      <td><?php echo $row5['five_lesson'];?></td>
      <td><?php echo $row6['five_lesson'];?></td>
      <td>Выходной</td>
    </tr>
    <tr>
      <th scope="row"><?php if (($row['six_lesson'] != '') &&  ($row['six_lesson'] != '-')) echo $row['six_lesson']; else echo $none;?></th>
      <td><?php echo $row1['six_lesson'];?></td>
      <td><?php echo $row2['six_lesson'];?></td>
      <td><?php echo $row3['six_lesson'];?></td>
      <td><?php echo $row4['six_lesson'];?></td>
      <td><?php echo $row5['six_lesson'];?></td>
      <td><?php echo $row6['six_lesson'];?></td>
      <td>Выходной</td>
    </tr>
    <tr>
      <th scope="row"><?php if (($row['seven_lesson'] != '') && ($row['seven_lesson'] != '-')) echo $row['seven_lesson']; else echo $none;?></th>
      <td><?php echo $row1['seven_lesson'];?></td>
      <td><?php echo $row2['seven_lesson'];?></td>
      <td><?php echo $row3['seven_lesson'];?></td>
      <td><?php echo $row4['seven_lesson'];?></td>
      <td><?php echo $row5['seven_lesson'];?></td>
      <td><?php echo $row6['seven_lesson'];?></td>
      <td>Выходной</td>
    </tr>
  </tbody>
</table>    
                
                <?php
                }
            
             } }}}}}}
?>