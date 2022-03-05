$(document).ready(function () {
   
    
    $('.product a').each(function (index) {  
        $(this).click(function(e){    
            e.preventDefault();  

            $('.wrap #back').show()
            $('.product_info .info').hide(); 
            $('.product_info .info_'+ (index+1)).fadeIn('fast'); 
            
       });
        
    $('.wrap #back, .btnClose').click(function(e){ 
        e.preventDefault();  

        $('.wrap #back').hide()  
        $('.product_info .info').hide(); 
    });
        
    });
    
});