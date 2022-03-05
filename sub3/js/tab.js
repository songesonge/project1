

$(function() {                                   

  
 var fragment = $('#Tab #sessions li a.current').attr('href');   
    
 fragment = fragment.replace('#', ' #');                 
 $('#details').load(fragment); 
    
  $('#Tab #sessions li a').on('click', function(e) { 
    e.preventDefault();                                     
    fragment = this.href;                               

    fragment = fragment.replace('#', ' #');  
    $('#details').load(fragment);                          

    $('#sessions a.current').removeClass('current');       
    $(this).addClass('current');
  });



});