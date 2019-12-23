
// Gestion des filtres Gallery
$("#filters a").on("click", function(event){
    event.preventDefault()
    let filter = $(this).attr("id")
    let classToAnim = ".gallery-"+filter
    $("#"+filter+"").css("color:#e85682")
    if (filter == "all"){
        $(".boxsize").show()
    } else {
        $(".boxsize").hide()
        $(classToAnim).addClass("img-animee").show()
    }

})


// Gestion du Details
$("details").on('click', function(){
        $("details").removeAttr("open")
        $(this).attr("open")
})

// Gestion goutte
$("div#goutteMain").on('click', function(){
    $("div.goutte ul").toggleClass("display")
})


// Red
$(".red").on('click', function(){
    $(':root').css('--main-color', 'red')
})
// Blue
$(".blue").on('click', function(){
    $(':root').css('--main-color', 'blue')
})
// Purple
$(".purple").on('click', function(){
    $(':root').css('--main-color', 'purple')
})

// $('.red').toggle(function () {
//     $("dl>dt>i").css('color', 'red');
// }, function () {
//     $("#user_button").css('');
// });


$("#burgerNav").on('click', function(){

    $("nav").toggleClass('menu-mobile')

})