/*global*/
$("a").on("click",function(){
    $(this).toggleClass("active");
});
$(".addnews").click(function(){
    $(".fetch-news").fadeOut();
});
