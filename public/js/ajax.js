jQuery(document).ready(function($){
    $(".dropdown-toggle").on("click", function(){
        
            if($(this).attr("aria-expanded") == 'false'){
	       $(this).attr("aria-expanded","true");
               $("li.dropdown").addClass("open");
	    }else{
	       $(this).attr("aria-expanded","false");
               $("li.dropdown").removeClass("open");
	    }
     	
        

	});
    $(".excontrol").on("click", function(/*e*/){
        //e.preventDefault();
        //alert('d');
        
        //var tttt = 'ddfege\n\sdvsd\n\egr';
        //alert(tttt);
        
        var data = new Array();
        
        /*if ($(this).attr('type') == 'checkbox') {
            data['val'] = $(this).val();
            data['check'] = $(this).prop('checked');
            data['type'] = $(this).attr('type');
            //alert(check + ' ' + val);
        } else if ($(this).attr('type') == 'radio') {
            data['name'] = $(this).attr('name');
            data['val'] = $(this).val();
            data['type'] = $(this).attr('type');
            //alert(name + ' ' + val);
        } else {
            data['type'] = false;
            alert('Ошибка! Это не радиокнопка и не чекбокс!');
        }*/
        //alert($('[name = "_token"]').val());
        
        var thisli = $(this).attr('name');
        data[0] = {};
        data[0]['val'] = $(this).val();
        data[0]['langname'] = $(this).data('langname')
        
        var printpre = '.preif';
        
        $(".excontrol").each(function(indx, element){
            
            //console.log(indx);
            //console.log($(element).attr('type'));
            //console.log($(element).prop('checked'));
            
            //console.log($(element).attr('name'));
            //console.log($(element).attr('val'));
            
            //console.log($(element).attr('name') + $(element).attr('val'));
            
            data[indx + 1] = {};
            data[indx + 1]['this'] = $(element).attr('name') === thisli ? true : false;
            data[indx + 1]['name'] = $(element).attr('name');
            data[indx + 1]['type'] = $(element).attr('type');
            data[indx + 1]['check'] = $(element).prop('checked');
            data[indx + 1]['val'] = $(element).val();
            
            //console.log(data[$(element).attr('name') + $(element).attr('val')]);
            
            if ($(element).attr('name') === thisli && $(element).val() === data[0]['val']) {
                switch (indx + 1) {
                    //case 0: break;
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                        printpre = '.preif';
                        break;
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        printpre = '.prefor';
                        break;
                    case 10:
                    case 11:
                        printpre = '.prewd';
                        break;
                    case 12:
                    case 13:
                        printpre = '.predw';
                }
            }
            
        });
        //console.log(data);
        
        $.ajax({
            type: 'POST',
            url: '/control/page',
            data: {
                data: data,
                //type: data['type'],
                //name: data['name'],
                //val: data['val'],
                //check: data['check'],
                _token : $('[name = "_token"]').val()
            },
            success: function(data) {
                    //var jdata = JSON.parse(data);
                    //$("#results").html('<div><div class="toprev"><div class="namerev">' + jdata[0]['NAME'] + '</div><div class="smalrev">' + jdata[0]['DATE_CREATE'] + '</div></div><div class="rev">' + jdata[0]['DETAIL_TEXT'] + '</div></div>');
                    //console.log(jdata[0]['NAME']);
                    $(printpre).html(data);
                    //console.log(data);
            },
            error: function(xhr, str) {
                    //clearInterval(intervalChatID);
                    alert("Возникла ошибка!");
            }
        });
        
        
        /*function onAjaxSuccess() {
            console.log('data');
	}*/
        
    });

});