$(window).ready(function(){
    $("#logo").hover(function(){light()},function(){normal()});
    $("#dark").hover(function(){dark()}, function(){normal()});
   });

 var light = function(){
    $("body").css({'background-color':'rgba(43,104,178,1)','transition':'all 1.5s ease-out'});
    $('#dark').css({'opacity':0.5});
   $('#description').css({'font-size':'.4em','opacity':0.5,'transition':'all 1.5s ease-out'}); 
   
    $('#CominSoon').css({'color':'#18b58a','font-size':'3em','opacity':'1','transition':'all 1.5s ease-out'});
   }
 
 var dark = function(){
    $("body").css({'background-color':'rgba(13,31,53,1)','transition':'all 1.5s ease-out'});
    $('#light').css({'opacity':0.5});
   }
 var normal = function(){
     $("body").css({'background-color':'#18b58a'});
      // $('#SwiftDoc').css({'color':'#ffffff','transition':'all 1.5s ease-out'});
     $('#light').css({'opacity':''}); 
    $("#logo").css({'width':'','transition':'all 2s ease-out'});
    $('#CominSoon').css({'color':'#18b58a','font-size':'0em','opacity':'0','transition':'all 1.5s ease-out'});
   $('#description').css({'font-size':'1.2em','opacity':1,'transition':'all 1.5s ease-out'}); 
   }