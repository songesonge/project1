// JavaScript Document

$(document).ready(function() {

  var smh=$('.visual').height();                       
    var on_off=false;
        $('#headerArea').mouseenter(function(){                         //마우스 호버시           
            $(this).css('background','#fcfcfc');            //헤더 백그라운드                       
            on_off=true;
        });
    
       $('#headerArea').mouseleave(function(){                          // 마우스 아웃,  스크롤 내려갈때& 스크롤 안 내려갔을때
            var scroll = $(window).scrollTop();                         // 스크롤 내렸을 때 거리 리턴함
            
                                    
            if(scroll>=0 && scroll<smh-300){
                $(this).css('background','rgba(255,255,255,0)'); $('.dropdownmenu li h3').css('color','#444');   //투명배경
            }else if(scroll>smh-300){
                $(this).css('background','#fff'); $('.dropdownmenu li h3').css('color','#777');                  //하양배경 검정
            }
            on_off=false;    
       });
    
       $(window).on('scroll',function(){                                  //스크롤의 거리가 발생하면( 내렸을때-window)
            var scroll = $(window).scrollTop();

                         
            if(scroll>smh-300){                                             //스크롤이 비주얼보다 컸을 때
                $('#headerArea').css('background','rgba(255,255,255,1)').css('box-shadow','0 0 2px #999');
                
            }else{                                                                //스크롤 내리기 전 디폴트(마우스올리지않음)
                if(on_off==false){
                    $('#headerArea').css('background','rgba(255,255,255,0)').css('box-shadow','0 0 10px #999');
                    
                }
            }; 
            
         });

  //$('ul.dropdownmenu li ul').hide();     마우스 올라가면 해더높이 넓히고 색상 바뀌게

  $('ul.dropdownmenu li.menu').hover(
     function() { 
              $('ul', this).fadeIn('slow',function(){$(this).stop();});    //서브 나타나게 하기
              $('a.depth1', this).css('color','#0c0c83');                       //색상 바꾸기
              $('#headerArea').animate({height:241},'fast').clearQueue();   //헤더높이 높이기
     },function() {
              $('ul', this).fadeOut('fast');                                //서브 사라지게 하기
              $('a.depth1', this).css('color','#333');                      //원래 색상으로 돌아가게
              $('#headerArea').animate({height:185},'fast').clearQueue();    //헤더높이 원래로 돌리기
   });


   


   //.clearQueue()
   //키보드 tab처리
   $('ul.dropdownmenu li.menu .depth1').on('focus', function () {   //1depth a태그가 포커스를 받을때     
      $(this).parents('.menu').find('ul').fadeIn('fast'); //자신의 1depth에 있는 서브(ul)만 열어라
      $(this).parents('.menu').siblings().find('ul').fadeOut('fast'); //자신을 제외한 나머지 모든 1depth에 있는 서브(ul)를 닫아라
      $('#headerArea').animate({height:241},'fast').clearQueue();
    });

  $('ul.dropdownmenu li.m6 li:last a').on('blur', function () {    //1depth a태그가 포커스를 잃을때     
       $('ul.dropdownmenu li.m6 ul').fadeOut('fast');             // 가장 마지막에 위치한 1depth에 서브메뉴를 닫아라
       $('#headerArea').animate({height:185},'fast').clearQueue();
  });
});




//상단으로 이동 버튼
$('.topMove').hide();
           
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
     var scroll = $(window).scrollTop(); //스크롤의 거리
    
    
    //  $('.text').text(scroll);

     if(scroll>500){ //500이상의 거리가 발생되면
         $('.topMove').fadeIn('slow');  //top보여라~~~~
     }else{
         $('.topMove').fadeOut('fast');//top안보여라~~~~
     }
});

 $('.topMove').click(function(e){
    e.preventDefault();
     //상단으로 스르륵 이동합니다.
    $("html,body").stop().animate({"scrollTop":0},1000); 
 });
