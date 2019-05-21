@extends('layouts.app')

@section('content')


<div id="main">
    <article style="display: inline-block; padding-top: 10px">
        <div class="avatar">
            <img style="min-width: 210" id="index_img"  src="../img/avatar/{{ Auth::user()->avatar }}"></p>
            <button class="btn btn-primary" name="name" data-toggle="modal" data-target="#exampleModal">
                Изменить Аватрар
            </button></p>
            <input class="btn btn-primary" type="submit" name="do_signup" value="Подписки" data-toggle="modal" data-target="#exampleModal2">
        </div>
        <div class="text">
				<span id="name">
                    {{ Auth::user()->name }}<br>
                    {{ Auth::user()->email }}<br>
				</span></p>

            <div>
                <h3 style="text-align: center">Изменить Пароль</h3>
                <form id="form-change-password" role="form" method="POST" action="{{ url('/user/credentials') }}" novalidate class="box-settings">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="password" id="current-password" name="current-password" placeholder="Старый Пароль">

                    <input type="password" id="password" name="password" placeholder="Новый Пароль">

                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Подтвердите Пароль">

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
