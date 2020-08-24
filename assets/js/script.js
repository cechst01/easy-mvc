$(function(){

$('.ajax-delete').on('click',function(event){
    event.preventDefault();
    var request = $.ajax({
        url: $(this).attr('href'),
        type: 'GET'
    });
    
    request.done(function(response){        
        if($.isNumeric(response) && response != 0){
           var row = '.user-'+response;
           $(row).remove(); 
        }
        else{
            var div = $('<div class="message"></div>');
                div.text(response);
                div.appendTo($('.messages'));
        }
        
    });
});


}); 


