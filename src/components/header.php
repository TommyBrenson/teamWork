<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://myselfprogress/">
        <i class="fa fa-globe" aria-hidden="true"></i> MySelf Progress
    </a>

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-angle-double-down"></i>
    </button>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">TO-DO</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="http://myselfprogress/src/pages/taskStudy.php">TO-DO по учебе</a></li>
                    <li><a class="dropdown-item" href="http://myselfprogress/src/pages/task.php">TO-DO вне учебы</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link ">Календарь</a></li> <!--href="http://myselfprogress/src/pages/plans.php" -->
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">ВУЗ</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item">Расписание</a></li>  href="http://myselfprogress/src/pages/rasp.php"
                    <li><a class="dropdown-item" href="#">Домашка</a></li>
                    <li><a class="dropdown-item" href="#">Оценки</a></li>
                </ul>
            </li> -->
            <!-- <li class="nav-item"><a href="#" class="nav-link">Бюджет</a></li> -->
            <li class="nav-item"><a href="http://myselfprogress/src/pages/zametki.php" class="nav-link">Заметки</a></li>
        </ul>
        <ul class="navbar-nav">
        <?php
        if($_COOKIE['user_id']){
            echo' <li class="nav-item"><a href="http://myselfprogress/assets/php/exit.php" class="nav-link ">Выйти</a></li>';
        }
        ?>
        </ul>
    </div>
    </nav>
</header>

