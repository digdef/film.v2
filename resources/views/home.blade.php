@extends('layouts.app')

@section('content')


<div id="main">
    <article style="display: inline-block;">
        <div class="avatar">
            <img style="min-width: 210" id="index_img"  src="img/avatar/"></p>
            <button class="btn btn-primary" name="name" data-toggle="modal" data-target="#exampleModal">
                Изменить Аватрар
            </button>
            <a class="btn btn-primary" href='includes\exit.php'>
                <i class="fas fa-sign-out-alt"></i>
            </a></p>
            <input class="btn btn-primary" type="submit" name="do_signup" value="Подписки" data-toggle="modal" data-target="#exampleModal2">
        </div>
        <div class="text">
				<span id="name">
                    {{ Auth::user()->name }}<br>
                    {{ Auth::user()->email }}<br>
				</span></p>

            <div>
                <form class="box-settings" action="account.php" method="POST">
                    <h2>Настройки</h2>
                    <input type="text" name="name" placeholder="Изменить Имя" value="<? echo @$data['name'] ?>">
                    <input id="btn" type="submit" name="update_name" value="Изменить">

                    <input type="email" name="email" placeholder="Изменить Email" value="<? echo @$data['email'] ?>">
                    <input id="btn" type="submit" name="update_email" value="Изменить">

                    <input minlength="7" type="password" name="password" placeholder="Изменить Пароль" value="<? echo @$data['password'] ?>">
                    <input minlength="7" type="password" name="password_2" placeholder="Подтвердите Пароль" value="<? echo @$data['password_2'] ?>"><br>
                    <input id="btn"  type="submit" name="update_password" value="Изменить">
                </form>
            </div>
        </div>
    </article>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="brm" class="box" action="account.php" method="POST">
                <h1>Изменить Аватар</h1>
                <p>
                    <button class="btn btn-link" type="submit" name="do_avatar1">
                        <img style="max-width: 200px" src="img/avatar/avatar1.png">
                    </button>
                    <button class="btn btn-link" type="submit" name="do_avatar2">
                        <img style="max-width: 200px" src="img/avatar/avatar2.png">
                    </button>
                    <button class="btn btn-link" type="submit" name="do_avatar3">
                        <img style="max-width: 200px" src="img/avatar/avatar3.png">
                    </button>
                </p>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id="brm" class="box" action="account.php" method="POST">
                <h1>Подписки</h1>
               <?/*
                while ($sub=mysqli_fetch_array($subscriptions)){
                $sub1=$sub['subscription'];
                $film = mysqli_query($connection, "SELECT * FROM `film` WHERE `title`='$sub1' ORDER BY `id`");
                $mov = mysqli_fetch_assoc($film);
                ?>
                <a id="link1" href="film.php?id=<?php echo $mov['id'];?>"><? echo $sub['subscription']?></a><br>
                <? } */?>
            </form>
        </div>
    </div>
</div>
@endsection
