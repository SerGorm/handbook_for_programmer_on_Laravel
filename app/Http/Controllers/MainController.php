<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Record;

//use Validator;

class MainController extends Controller {
    
    public function welcome(Request $request) {
        
        if ($request->isMethod('post')) {
            /*:attribute*/
            $messages = [
                'required'=>"Поле :attribute обязательно должно быть заполнено!",
                'max'=>"Количество символов в поле :attribute не должно превышать 255!",
                'email'=>"Неправильный ввод электронной почты!"
            ];
            
            $this->validate($request, [
                'name'=>'required|max:255',
                'email'=>'required|email',
                'message'=>'required'
            ], $messages);
            
            /*dump($request->all());*/
            return redirect('/')->with('status','Сообщение отправлено!');
        }
        
        $records = Record::all();
        
        return view('welcome')->with([
                'records' => $records
                ]);
    }
    
    public function page(Request $request) {
        
        if ($request->isMethod('post')) {
        $display = $request->except('_token');
        //dd($display);
       // echo $display['pl'];
       return redirect()->route('page_display',$display['pl']);
        } else {
            abort(404);
        }
        
    }
    
    public function page_display($alias) {
        
        if(!$alias) {
            abort(404);
        }
        if(view()->exists('page')) {
            
            $records = Record::all();
            $record = new Record();
            
            foreach ($records as $record1) {
                if ($record1->name == $alias) {
                    $record = Record::where('name',$alias)->first();
                }
            }
            
            if ($record == new Record()) {
                abort(404);
            } else {
   
                return view('page')->with([
                    'records' => $records,
                    'record' => $record
                    ]);
            }
        }
        else {
            abort(404);
        }
        
    }
    
    public function record_add_up(Request $request) {
        
        if ($request->isMethod('post')) {
            
            $messages = [
                'required'=>"Нужно обязательно заполнить поле с названием языка!",
                'max'=>"Количество символов в названии языка не должно превышать 255!",
                'unique'=>"Язык с таким наименованием уже присутствует в базе данных!"
            ];
            
            $this->validate($request, [
                'name'=>'required|max:255|unique:records'
            ], $messages);
            
           // dd($request->all());
          // dd($request->only('case_sensitive'));
            $input = $request->except('_token');
            
            foreach ($input as $inputcase=>$inputvalue) {
                if ($inputvalue == '') {
                    unset($input[$inputcase]);
                }
            }
            
            if (isset($input['case_sensitive'])) {
                $input['case_sensitive'] = true;
            }
           /* $messages = [
                'riquired'=>"Поле :attribute обязательно надо заполнить",
                'email'=>"Неправильный ввод электронной почты в поле :attribute"
            ];*/
            
            /*$validator = Validator::make($input, [
                'name'=>'required|max:255'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('recordAdd')->withErrors($validator)->withInput();
            }*/
            
            
            
            $newrecord = new Record();
            $newrecord->fill($input);
            
            
            if ($newrecord->save()) {
                return redirect('/')->with('status','Новый язык добавлен!');
            }
            
        }
        
        if(view()->exists('page_edit')) {
        $records = Record::all();
        return view('page_edit')->with([
                'records' => $records
                ]);   
        }
        else {
            abort(404);
        }
        
    }
    
    public function record_edit($alias, Request $request) {
        
        if ($request->isMethod('delete')) {
            $recordEdit = Record::where('id',$alias)->first();
            if ($recordEdit->delete()) {
            return redirect('/')->with('status','Все данные выбранного языка были удалены!');
            }
        }
        
       if ($request->isMethod('post')) {
            
           
            $messages = [
                'required'=>"Нужно обязательно заполнить поле с названием языка!",
                'max'=>"Количество символов в названии языка не должно превышать 255!",
                'unique'=>"Язык с таким наименованием уже присутствует в базе данных!"
            ];
            
            $this->validate($request, [
                'name'=>'required|max:255|unique:records,name,'.$alias
            ], $messages);
            
            //dump($request->all());
           
            
            
            //dump($input);
            
            $input = $request->except('_token');
            
            foreach ($input as $inputcase=>$inputvalue) {
                if ($inputvalue == '') {
                    unset($input[$inputcase]);
                }
            }
            
            if (isset($input['case_sensitive'])) {
                $input['case_sensitive'] = true;
            } else {
                $input['case_sensitive'] = false;
            }
            
           /* $messages = [
                'riquired'=>"Поле :attribute обязательно надо заполнить",
                'email'=>"Неправильный ввод электронной почты в поле :attribute"
            ];*/
            
            /*$validator = Validator::make($input, [
                'name'=>'required|max:255'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('recordAdd')->withErrors($validator)->withInput();
            }*/
            
            
            
            $recordEdit = Record::where('id',$alias)->first();
            $recordEdit->fill($input);
            if ($recordEdit->update()) {
                return redirect('/')->with('status','Данные языка обновлены!');
            }
            
        } else {
        
        if(view()->exists('page_edit')) {
            $records = Record::all();
            $record = new Record();
            
            foreach ($records as $record1) {
                if ($record1->name == $alias) {
                    $record = Record::where('name',$alias)->first();
                }
            }
            
            if ($record == new Record()) {
                abort(404);
            } else {
   
                return view('page_edit')->with([
                    'records' => $records,
                    'record' => $record
                    ]);
            }
        }
        else {
            abort(404);
        }
        }
       
        
    }
    
