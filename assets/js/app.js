//Accordion
$('.ui.accordion').accordion();

// hide image when loading page & show it when loading is finish
window.onload = function () {
    var x = document.getElementsByClassName("placeholder");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    $(".image").show();
};

//show more & less desription in detail league
$("#btn_description_more").on("click", function () {
    $("#btn_description_less").show();
    $("#btn_description_more").hide();
    $("#description_detail_league").css("height", "100%");
});
$("#btn_description_less").on("click", function () {
    $("#btn_description_less").hide();
    $("#btn_description_more").show();
    $("#description_detail_league").css("height", "20rem");
});

// $('.image img')
//     .visibility({
//         type: 'image',
//         transition: 'fade in',
//         duration: 2000
//     });

// $('.card .link.cards')
//     .visibility({
//         once: false,
//         // update size when new content loads
//         observeChanges: true,
//         // load content on bottom edge visible
//         onBottomVisible: function () {
//             // loads a max of 5 times
//             window.loadFakeContent();
//         }
//     });

