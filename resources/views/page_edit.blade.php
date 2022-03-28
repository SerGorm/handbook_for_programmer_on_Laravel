@extends('nav')

@section('content')
<!-- Intro -->
        <section id="top" class="one dark cover">
                <div class="container">

                        <header>
                            @if(isset($record))
                                <h2 class="alt">Изменение данных языка {{ $record->name }}</h2>
                                <p>Со современем языки программирования могут менятся. Синтаксис совершенствуется путём добавления новых аргументов и избавления от устаревших технологий.<br>
                                Если какие-либо изменения не были зафиксированы на данном ресурсе, на этой странице Вы можете изменить необходимые данные, косающиеся выбранного языка.</p>
                            @else
                                <h2 class="alt">Новый язык</h2>
                                <p>Со времени создания первых программируемых машин человечество придумало более восьми тысяч языков программирования. Каждый год их число увеличивается.<br>
                                Если у Вас есть информация о языке, который не был представлен на данном ресурсе, Вы можете добавить его в информационную базу, заполнив все необходимые поля.</p>
                            @endif
                            
                        </header>

                        <footer>
                            @if(isset($record))
                                <a href="#portfolio" class="button scrolly">Перейти к изменению</a>
                            @else
                                <a href="#portfolio" class="button scrolly">Перейти к добавлению</a>
                            @endif
                                
                        </footer>

                </div>
        </section>

