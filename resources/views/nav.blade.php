<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Справочник для программиста по языкам программирования</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->
                <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}" />-->
		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
                
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('css/ie9.css') }}" /><![endif]-->
                
                <!-- Scripts -->
			<script src="{{ asset('js/jquery.min.js') }}"></script>
			<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('js/jquery.scrollzer.min.js') }}"></script>
			<script src="{{ asset('js/skel.min.js') }}"></script>
			<script src="{{ asset('js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
			<script src="{{ asset('js/main.js') }}"></script>
                        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                        <script src="{{ asset('js/ajax.js') }}"></script>
                        
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
	</head>
        <body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo"><a href="/">
							<!-- <span class="image avatar48"><img src="{{ asset('images/avatar.jpg') }}" alt="" /></span>-->
							<h1 id="title">Справочник для программиста</h1>
							<p>по языкам программирования</p>
						</a></div>
                                        
                                        <!-- ComboBox -->
                                        
                                            <form class="fpl" method="post" action="/page">
                                                <select onchange="this.form.submit()" name="pl" class="pl">
                                                    <option hidden disabled selected>{{ isset($record) ? $record->name : 'Выберите язык' }}</option>
                                                    @if(isset($records))
                                                        @foreach($records as $recordlist) 
                                                        <option value="{{ $recordlist->name }}">{{ $recordlist->name }}</option>
                                                        @endforeach
                                                    @endif
						</select>
                                                {{ csrf_field() }}
                                            </form>
                                        
					<!-- Nav -->
						<nav id="nav">
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
                                                        <ul>
                                                            @if(isset($record) || URL::current() == 'http://handbook-for-programmer.gor/add/page')
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-info-circle">О языке</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-edit">Синтаксис</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-sitemap">Структура</span></a>
                                                                    <!--<ul>
                                                                        <li><a href="#" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-sitemap">Структура1</span></a></li>
                                                                        <li><a href="#" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-sitemap">Структура2</span></a></li>
                                                                        <li><a href="#" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-sitemap">Структура3</span></a></li>
                                                                    </ul>-->
                                                                </li>
								<!--<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact</span></a></li>-->
                                                            @else
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Добро пожаловать</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-question">Куда Вы попали?</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-info">Что здесь делать?</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Отправить сообщение</span></a></li>
                                                            @endif
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
                                                        <li><a href="#" class="icon fa-vk"><span class="label">vk</span></a></li>
                                                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-google"><span class="label">Google</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">
                            
                            <nav class="navbar navbar-default navbar-static-top">
                                
                                    

                                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                       

                                        <!-- Right Side Of Navbar -->
                                        <ul class="nav navbar-nav navbar-right">
                                            
                                            <!-- Authentication Links -->
                                            @if (Auth::guest())
                                                <li><a href="{{ url('/login') }}">Авторизация</a></li>
                                                <li><a href="{{ url('/register') }}">Регистрация</a></li>
                                            @else
                                                @if(isset($record) && stristr(URL::current(), 'edit') == false)
                                                    <li><a href="/edit/page/{{ $record->name }}">Изменить данные языка</a></li>
                                                @endif
                                                @if(URL::current() != 'http://handbook-for-programmer.gor/add/page')
                                                <li><a href="{{ url('/add/page') }}">Добавить новый язык</a></li>
                                                @endif
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        {{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="{{ url('/logout') }}"
                                                                onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                                Выйти
                                                            </a>

                                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                              
                            </nav>
                            
                            @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @yield('content') 
                            
			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Гормаш С. М. 2017</li>
					</ul>

			</div>

		

	</body>
</html>