$(document).ready(function() {
    var position=-0;  //理쒖큹�꾩튂
    var movesize=298; //�대�吏� �섎굹�� �덈퉬

    // var timeonoff;
   
    $('.slide_gallery ul').after($('.slide_gallery ul').clone());

//     //�먮룞 ��吏곸엫(�대┃�섎㈃ 二쎌엫)
//     timeonoff= setInterval(function () {
//            position-=movesize;  // 150�� 媛먯냼
//        $('.slide_gallery').stop().animate({left:position}, 'fast',
//             function(){							
//            if(position==-750){
//               $('.slide_gallery').css('left',0);
//               position=0;
//            }
//        });
//    }, 2000);
   
    
    
        //�щ씪�대뱶 寃붾윭由щ� �쒕쾲 蹂듭젣
 
  $('.button').click(function(e){
     e.preventDefault();

    //  clearInterval(timeonoff);
     
     if($(this).is('.m1')){ //�댁쟾踰꾪듉 �대┃
          if(position==-1788){
              $('.slide_gallery').css('left',-0);
               position=-0;
           }
         
          position-=movesize;  // 150�� 媛먯냼
              $('.slide_gallery').stop().animate({left:position}, 'fast',
                function(){							
                    if(position==-1788){
                        $('.slide_gallery').css('left',-0);
                        position=-0;
                    }
                });
     }else if($(this).is('.m2')){ //�ㅼ쓬踰꾪듉 �대┃
           if(position==-0){ // 泥섏쓬�� �ㅼ쓬踰꾪듉�� �대┃�섎㈃ 鍮좊Ⅴ寃� ��꺼二쇨린(�댁쟾 踰꾪듉�� �먮옒 �덉쑝�� 愿쒖텣)
                $('.slide_gallery').css('left',-1788);
                position=-1788;
            }
 
            position+=movesize; // 150�� 利앷�
            $('.slide_gallery').stop().animate({left:position}, 'fast',
                function(){ // �щЦ : �ㅼ쓬踰꾪듉 �대┃�덉쓣 �� �대�吏� �꾩튂媛� 0�쇨꼍�� ��꺼二쇨린				
                    if(position==-0){
                        $('.slide_gallery').css('left',-1788);
                        position=-1788;
                    }
                });
      }
   });

   //�대━怨좎떢�쇰㈃ esefr
});