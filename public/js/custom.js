$(document).ready(function () {
    $(window).on("scroll load resize", function () {
        navbarOpacity();
    });

    function navbarOpacity() {
        if (document.documentElement.scrollTop > 20)
            $(".navbar").css({'background-color': 'rgb(243, 255, 176, 1)'});
            
        else 
        $(".navbar").css({'background-color': 'rgb(243, 255, 176, 0)'});
    }
});