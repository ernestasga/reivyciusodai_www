
$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#txt_search").keyup(function(){
        var search = $(this).val();
        if(search != ""){
            clear();
        }
        if(search != "" && search.length>=2){
            var timer;
            var timeout = 500;
            clearTimeout(timer);
            timer = setTimeout(function() {
                $.ajax({
                    url: '/search',
                    type: 'post',
                    data: {_token: CSRF_TOKEN, term: search},
                    dataType: 'json',
                    success:function(response){
                        var len = response.length;
                        $("#searchResult").empty();
                        if(len==0){
                            $("#searchResult").html(
                                "<li class='list-group-item'><b>Nieko nerasta...</b></li>");
                        }
                        for( var i = 0; i<len; i++){
                            var name = response[i]['title'];
                            var url = response[i]['url'];
                            var type = response[i]['type'];
                            $("#searchResult").append(
                                "<li class='list-group-item'><a href="+url+"><b>"+name+"</b></a><br><p>"+convertType(type)+"</p></li>");
                        }
                        $("#searchResult li").bind("click",function(){
                            window.location.href = $(this).find('a').attr('href')
                        });
                    }
                });
            }, timeout);
        }
    });
    $("#clear_search").click(function(){
        clear();
        $("#txt_search").val("");
    });

});
function clear(){
    $("#searchResult").empty();
}
function convertType(type){
    if(type == 'products'){
        return 'Sodinukai';
    }else if(type == 'categories'){
        return 'Augalai';
    }else if(type == 'posts'){
        return 'Įrašai';
    }
}
