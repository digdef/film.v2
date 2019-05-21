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
				<a href="../home" class="nav-link">Аккаунт</a>
			</li>
			<li class="nav-item">
				<a href="../search" class="nav-link">Поиск</a>
			</li>
		</ul>
		<div class=" mx-auto"></div>
		<form class="search-box " name="search" method="post" action="search.php">
			<input class="search-txt" type="search" name="search" placeholder="Type ro search">
			<button name="submit" type="submit" class="search-btn btn btn-link">
				<i class="fas fa-search"></i>
			</button>
		</form>
	</div>
</nav>
	<div style="text-align: center;">
		<h2 style="padding-top: 10px">{{ $film->title }}</h2>
	</div>
	<!--<div class="container p-1">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe src="{{ $film->trailer }}" class="embed-responsive-item" allowfullscreen></iframe>
		</div>
	</div>-->

	<div style="padding-top: 2%" id="main">
		<article style="display: inline-block;">
			<div class="intro">
				<img  id="index_img"  src="../img/{{ $film->img }}" ></p>
				@if(\Auth::check())
					<div>
						<form action="{!! route('subscription') !!}" method="POST">
							{!! csrf_field() !!}
							<input type="hidden" value="{{ $film->title }}" name="subscription" placeholder="Комментарий">
							<button type="submit" style="margin: 0px;" id="btn">Подписаться</button>
						</form>
					</div>
				@endif
			</div>
			<div class="text">
				<span>
					{{ $film->text }}
				</span>
			</div>
			<div class="text">
				<span>
					Дата выхода:
					{{ $film->date }}<br>
					Жанр:

				</span>
			</div>
		</article>
	</div>
	<div class="container">

		@if(\Auth::check())
			<div class="box-comment">
				<form action="{!! route('comment.add') !!}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" value="{{ $film->id }}" name="film_id" placeholder="Комментарий">
					<input type="text" name="text" placeholder="Комментарий">
					<button type="submit"><i class="far fa-paper-plane"></i></button>
				</form>
			</div>
		@endif

		<div class="container" style="display: inline-block;">

			@if ($count_comments)
				<div id="comment">
					<div style="text-align: center; width: 100%" id="comment1">
						<h3>Нет Комментариев!</h3>
					</div>
				</div>
			@endif

			@foreach ($comments as $comment)
					<div id="comment">
						<div>
							<div style="text-align: center;">
								<span>{{ $comment->nick }}</span>
							</div>
							<img id="avatar_img" src="../img/avatar/{{ $comment->avatar }}"></p>
						</div>
						<div id="comment1">
							<span>{{ $comment->text }}</span>
						</div>
					</div>
			@endforeach
			
		</div>
	</div>
	<footer id="faq-main">
		<div>
			<span class="title"><a id="link" href="includes/about.html">About</a></span><br>
		</div>
		<div>
			<span class="title"><a id="link" href="includes/Holders.html">Holders</a></span><br>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>