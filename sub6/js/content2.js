// JavaScript Document

//tab
$(document).ready(function(){
    var cnt=3; 
    $("#content .contlist").hide();
    $('#content .contlist:eq(0)').show(); 
    $('#content .tab1').addClass('current');
        
      $('#content .tab').click(function(e){
        e.preventDefault();  
        
        var ind = $(this).index('#content .tab'); 

        $("#content .contlist").hide(); 
        $("#content .contlist:eq("+ind+")").fadeIn('fast');
        $('.tab').removeClass('current')        
        $(this).addClass('current'); 
        
    });

    /* FAQ */

    var article = $('.faq .article');  
        article.find('.a').slideUp(100); 
        article.find('.icon').html('<i class="fas fa-chevron-down"></i>');
	
	$('.faq .article .trigger').click(function(e){  
	    e.preventDefault();  
        var myArticle = $(this).parents('.article'); 
	
        if(myArticle.hasClass('hide')){ 
            article.find('.a').slideUp(100); 
            article.removeClass('show').addClass('hide');
            article.find('.icon').html('<i class="fas fa-chevron-down"></i>');

            myArticle.removeClass('hide').addClass('show'); 
            myArticle.find('.a').slideDown(100);  
            myArticle.find('.icon').html('<i class="fas fa-chevron-up"></i>');
        } else {  
            myArticle.removeClass('show').addClass('hide');  
            myArticle.find('.a').slideUp(100);  
            myArticle.find('.icon').html('<i class="fas fa-chevron-down"></i>');
        }  
  });
  
  //all open close
  $('.all').toggle(function(e){
        e.preventDefault(); 
        article.find('.a').slideDown(100);
        article.removeClass('hide').addClass('show');
        article.find('.icon').html('<i class="fas fa-chevron-up"></i>');
        $(this).text('모두 열기');
  },function(e){
        e.preventDefault(); 
        article.find('.a').slideUp(100);
        article.removeClass('show').addClass('hide');
        article.find('.icon').html('<i class="fas fa-chevron-down"></i>');
        $(this).text('모두 닫기');
  });

  });