<!-- Portfolio -->
        <section id="portfolio" class="two">
                <div class="container">

                        <header>
                            @if(isset($record))
                                <h2>Измените значения ситнаксиса языка</h2>
                            @else
                                <h2>Введите данные о новом языке</h2>
                            @endif
                        </header>
                              
                            @if(isset($record))
                           <form method="post" action="/edit/page/{{ $record->id }}"> 
                                <h3>Название языка программирования</h3>
                                <input type="text" name="name" placeholder="Название языка" value="{{ $record->name }}" /><br>
                                
                                <h3>Информация о данном языке</h3>
                                <textarea  name="data_info">{{ $record->data_info }}</textarea><br>
                                
                                <h3>Основы синтаксиса</h3>
                                <table class="default editable">
                                    <tr><td>Учитывается ли регистр?</td><td><label><input type="checkbox" name="case_sensitive" {{ $record->case_sensitive ? 'checked' : '' }}><span class="checkbox-custom checkbox-custom-my"></span></label></td></tr>
                                    <tr><td>Введите разделяющий знак (если нужно)</td><td><input type="text" name="separated" value="{{ $record->separated }}" /></td></tr>
                                    <tr><td>Начало блока операторов</td><td><input type="text" name="begin_" value="{{ $record->begin_ }}" /></td></tr>
                                    <tr><td>Конец блока операторов</td><td><input type="text" name="_end" value="{{ $record->_end }}" /></td></tr>
                                    
                                    
                                    <tr><td>Объявление однострочного комментария</td><td><input type="text" name="single_line_comment" placeholder="//" value="{{ $record->single_line_comment }}" /></td></tr>
                                    <tr><td>Начало многострочного комментария</td><td><input type="text" name="multiline_comment_begin" placeholder="/*" value="{{ $record->multiline_comment_begin }}" /></td></tr>
                                    <tr><td>Конец многострочного комментария</td><td><input type="text" name="multiline_comment_end" placeholder="*/" value="{{ $record->multiline_comment_end }}" /></td></tr>
                                </table>
                                
                                <h3>Как объявляются переменные?</h3>
                                <textarea  name="data_types_before_text">{{ $record->data_types_before_text }}</textarea><br>
                                
                                <h4>Пример объявления переменных</h4>
                                <textarea  name="data_types">{{ $record->data_types }}</textarea><br>
                                
                                <h4>Дополнительная информация к объявлению переменных</h4>
                                <textarea  name="data_types_after_text">{{ $record->data_types_after_text }}</textarea><br>
                                
                                <h3>Математические операции</h3>
                                <table class="default editable">    
                                    <tr><td>Сложение</td><td><input type="text" name="addition" placeholder="+" value="{{ $record->addition }}" /></td></tr>
                                    <tr><td>Вычитание</td><td><input type="text" name="subtraction" placeholder="-" value="{{ $record->subtraction }}" /></td></tr>
                                    <tr><td>Умножение</td><td><input type="text" name="multiplication" placeholder="*" value="{{ $record->multiplication }}" /></td></tr>
                                    <tr><td>Деление</td><td><input type="text" name="division" placeholder="/" value="{{ $record->division }}" /></td></tr>
                                    <tr><td>Целочисленное деление</td><td><input type="text" name="division_whole" placeholder="\" value="{{ $record->division_whole }}"></td></tr>
                                    <tr><td>Остаток от деления</td><td><input type="text" name="remainder_of_the_division" placeholder="%" value="{{ $record->remainder_of_the_division }}" /></td></tr>
                                    
                                    <tr><td>Увеличение на единицу</td><td><input type="text" name="increase" placeholder="++" value="{{ $record->increase }}" /></td></tr>
                                    <tr><td>Уменьшение на единицу</td><td><input type="text" name="decrease" placeholder="--" value="{{ $record->decrease }}" /></td></tr>
                                </table>
                                <h3>Операции сравнения</h3>
                                <table class="default editable">    
                                    <tr><td>Равно</td><td><input type="text" name="equally" placeholder="==" value="{{ $record->equally }}" /></td></tr>
                                    <tr><td>Не равно</td><td><input type="text" name="not_equal" placeholder="!=" value="{{ $record->not_equal }}" /></td></tr>
                                    <tr><td>Больше</td><td><input type="text" name="more" placeholder=">" value="{{ $record->more }}" /></td></tr>
                                    <tr><td>Меньше</td><td><input type="text" name="less" placeholder="<" value="{{ $record->less }}" /></td></tr>
                                    <tr><td>Больше или равно</td><td><input type="text" name="more_or_equal" placeholder=">=" value="{{ $record->more_or_equal }}" /></td></tr>
                                    <tr><td>Меньше или равно</td><td><input type="text" name="less_or_equal" placeholder="<=" value="{{ $record->less_or_equal }}" /></td></tr>
                                </table>
                                <h3>Логические операции</h3>
                                <table class="default editable">    
                                    <tr><td>Оператор И</td><td><input type="text" name="and_main" placeholder="and" value="{{ $record->and_main }}" /></td></tr>
                                    <tr><td>Альтернативный вариант</td><td><input type="text" name="and_alt" value="{{ $record->and_alt }}" /></td></tr>
                                    <tr><td>Оператор ИЛИ</td><td><input type="text" name="or_main" placeholder="or" value="{{ $record->or_main }}" /></td></tr>
                                    <tr><td>Альтернативный вариант</td><td><input type="text" name="or_alt" value="{{ $record->or_alt }}" /></td></tr>
                                    <tr><td>Оператор НЕ</td><td><input type="text" name="not_main" placeholder="not" value="{{ $record->not_main }}" /></td></tr>
                                    <tr><td>Альтернативный вариант</td><td><input type="text" name="not_alt" value="{{ $record->not_alt }}" /></td></tr>
                                </table>
                                <h3>Операторы присваивания</h3>
                                <table class="default editable">    
                                    <tr><td>Присвоение значения переменной</td><td><input type="text" name="assignment" placeholder="=" value="{{ $record->assignment }}" /></td></tr>
                                    <tr><td>Увеличение значения переменной на указанную величину</td><td><input type="text" name="increasing_specified" placeholder="+=" value="{{ $record->increasing_specified }}" /></td></tr>
                                    <tr><td>Уменьшение значения переменной на указанную величину</td><td><input type="text" name="reducing_specified" placeholder="-=" value="{{ $record->reducing_specified }}" /></td></tr>
                                    <tr><td>Умножение значения переменной на указанную величину</td><td><input type="text" name="multiply_specified" placeholder="*=" value="{{ $record->multiply_specified }}" /></td></tr>
                                    <tr><td>Деление значения переменной на указанную величину</td><td><input type="text" name="dividing_specified" placeholder="/=" value="{{ $record->dividing_specified }}" /></td></tr>
                                    <tr><td>Целочисленное деление значения переменной на указанную величину</td><td><input type="text" name="dividing_whole_specified" placeholder="\=" value="{{ $record->dividing_whole_specified }}" /></td></tr>
                                    <tr><td>Возвращение остатка от деления значения переменной на указанную величину</td><td><input type="text" name="remainder_of_dividing_specified" placeholder="%=" value="{{ $record->remainder_of_dividing_specified }}" /></td></tr>
                                </table>
        

