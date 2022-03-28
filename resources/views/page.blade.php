@extends('nav')

@section('content')
<!-- Intro -->
        <section id="top" class="one dark cover">
                <div class="container">

                        <header>
                                <h2 class="alt">{{ $record->name }}</h2>
                                <p>{!! $record->data_info !!}</p>
                                {{ csrf_field() }}
                        </header>

                        <footer>
                                <a href="#portfolio" class="button scrolly">Перейти к изучению</a>
                        </footer>

                </div>
        </section>

<!-- Syntax -->
        <section id="portfolio" class="two">
                <div class="container">

                        <header>
                                <h2>Синтаксис языка</h2>
                        </header>

                        <p>{{ $record->name }} {{ $record->case_sensitive ? '' : 'не' }} зависит от регистра, то есть TEST, Test и test - {{ $record->case_sensitive ? 'разные значения' : 'одно и тоже' }}! Символ разделения операторов - {{ $record->separated == null || str_replace(" ","",str_replace("\n","",$record->separated)) == '' ? 'отсутствует' : '&#171;'.str_replace(" ","",str_replace("\n","",$record->separated)).'&#187;' }}. Комментарии имеют следующий вид:</p>
                        <pre>
@if($record->single_line_comment != null || str_replace(" ","",str_replace("\n","",$record->single_line_comment)) != '')
{{ $record->single_line_comment }} однострочный комментарий
@endif
@if($record->multiline_comment_begin != null || str_replace(" ","",str_replace("\n","",$record->multiline_comment_begin)) != '' || $record->multiline_comment_end != null || str_replace(" ","",str_replace("\n","",$record->multiline_comment_end)) != '')
{{ $record->multiline_comment_begin }}
    многострочный
    комментарий
{{ $record->multiline_comment_end }}
@endif</pre><br>

                        <h3>Типы данных</h3>
                        <p>{!! $record->data_types_before_text !!}</p>
                            <pre>
{{ $record->data_types }}</pre><br>
                            <p>{!! $record->data_types_after_text !!}</p>
                        
                        <h3>Математические операции</h3>
                        <table class="default">
                            <tbody>
                            <tr>
                                <th>Действие</th><th>Оператор</th><th>Пример</th><th>Ответ</th>
                            </tr>
                            <tr>
                                <td rowspan="2">Сложение</td><td rowspan="2">{{ $record->addition }}</td><td>100 {{ $record->addition }} 5</td><td>105</td>
                            </tr>
                            <tr>
                                <td class="nofirsttd">'Text1' {{ $record->addition }} 'Text2'</td><td>'Text1Text2'</td>
                            </tr>
                            <tr>
                                <td>Вычитание</td><td>{{ $record->subtraction }}</td><td>100 {{ $record->subtraction }} 5</td><td>95</td>
                            </tr>
                            <tr>
                                <td rowspan="2">Умножение</td><td rowspan="2">{{ $record->multiplication }}</td><td>100 {{ $record->multiplication }} 5</td><td>500</td>
                            </tr>
                            <tr>
                                <td class="nofirsttd">'Text1' {{ $record->multiplication }} 2</td><td>'Text1Text1'</td>
                            </tr>
                            <tr>
                                <td>Деление</td><td>{{ $record->division }}</td><td>100 {{ $record->division }} 5</td><td>20</td>
                            </tr>
                            @if($record->division_whole != null || str_replace(" ","",str_replace("\n","",$record->division_whole)) != '')
                            <tr>
                                <td>Целочисленное деление</td><td>{{ $record->division_whole }}</td><td>5 {{ $record->division_whole }} 2</td><td>2</td>
                            </tr>
                            @endif
                            @if($record->remainder_of_the_division != null || str_replace(" ","",str_replace("\n","",$record->remainder_of_the_division)) != '')
                            <tr>
                                <td>Остаток от деления</td><td>{{ $record->remainder_of_the_division }}</td><td>5 {{ $record->remainder_of_the_division }} 2</td><td>1</td>
                            </tr>
                            @endif
                            @if($record->increase != null || str_replace(" ","",str_replace("\n","",$record->increase)) != '')
                            <tr>
                                <td>Увеличение на единицу</td><td>{{ $record->increase }}</td><td>5{{ $record->increase }}</td><td>6</td>
                            </tr>
                            @endif
                            @if($record->decrease != null || str_replace(" ","",str_replace("\n","",$record->decrease)) != '')
                            <tr>
                                <td>Уменьшение на единицу</td><td>{{ $record->decrease }}</td><td>5{{ $record->decrease }}</td><td>4</td>
                            </tr>
                            @endif
                            <!--<tr>
                                <th colspan="5" class="comparison" data-id="1" data-comparison="Сравнить операции"></th>
                            </tr>-->
                            </tbody>
                        </table>
                        <h3>Операции сравнения</h3>
                        <table class="default">
                            <tbody>
                            <tr>
                                <th>Действие</th><th>Оператор</th>
                            </tr>
                            <tr>
                                <td>Равно</td><td>{{ $record->equally }}</td>
                            </tr>
                            <tr>
                                <td>Не равно</td><td>{{ $record->not_equal }}</td>
                            </tr>
                            <tr>
                                <td>Больше</td><td>{{ $record->more }}</td>
                            </tr>
                            <tr>
                                <td>Меньше</td><td>{{ $record->less }}</td>
                            </tr>
                            <tr>
                                <td>Больше или равно</td><td>{{ $record->more_or_equal }}</td>
                            </tr>
                            <tr>
                                <td>Меньше или равно</td><td>{{ $record->less_or_equal }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <h3>Логические операции</h3>
                        <table class="default">
                            <tbody>
                            <tr>
                                <th>Действие</th><th>Оператор</th><th>Альтернативный оператор</th><th>Пример</th>
                            </tr>
                            <tr>
                                <td class="nofirsttd">И</td><td>{{ $record->and_main }}</td><td>{{ $record->and_alt == null ? 'отсутствует' : $record->and_alt }}</td><td>5{{ $record->more_or_equal }}2 {{ $record->and_main }} 3{{ $record->less_or_equal }}6</td>
                            </tr>
                            <tr>
                                <td class="nofirsttd">ИЛИ</td><td>{{ $record->or_main }}</td><td>{{ $record->or_alt == null ? 'отсутствует' : $record->or_alt }}</td><td>5{{ $record->more_or_equal }}2 {{ $record->or_main }} 3{{ $record->less_or_equal }}6</td>
                            </tr>
                            <tr>
                                <td class="nofirsttd">НЕ</td><td>{{ $record->not_main }}</td><td>{{ $record->not_alt == null ? 'отсутствует' : $record->not_alt }}</td><td>{{ $record->not_main }}(5{{ $record->more_or_equal }}2 {{ $record->and_main }} 3{{ $record->less_or_equal }}6)</td>
                            </tr>
                            </tbody>
                        </table>
                        <h3>Операторы присваивания</h3>
                        <table class="default">
                            <tbody>
                            <tr>
                                <th>Действие</th><th>Оператор</th><th>Пример</th><th>Ответ</th>
                            </tr>
                            <tr>
                                <td>Присвоение значения переменной</td><td>{{ $record->assignment }}</td><td>x {{ $record->assignment }} 1000</td><td>1000</td>
                            </tr>
                            <tr>
                                <td>Увеличение значения переменной на указанную величину</td><td>{{ $record->increasing_specified }}</td><td>x {{ $record->assignment }} 1000<br>x {{ $record->increasing_specified }} 100</td><td>1100</td>
                            </tr>
                            <tr>
                                <td>Уменьшение значения переменной на указанную величину</td><td>{{ $record->reducing_specified }}</td><td>x {{ $record->assignment }} 1000<br>x {{ $record->reducing_specified }} 100</td><td>900</td>
                            </tr>
                            <tr>
                                <td>Умножение значения переменной на указанную величину</td><td>{{ $record->multiply_specified }}</td><td>x {{ $record->assignment }} 1000<br>x {{ $record->multiply_specified }} 100</td><td>100000</td>
                            </tr>
                            @if($record->dividing_specified != null || str_replace(" ","",str_replace("\n","",$record->dividing_specified)) != '')
                            <tr>
                                <td>Деление значения переменной на указанную величину</td><td>{{ $record->dividing_specified }}</td><td>x {{ $record->assignment }} 1000<br>x {{ $record->dividing_specified }} 100</td><td>10</td>
                            </tr>
                            @endif
                            @if($record->dividing_whole_specified != null || str_replace(" ","",str_replace("\n","",$record->dividing_whole_specified)) != '')
                            <tr>
                                <td>Целочисленное деление значения переменной на указанную величину</td><td>{{ $record->dividing_whole_specified }}</td><td>x {{ $record->assignment }} 1100<br>x {{ $record->dividing_whole_specified }} 1000</td><td>1</td>
                            </tr>
                            @endif
                            @if($record->remainder_of_dividing_specified != null || str_replace(" ","",str_replace("\n","",$record->remainder_of_dividing_specified)) != '')
                            <tr>
                                <td>Возвращение остатка от деления значения переменной на указанную величину</td><td>{{ $record->remainder_of_dividing_specified }}</td><td>x {{ $record->assignment }} 1000<br>x {{ $record->remainder_of_dividing_specified }} 100</td><td>0</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                </div>
        </section>

<!-- Control structures -->
        <section id="about" class="three">
                <div class="container">

                        <header>
                                <h2>Управляющие структуры</h2>
                        </header>
                        <h3>Условные операторы</h3>
                        <p>Условный оператор {{ $record->if_ }} позволяет менять направление выполняемых действий в зависимости от результата проверки условия. Общая форма записи оператора {{ $record->if_ }} имеет следующий вид:
                            <label>{{ $record->if_ }} <input type="checkbox" value="if" checked="" disabled=""><span class="checkbox-custom"></span></label>, <label>{{ $record->_elseif_ }} <input data-langname="{{ $record->name }}" class="excontrol" type="checkbox" name="elseif"><span class="checkbox-custom"></span></label>, <label>{{ $record->_else }} <input data-langname="{{ $record->name }}" class="excontrol" type="checkbox" name="else"><span class="checkbox-custom"></span></label> (количество операторов: <label>один <input data-langname="{{ $record->name }}" class="excontrol" name="colopif" type="radio" value="1"><span class="radio-custom"></span></label>, <label>несколько <input data-langname="{{ $record->name }}" class="excontrol" name="colopif" type="radio" value="2" checked><span class="radio-custom"></span></label>)
                            <label>Краткая форма условного оператора: <input data-langname="{{ $record->name }}" class="excontrol" type="checkbox" name="ifcompact"><span class="checkbox-custom"></span></label>
                        </p>
                        <pre class="preif">
{{ $record->if_ }} {{ $record->conditions }}{{ $record->name == 'Basic' ? ' THEN' : ''}} {{ $record->begin_ }}
    блок_операторов{{ $record->separated }}
{{ $record->_end }}{{ $record->name == 'Basic' ? 'END IF' : ''}}{{ $record->name == 'Pascal' ? $record->separated : ''}}</pre><br>
@if($record->name != 'Python')
                        <h3>Оператор выбора</h3>
                        <p>Оператором многоканального ветвления является оператор {{ $record->switch_ }}. Он используется для организации работы по одному из нескольких направлений. Общая форма записи этого оператора имеет следующий вид:</p>
                        <pre>
@if($record->name == 'Pascal')
{{ $record->switch_ }} (выражение) of
    константа_1: {{ $record->begin_ }}
        последовательность_операторов_1{{ $record->separated }}
        {{ $record->_break }}{{ $record->separated }}
    {{ $record->_end }}{{ $record->separated }}
    константа_2: {{ $record->begin_ }}
        последовательность_операторов_2{{ $record->separated }}
        {{ $record->_break }}{{ $record->separated }}
    {{ $record->_end }}{{ $record->separated }}
    константа_N: {{ $record->begin_ }}
        последовательность_операторов_N{{ $record->separated }}
        {{ $record->_break }}{{ $record->separated }}
    {{ $record->_end }}{{ $record->separated }}
    {{ $record->default_ }} {{ $record->begin_ }}
        {{ $record->default_ }}-операторы{{ $record->separated }}
    {{ $record->_end }}{{ $record->separated }}
{{ $record->_end }}{{ $record->separated }}
@else
{{ $record->switch_ }} {{ $record->name == 'Basic' ? 'выражение' : '(выражение)'}} {{ $record->begin_ }}
    {{ $record->case_ }} константа_1:
	последовательность_операторов_1{{ $record->separated }}
        {{ $record->_break }}{{ $record->separated }}
    {{ $record->case_ }} константа_2:
	последовательность_операторов_2{{ $record->separated }}
        {{ $record->_break }}{{ $record->separated }}
    {{ $record->case_ }} константа_N:
	последовательность_операторов_N{{ $record->separated }}
        {{ $record->_break }}{{ $record->separated }}
    {{ $record->default_ }}: {{ $record->default_ }}-операторы{{ $record->separated }}
{{ $record->_end }}{{ $record->name == 'Basic' ? 'end select' : ''}}
@endif</pre><br>

                        <p class="marginno">Каждая последовательность операторов может состоять из одного или нескольких операторов. Раздел {{ $record->default_ }} необязателен.</p>
                        <p>Работа оператора {{ $record->switch_ }} заключается в сравнении элемента выражение с константами. При обнаружении совпадения выполняется соответствующая последовательность операторов. Если в выполняемой последовательности нет оператора {{ $record->_break }}, программа перейдет к выполнению операторов, относящихся к следующей директиве {{ $record->case_ }}. Другими словами, начиная с точки совпадения элемента выражение и константы, выполнение операторов будет продолжаться до тех пор, пока либо не обнаружится оператор {{ $record->_break }}, либо не закончится оператор {{ $record->switch_ }}. Если не обнаружится никакое совпадение, то при наличии директивы {{ $record->default_ }} будет выполняться последовательность операторов, относящаяся к этой директиве. В противном случае (при отсутствии директивы {{ $record->default_ }}) никакие действия выполнены не будут.</p>
@endif
                        <h3>Цикл с параметром</h3>
                        <p>Цикл {{ $record->for_ }} — это  цикл, в котором тело выполняется заданное количество раз. Общая форма записи этого оператора:<label style="display: none">от меньшего к большему <input data-langname="{{ $record->name }}" class="excontrol" name="directionfor" type="radio" value="++" checked><span class="radio-custom"></span></label><label style="display: none">от большего к мешьшему <input data-langname="{{ $record->name }}" class="excontrol" name="directionfor" type="radio" value="--"><span class="radio-custom"></span></label> (количество операторов: <label>один <input data-langname="{{ $record->name }}" class="excontrol" name="colopfor" type="radio" value="1"><span class="radio-custom"></span></label>, <label>несколько <input data-langname="{{ $record->name }}" class="excontrol" name="colopfor" type="radio" value="2" checked><span class="radio-custom"></span></label>) 
                            
                            </p>
                            <pre class="prefor">
{{ $record->for_ }} {{ $record->for_condition }} {{ $record->begin_ }}
    блок_операторов{{ $record->separated }}
{{ $record->_end }}{{ $record->name == 'Basic' ? 'NEXT I' : ''}}{{ $record->name == 'Pascal' ? $record->separated : ''}}</pre><br>
                        <p>Если условие дает ложное значение сразу после инициализации, тело цикла ни разу не будет выполнено. Это касается и следующего цикла!</p>
                        
                        <h3>Цикл с предусловием</h3>
                        <p>Цикл {{ $record->while_do }} — это цикл, в котором условие стоит перед телом. Причем тело цикла выполняется тогда и только тогда, когда результат условия - истина. Как только условие становится ложно, выполнение цикла прекращается. Общая форма записи оператора:
                        (количество операторов: <label>один <input data-langname="{{ $record->name }}" class="excontrol" name="colopwd" type="radio" value="1"><span class="radio-custom"></span></label>, <label>несколько <input data-langname="{{ $record->name }}" class="excontrol" name="colopwd" type="radio" value="2" checked><span class="radio-custom"></span></label>)</p>
                        <pre class="prewd">
{{ $record->while_do }} {{ $record->conditions }}{{ $record->name == 'Pascal' ? ' do' : ''}} {{ $record->begin_ }}
    блок_операторов{{ $record->separated }}
{{ $record->_end }}{{ $record->name == 'Basic' ? 'Loop' : ''}}{{ $record->name == 'Pascal' ? $record->separated : ''}}</pre><br>
@if($record->name != 'Python')
                        <h3>Цикл с постусловием</h3>
                        <p>Цикл {{ $record->do_ }} {{ $record->do_while }} — это цикл, в котором условие стоит после тела. Причем тело цикла выполняется тогда и только тогда, когда результат условия - ложь. Как только условие становится истинным, выполнение цикла прекращается. Оператор имеет следующий вид:
                        (количество операторов: <label>один <input data-langname="{{ $record->name }}" class="excontrol" name="colopdw" type="radio" value="1"><span class="radio-custom"></span></label>, <label>несколько <input data-langname="{{ $record->name }}" class="excontrol" name="colopdw" type="radio" value="2" checked><span class="radio-custom"></span></label>)</p>
                        <pre class="predw">
{{ $record->do_ }} {{ $record->name == 'Pascal' ? '' : $record->begin_ }}
    блок_операторов{{ $record->separated }}
{{ $record->name == 'Pascal' ? '' : $record->_end }} {{ $record->do_while }} {{ $record->conditions }}{{ $record->separated }}</pre><br>

                        <p>Цикл {{ $record->do_ }} {{ $record->do_while }} — это единственный цикл, который будет всегда иметь по крайней мере одну итерацию, поскольку условие проверяется после выполнения тела цикла.</p>
@endif
                </div>
        </section>

<!-- Contact -->
        <!--<section id="contact" class="four">
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
        </section>-->
@endsection