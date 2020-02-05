console.log("JQUERY version "+jQuery().jquery)


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

    $('#filters a').removeClass('active')
    $(this).addClass('active');
})

// // Class active sur le filtre actif
// $('#filters a').on("click", function(){



// })



// Gestion du Details
$("summary").on('click', function(e){
    e.stopPropagation();
        $("details").removeAttr("open")
        $(this).attr("open")
})

// Gestion goutte
$("div#goutteMain").on('click', function(){
    $("div.goutte ul").toggleClass("display")
})

// Pink
$(".pink").on('click', function(){
    $(':root').css('--main-color', '#e85682')
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


// $("#burgerNav").on('click', function(){

//     $("nav").toggleClass('menu-mobile')

// })

// BurgerNav on Click
$("#burgerNav").on('click', function(){
    $('nav').toggleClass('mobileDisplay')

    if($('nav').hasClass("mobileDisplay")) {
        $('nav').css('margin-right', '10px')
    }
    else {
        $('nav').css('margin-right', '-190px')
    }
})