    public function page_control(Request $request) {
        
        if ($request->isMethod('post')) { 
            
            $data = $request->only('data')['data'];
            
            $records = Record::all();
            $record = Record::where('name',$data[0]['langname'])->first();
            
            
            //return response($data);
            //echo $request->all();
            /*$record->conditions*//*$record->operators*/
            foreach($data as $indx => $item) {
                
                if ($indx != 0 && $item['this'] === 'true' && $item['val'] === $data[0]['val']) {
                    switch ($indx) {
                        //case 0: break;
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                            //if (условие) {блок_операторов;} elseif (условие) {блок_операторов;} else {блок_операторов;};
                            //echo "Это if";shortif conditions
              //$data[1]['check']
                            if ($data[5]['check'] === 'true' && $record->shortif != null && $record->shortif != '') {
                                echo $record->shortif.$record->separated;
                            } else {
$postcon = $data[0]['langname'] === 'Basic' ? ' THEN' : '';
if ($data[4]['check'] === 'true') {
switch ($data[0]['langname']) {
    case 'Basic':
$nlinesbafterdop = 'END IF';
        break;
    default:
$nlinesbafterdop = '';
}
$nlinese = $record->_end;
$nlinesesp = $data[0]['langname'] === 'Python' || $data[0]['langname'] === 'Basic' ? '' : ' ';
$nlinesb = $record->begin_.'
    блок_операторов'.$record->separated.'
';} else {
$nlinese = '';
$nlinesesp = '';
$nlinesbafterdop = '';
$nlinesb = 'оператор'.$record->separated.'
';}
echo $record->if_.' '.$record->conditions.$postcon.' '.$nlinesb;
if ($data[1]['check'] === 'true') {
echo $nlinese.$nlinesesp.$record->_elseif_.$postcon.' '.$record->conditions.' '.$nlinesb;
} if ($data[2]['check'] === 'true') {
echo $nlinese.$nlinesesp.$record->_else.' '.$nlinesb;
}                           
echo $nlinese;
echo $nlinesbafterdop;
if ($data[0]['langname'] === 'Pascal' && $data[4]['check'] === 'true') {
echo $record->separated;
}
                            }
                            break;
                        case 6:
                        case 7:
                        case 8:
                        case 9:
                            //{{ $record->for_ }} {{ $record->for_condition }} {{ $record->begin_ }}<!---->{{ $record->operators }}{{ $record->separated }}<!---->{{ $record->_end }}{{ $record->separated }}
                            //echo "Это for";
if ($data[9]['check'] === 'true') {
$nlinesb = $record->begin_.'
    блок_операторов'.$record->separated.'
'.$record->_end;
} else {
$nlinesb = 'оператор'.$record->separated;}
echo $record->for_.' '.$record->for_condition.' '.$nlinesb;
if ($data[0]['langname'] === 'Basic') {
echo $data[9]['check'] === 'true' ? 'NEXT I' : ' NEXT I';
}
if ($data[0]['langname'] === 'Pascal' && $data[9]['check'] === 'true') {
echo $record->separated;
}
                            break;
                        case 10:
                        case 11:
                            //{{ $record->while_do }} {{ $record->conditions }} {{ $record->begin_ }}<!---->{{ $record->operators }}{{ $record->separated }}<!---->{{ $record->_end }}{{ $record->separated }}
                            //echo "Это wd";
$docon = $data[0]['langname'] === 'Pascal' ? ' do' : '';
if ($data[11]['check'] === 'true') {
$postcon = $data[0]['langname'] === 'Basic' ? 'Loop' : '';
$nlinesb = $record->begin_.'
    блок_операторов'.$record->separated.'
'.$record->_end;
} else {
$postcon = $data[0]['langname'] === 'Basic' ? ' Loop' : '';
$nlinesb = 'оператор'.$record->separated;}
echo $record->while_do.' '.$record->conditions.$docon.' '.$nlinesb.$postcon;
if ($data[0]['langname'] === 'Pascal' && $data[11]['check'] === 'true') {
echo $record->separated;
}
                            break;
                        case 12:
                        case 13:
                            //{{ $record->do_while }} {{ $record->begin_ }}<!---->{{ $record->operators }}{{ $record->separated }}<!---->{{ $record->_end }} {{ $record->while_do }} {{ $record->conditions }}{{ $record->separated }}
                            //echo "Это dw";
//$docon = $data[0]['langname'] === 'Pascal' ? ' do' : '';
if ($data[13]['check'] === 'true') {
//$postcon = $data[0]['langname'] === 'Basic' ? 'Loop Until' : '';
if ($data[0]['langname'] === 'Pascal') {
$nlinesb = '
    блок_операторов'.$record->separated.'
';
} else {
$nlinesb = $record->begin_.'
    блок_операторов'.$record->separated.'
'.$record->_end;
}} else {
//$postcon = $data[0]['langname'] === 'Basic' ? ' Loop Until' : '';
$nlinesb = 'оператор'/*.$record->separated*/;}
echo $record->do_.' '.$nlinesb.' '.$record->do_while.' '.$record->conditions.$record->separated;
/*if ($data[0]['langname'] === 'Pascal' && $data[13]['check'] === 'true') {
echo $record->separated;
}*/
                            break;
                        default:
                            echo "Это неизвестно что";
                        
                    }
                }
            }
        } else {
            abort(404);
        }
        
    }
    
}