<!-- Control structures -->
        <section id="about" class="three">
                <div class="container">

                        <header>
                                <h2>Измените управляющие структуры</h2>
                        </header>
                                <h3>Условные операторы</h3>
                                <table class="default editable">    
                                    <!--<tr><td>Input</td><td><input type="text" name="input" placeholder="Input" value="" /></td></tr>
                                    <tr><td>Print</td><td><input type="text" name="print" placeholder="Print" value="" /></td></tr>-->
                                    <tr><td>Условный оператор ЕСЛИ</td><td><input type="text" name="if_" placeholder="if" value="{{ $record->if_ }}" /></td></tr>
                                    <tr><td>Условный оператор ИНАЧЕ ЕСЛИ</td><td><input type="text" name="_elseif_" placeholder="elseif" value="{{ $record->_elseif_ }}" /></td></tr>
                                    <tr><td>Условный оператор ИНАЧЕ</td><td><input type="text" name="_else" placeholder="else" value="{{ $record->_else }}" /></td></tr>
                                    <tr><td>Написание условия</td><td><input type="text" name="conditions" placeholder="(условие)" value="{{ $record->conditions }}" /></td></tr>
                                    <tr><td>Краткая форма (если есть)</td><td><input type="text" name="shortif" value="{{ $record->shortif }}" /></td></tr>
                                </table>
                                <h3>Оператор выбора</h3>
                                <table class="default editable">     
                                    <tr><td>Оператор выбора</td><td><input type="text" name="switch_" placeholder="switch" value="{{ $record->switch_ }}" /></td></tr>
                                    <tr><td>Определение элемента</td><td><input type="text" name="case_" placeholder="case" value="{{ $record->case_ }}" /></td></tr>
                                    <tr><td>Прерывание действия</td><td><input type="text" name="_break" placeholder="break" value="{{ $record->_break }}" /></td></tr>
                                    <tr><td>Стандартный элемент</td><td><input type="text" name="default_" placeholder="default" value="{{ $record->default_ }}" /></td></tr>
                                </table>
                                <h3>Циклы</h3>
                                <table class="default editable">    
                                    <tr><td>Цикл с параметром</td><td><input type="text" name="for_" placeholder="for" value="{{ $record->for_ }}" /></td></tr>
                                    <tr><td>Определение параметра</td><td><input type="text" name="for_condition" value="{{ $record->for_condition }}" /></td></tr>
                                    <tr><td>Цикл с предусловием</td><td><input type="text" name="while_do" placeholder="while" value="{{ $record->while_do }}" /></td></tr>
                                    <tr><td>Начало цикла с постусловием</td><td><input type="text" name="do_" placeholder="do" value="{{ $record->do_ }}" /></td></tr>    
                                    <tr><td>Конец цикла с постусловием</td><td><input type="text" name="do_while" placeholder="until" value="{{ $record->do_while }}" /></td></tr>    
                                </table> 
                                <div class="12u$"><input class="edit_button" type="submit" value="Изменить данные языка" /></div><br>
                            @else
                            <form method="post" action="{{ route('recordAdd') }}"> 
                                <h3>Введите название нового языка программирования</h3>
                                <input type="text" name="name" placeholder="Название языка" /><br>
                                
                                <h3>Напишите необходимую информацию о данном языке</h3>
                                <textarea  name="data_info"></textarea><br>
                                
                                <h3>Основы синтаксиса</h3>
                              <table class="default editable">
                                    <tr><td>Учитывается ли регистр?</td><td><label><input type="checkbox" name="case_sensitive"><span class="checkbox-custom checkbox-custom-my"></span></label></td></tr>
                                    <tr><td>Введите разделяющий знак (если нужно)</td><td><input type="text" name="separated" /></td></tr>
                                    <tr><td>Начало блока операторов</td><td><input type="text" name="begin_" /></td></tr>
                                    <tr><td>Конец блока операторов</td><td><input type="text" name="_end" /></td></tr>
                                    
                                    
                                    <tr><td>Объявление однострочного комментария</td><td><input type="text" name="single_line_comment" placeholder="//"  /></td></tr>
                                    <tr><td>Начало многострочного комментария</td><td><input type="text" name="multiline_comment_begin" placeholder="/*"  /></td></tr>
                                    <tr><td>Конец многострочного комментария</td><td><input type="text" name="multiline_comment_end" placeholder="*/"  /></td></tr>
                                </table>
                                
                                <h3>Как объявляются переменные?</h3>
                                <textarea  name="data_types_before_text"></textarea><br>
                                
                                <h4>Пример объявления переменных</h4>
                                <textarea  name="data_types"></textarea><br>
                                
                                <h4>Дополнительная информация к объявлению переменных</h4>
                                <textarea  name="data_types_after_text"></textarea><br>
                                
                                <h3>Математические операции</h3>
                                <table class="default editable">    
                                    <tr><td>Сложение</td><td><input type="text" name="addition" placeholder="+" /></td></tr>
                                    <tr><td>Вычитание</td><td><input type="text" name="subtraction" placeholder="-" /></td></tr>
                                    <tr><td>Умножение</td><td><input type="text" name="multiplication" placeholder="*" /></td></tr>
                                    <tr><td>Деление</td><td><input type="text" name="division" placeholder="/" /></td></tr>
                                    <tr><td>Целочисленное деление</td><td><input type="text" name="division_whole" placeholder="\"></td></tr>
                                    <tr><td>Остаток от деления</td><td><input type="text" name="remainder_of_the_division" placeholder="%" /></td></tr>
                                    
                                    <tr><td>Увеличение на единицу</td><td><input type="text" name="increase" placeholder="++"  /></td></tr>
                                    <tr><td>Уменьшение на единицу</td><td><input type="text" name="decrease" placeholder="--"  /></td></tr>
                                </table>
                                <h3>Операции сравнения</h3>
                                <table class="default editable">    
                                    <tr><td>Равно</td><td><input type="text" name="equally" placeholder="=="  /></td></tr>
                                    <tr><td>Не равно</td><td><input type="text" name="not_equal" placeholder="!="  /></td></tr>
                                    <tr><td>Больше</td><td><input type="text" name="more" placeholder=">"  /></td></tr>
                                    <tr><td>Меньше</td><td><input type="text" name="less" placeholder="<"  /></td></tr>
                                    <tr><td>Больше или равно</td><td><input type="text" name="more_or_equal" placeholder=">="  /></td></tr>
                                    <tr><td>Меньше или равно</td><td><input type="text" name="less_or_equal" placeholder="<="  /></td></tr>
                                </table>
                                <h3>Логические операции</h3>
                                <table class="default editable">    
                                    <tr><td>Оператор И</td><td><input type="text" name="and_main" placeholder="and"  /></td></tr>
                                    <tr><td>Альтернативный вариант</td><td><input type="text" name="and_alt"  /></td></tr>
                                    <tr><td>Оператор ИЛИ</td><td><input type="text" name="or_main" placeholder="or" /></td></tr>
                                    <tr><td>Альтернативный вариант</td><td><input type="text" name="or_alt"  /></td></tr>
                                    <tr><td>Оператор НЕ</td><td><input type="text" name="not_main" placeholder="not"  /></td></tr>
                                    <tr><td>Альтернативный вариант</td><td><input type="text" name="not_alt"  /></td></tr>
                                </table>
                                <h3>Операторы присваивания</h3>
                                <table class="default editable">    
                                    <tr><td>Присвоение значения переменной</td><td><input type="text" name="assignment" placeholder="="  /></td></tr>
                                    <tr><td>Увеличение значения переменной на указанную величину</td><td><input type="text" name="increasing_specified" placeholder="+="  /></td></tr>
                                    <tr><td>Уменьшение значения переменной на указанную величину</td><td><input type="text" name="reducing_specified" placeholder="-="  /></td></tr>
                                    <tr><td>Умножение значения переменной на указанную величину</td><td><input type="text" name="multiply_specified" placeholder="*="  /></td></tr>
                                    <tr><td>Деление значения переменной на указанную величину</td><td><input type="text" name="dividing_specified" placeholder="/="  /></td></tr>
                                    <tr><td>Целочисленное деление значения переменной на указанную величину</td><td><input type="text" name="dividing_whole_specified" placeholder="\="/></td></tr>
                                    <tr><td>Возвращение остатка от деления значения переменной на указанную величину</td><td><input type="text" name="remainder_of_dividing_specified" placeholder="%="  /></td></tr>
                                </table>
        

