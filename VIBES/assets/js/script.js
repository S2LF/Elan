

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

