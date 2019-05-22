<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href={!! URL::asset('css/main.css'); !!}></link>
    <title>Look Later</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a href="/" id="logo" >
		<span>
			Look Later
		</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div style="margin-left: 5%" class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav " id="about">
            <li class="nav-item ">
                <a href="/" class="nav-link">Главная</a>
            </li>
            <li class="nav-item">
                <a href="/home" class="nav-link">Аккаунт</a>
            </li>
            <li class="nav-item">
                <a href="/search" class="nav-link">Поиск</a>
            </li>
        </ul>
        <div class=" mx-auto"></div>
        <form class="search-box " name="search" method="post" action="search">
            {!! csrf_field() !!}
            <input class="search-txt" type="search" name="search" placeholder="Type ro search">
            <button name="submit" type="submit" class="search-btn btn btn-link">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</nav>
<a id="genre-btn" href="#" onclick="toggle('#vipad');">Жанр</a>

<div id="vipad">
    <div id="genre-bar" >
        <p>
            @foreach($categories as $cat)
                <button onclick="location='/categories/{{ $cat->id }}'" id="genre">{{ $cat->categories }}</button>
            @endforeach
        </p>
    </div>
</div>


<div style="padding-top: 20px">
    <div class="container-fluid" id="content">
        <div class="row text-center ">
            <?php
            foreach ($genre as $gen) {
                $films = DB::select("SELECT * FROM `films` WHERE `title` = ? ORDER BY `id`", [$gen->film]);
                foreach($films as $film){
                    ?>
                    <div class="col-xs-2 col-sm-4 col-lg-3 col-xl-2 tile-img">
                        <a href="../film/{{ $film->id }}" id="link">
                            <img src="../img/{{ $film->img }}" class="w-100">
                            <h3>{{ $film->title }}</h3>
                        </a>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript" src={!! URL::asset('js/genre.js'); !!}></script>
</body>
</html>