<!-- Control structures -->
        <section id="about" class="three">
                <div class="container">

                        <header>
                                <h2>Определите управляющие структуры</h2>
                        </header>
                                <h3>Условные операторы</h3>
                                <table class="default editable">    
                                    <!--<tr><td>Input</td><td><input type="text" name="input" placeholder="Input" value="" /></td></tr>
                                    <tr><td>Print</td><td><input type="text" name="print" placeholder="Print" value="" /></td></tr>-->
                                    <tr><td>Условный оператор ЕСЛИ</td><td><input type="text" name="if_" placeholder="if"  /></td></tr>
                                    <tr><td>Условный оператор ИНАЧЕ ЕСЛИ</td><td><input type="text" name="_elseif_" placeholder="elseif"  /></td></tr>
                                    <tr><td>Условный оператор ИНАЧЕ</td><td><input type="text" name="_else" placeholder="else"  /></td></tr>
                                    <tr><td>Написание условия</td><td><input type="text" name="conditions" placeholder="(условие)" /></td></tr>
                                    <tr><td>Краткая форма (если есть)</td><td><input type="text" name="shortif"  /></td></tr>
                                </table>
                                <h3>Оператор выбора</h3>
                                <table class="default editable">     
                                    <tr><td>Оператор выбора</td><td><input type="text" name="switch_" placeholder="switch"  /></td></tr>
                                    <tr><td>Определение элемента</td><td><input type="text" name="case_" placeholder="case"  /></td></tr>
                                    <tr><td>Прерывание действия</td><td><input type="text" name="_break" placeholder="break"  /></td></tr>
                                    <tr><td>Стандартный элемент</td><td><input type="text" name="default_" placeholder="default"  /></td></tr>
                                </table>
                                <h3>Циклы</h3>
                                <table class="default editable">    
                                    <tr><td>Цикл с параметром</td><td><input type="text" name="for_" placeholder="for"  /></td></tr>
                                    <tr><td>Определение параметра</td><td><input type="text" name="for_condition"  /></td></tr>
                                    <tr><td>Цикл с предусловием</td><td><input type="text" name="while_do" placeholder="while"  /></td></tr>
                                    <tr><td>Начало цикла с постусловием</td><td><input type="text" name="do_" placeholder="do"  /></td></tr>    
                                    <tr><td>Конец цикла с постусловием</td><td><input type="text" name="do_while" placeholder="until"  /></td></tr>    
                                </table> 
                                <div class="12u$"><input class="edit_button" type="submit" value="Добавить новый язык" /></div>
                            @endif
                        
                                        {{ csrf_field() }}
                              </table>  
                        </form>
                         
                     @if(isset($record))
                         <form method="post" action="/edit/page/{{ $record->id }}">  
                             
                             {{ method_field('DELETE') }}
                             <div class="12u$"><input class="edit_button delete_button" type="submit" value="Удалить язык из базы данных" /></div>
                             
                             {{ csrf_field() }}
                             </form>
                             @endif
                        
                </div>
        </section>
</section>
<!-- About Me -->
<!--        <section id="about" class="three">
                <div class="container">

                        <header>
                                <h2>About Me</h2>
                        </header>

                        <a href="#" class="image featured"><img src="{{ asset('images/pic08.jpg') }}" alt="" /></a>

                        <p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
                        ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
                        laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
                        parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
                        dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
                        ornare iaculis.</p>

                </div>
        </section>
-->
<!-- Contact -->
<!--        <section id="contact" class="four">
                <div class="container">

                        <header>
                                <h2>Contact</h2>
                        </header>

                        <p>Elementum sem parturient nulla quam placerat viverra
                        mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia
                        donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc
                        orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>

                        <form method="post" action="/">
                                <div class="row">
                                        <div class="6u 12u$(mobile)"><input type="text" name="name" placeholder="Name" /></div>
                                        <div class="6u$ 12u$(mobile)"><input type="text" name="email" placeholder="Email" /></div>
                                        <div class="12u$"><textarea name="message" placeholder="Message"></textarea></div>
                                        <div class="12u$"><input type="submit" value="Send Message" /></div>
                                        {{ csrf_field() }}
                                </div>
                        </form>

                </div>
        </section>
-->
@endsection