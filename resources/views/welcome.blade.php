@extends('nav')

@section('content')
<!-- Intro -->
        <section id="top" class="one dark cover">
                <div class="container">

                        <header>
                                <h2 class="alt">Здравствуйте, пользователь интернет сети,<br>
                                добро пожаловать на этот сайт!</h2>
                                <p>Вы открыли web-справочник по всем языкам программирования (которые здесь есть).<br> 
                                Если Вы что нибудь знаете об этих языках, но забываете, как правильно на них говорить, <br>Вы обратились по адресу!</p>
                        </header>

                        <footer>
                                <a href="#portfolio" class="button scrolly">Подробнее</a>
                        </footer>

                </div>
        </section>

<!-- Portfolio -->
        <section id="portfolio" class="two">
                <div class="container">

                        <header>
                                <h2>Куда Вы попали?</h2>
                        </header>

                            <p class="marginno">Вы сейчас находитесь на сайте web-справочника, на котором расположена разнообразная информация, касающаяся синтаксиса и особенностей работы с различными языками программирования. Здесь Вы не найдёте истории создания, развития языков, описания способов взаимодействия операторов, описания структуры языков, и множество другой теоретической информации в виде сплошного, трудночитаемого текста (за исключением этого вступления и ещё некоторых моментов). Всё это находится в свободном доступе и легко ищется на просторах интернет сети. На данном ресурсе демонстрируется сравнение синтаксиса написания программного кода, сравнение определения параметров, переменных и других операторов.</p>
                            <p>Если Вы умеете «говорить» на двух или на большем количестве языков программирования, то у Вас, скорее всего, возникал такой вопрос: «А как здесь это делается?» Задача этого интернет ресурса как раз заключается в том, чтобы каждый человек мог найти ответ на этот простой, но в тоже время часто возникающий вопрос. Это web-приложение поможет начинающим и более опытным мастерам в области программирования ориентироваться среди многочисленного разнообразия написания операндов и не запутаться в правильном оформлении программного кода на одном, конкретном языке программирования.</p>

                        <!--<div class="row">
                                <div class="4u 12u$(mobile)">
                                        <article class="item">
                                                <a href="#" class="image fit"><img src="{{ asset('images/pic02.jpg') }}" alt="" /></a>
                                                <header>
                                                        <h3>Ipsum Feugiat</h3>
                                                </header>
                                        </article>
                                        <article class="item">
                                                <a href="#" class="image fit"><img src="{{ asset('images/pic03.jpg') }}" alt="" /></a>
                                                <header>
                                                        <h3>Rhoncus Semper</h3>
                                                </header>
                                        </article>
                                </div>
                                <div class="4u 12u$(mobile)">
                                        <article class="item">
                                                <a href="#" class="image fit"><img src="{{ asset('images/pic04.jpg') }}" alt="" /></a>
                                                <header>
                                                        <h3>Magna Nullam</h3>
                                                </header>
                                        </article>
                                        <article class="item">
                                                <a href="#" class="image fit"><img src="{{ asset('images/pic05.jpg') }}" alt="" /></a>
                                                <header>
                                                        <h3>Natoque Vitae</h3>
                                                </header>
                                        </article>
                                </div>
                                <div class="4u$ 12u$(mobile)">
                                        <article class="item">
                                                <a href="#" class="image fit"><img src="{{ asset('images/pic06.jpg') }}" alt="" /></a>
                                                <header>
                                                        <h3>Dolor Penatibus</h3>
                                                </header>
                                        </article>
                                        <article class="item">
                                                <a href="#" class="image fit"><img src="{{ asset('images/pic07.jpg') }}" alt="" /></a>
                                                <header>
                                                        <h3>Orci Convallis</h3>
                                                </header>
                                        </article>
                                </div>
                        </div>-->

                </div>
        </section>

<!-- About Me -->
        <section id="about" class="three">
                <div class="container">

                        <header>
                                <h2>Что здесь можно делать?</h2>
                        </header>

                        <!--<a href="#" class="image featured"><img src="/images/pic08.jpg" alt="" /></a>-->

                        <p class="marginno">Если Вы хотите узнать что-нибудь о каком-либо языке программирования, Вам нужно открыть список языков из главного бокового меню, и выбрать интересующий Вас язык. Таким образом, Вы перейдёте на страницу выбранного языка и сможете найти там нужную вам информацию.</p>
                        <p class="marginno">Если Вы хотите помочь развитию этого проекта и добавить или отредактировать какую-либо информацию, Вам нужно зарегистрироваться и авторизоваться. Это нужно для того, чтобы только проверенные пользователи могли в полной мере управлять предоставляемой информацией.</p>
                        <p>Если Вы хотите связаться с автором этого проекта, Вы можете написать сообщение, используя форму, которая находится в нижней части главной страницы, или перейти по ссылкам, которые находятся в нижней части главного бокового меню.</p>

                </div>
        </section>

<!-- Contact -->
        <section id="contact" class="four">
                <div class="container">

                        <header>
                                <h2>Отправить сообщение</h2>
                        </header>

                        <p>Если Вы хотите написать сообщение автору этого проекта, для этого Вы можете использовать данную форму.</p>

                        <form method="post" action="/">
                                <div class="row">
                                        <div class="6u 12u$(mobile)"><input type="text" name="name" placeholder="Ваше имя" /></div>
                                        <div class="6u$ 12u$(mobile)"><input type="text" name="email" placeholder="Ваш e-mail" /></div>
                                        <div class="12u$"><textarea name="message" placeholder="Сообщение"></textarea></div>
                                        <div class="12u$"><input type="submit" value="Отправить сообщение" /></div>
                                        {{ csrf_field() }}
                                </div>
                        </form>

                </div>
        </section>
@endsection
