jQuery(document).ready(function ()
{
    $('#main_page').click(function(){
        $('#contact_page').removeClass('selected');
        $('#main_page').addClass('selected');
        
    });
    
    $('#contact_page').click(function(){
        $('#main_page').removeClass('selected');
        $('#contact_page').addClass('selected');
        $('#maincontent').empty();
    });
    
    $('#email').click(function(){
        $('#email').attr('style','color:"", border-color:""; margin-top: 10px;');
    });
    $('#name').click(function(){
        $('#name').attr('style','color:"", border-color:"";');
    });

    $.ajax({
        url: "/getAllTems", // show simular
        dataType: 'json',
        type: 'GET',
        //data : $form.serialize()+'&ajax=objects-appartment-grid&show=1',
        success: function (data) {
            $.each(data.tems, function (key, value) {
                $('#tems').append('<dt class="temlist" id=' + value + '><a href="javascript:void(o);">' + value + '</a></dt>');
            })

        }
    });

    $('.temlist').live('click', function () {
        var id = $(this).attr('id');
        sendAjaxTest(id);
        $('#email').val('');
        $('#name').val('');
    });
    
    $('.answer').live('click', function () {
       var id=$(this).attr('id');
       var quest_num=id.slice(0,1);
       for (var i = 1; i <= 5; i++) {
           $("#"+quest_num+""+i).removeClass('checked');
       }
       $("#"+id).addClass('checked');
    });
    
    $('#ans').live('click', function () {
        var N=$('#form_test div').last().attr('id').slice(1,3);
        var idd;
        var num_ans=0;
        for (var i = 1; i <= N; i++) {
            idd=parseInt(i+''+($.cookie('q'+i)));
            
            if($("#"+idd).hasClass('checked')){
                num_ans++;
            }
        }
        
        var name = $('#name').val();
        var email = $('#email').val();
        
        $.ajax({
            url: "/showres", // show simular
            dataType: 'json',
            type: 'GET',
            data: 'num_ans='+num_ans+'&name='+name+'&email='+email,
            success: function (data) {
                if(data.ok==1){
                    alert('Ви набрали: '+num_ans+' балів');
                    $('#maincontent').empty();
                    $('#maincontent').append('<div><h3> Ваш результат: '+num_ans+'</h3></div>');
                    $('#email').val('');
                    $('#name').val('');
                }else{
                    var mes='';
                    $.each(data.error, function (key, value) {
                        mes=mes+value+'; ';
                    });
                    alert(mes);
                    window.scroll(0,0);
                    $('#email').attr('style','color:red; border-color: red;');
                    $('#name').attr('style','color:red; border-color: red;')
                }
                
            }
        });
        
 //       window.location = "index.php";

    });


});
function sendAjaxTest(temname) {
    $.ajax({
        url: "/starttest/"+temname, // show simular
        dataType: 'json',
        type: 'GET',
        success: function (data) {
            $('.mainCol h1').empty();
            $('#maincontent').empty();
            $('#maincontent').append('<form id="form_test"></form>');
            var quest=data.quest_ans_res.quest;
            var rez=data.quest_ans_res.rez;
            var ans=data.quest_ans_res.ans;
            for (var ii in rez) {
               $.cookie('q'+ii, null); 
            }
            var i=1;
            var j;
            $.each(quest, function (key, value) {
                $('#form_test').append('<div id="q'+i+'"><h3>'+i+'.'+value+'</h3></div>');
                $.cookie('q'+i, rez[i]);
                i++;
            });
            i=1;
            $.each(ans, function (key, value) {
                j=1;
                $.each(value, function (key1, value1) {
                    $('#q'+i).append('<input class="answer" type="radio" id='+i+''+j+' value="'+value1+'" name="'+i+'">'+value1+'</input></br>');
                    j++;
                });
                i++;
            });
            $('#form_test').append('<input id="ans" type="button" value="Відповісти">') ;
        }
    });
}