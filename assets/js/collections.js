$(document).ready(function () {
    $(".collection-tab-button").on("click", function () {
        var tabId = $(this).attr("data-tab");

        $(".collection-tab-button").removeClass("active");
        $(".collection-tab-content").removeClass("active");
        $(".collection-prev-text").removeClass("active");

        $(this).addClass("active");
        $("#" + tabId).addClass("active");
        $("#" + tabId + '_text').addClass("active");

        var newImage = "big.png";
        switch (tabId) {
            case 'collection1':
                newImage = "big.png";
                break;
            case 'collection2':
                newImage = "big_blue.png";
                break;
            case 'collection3':
                newImage = "big_green.png";
                break;
            case 'collection4':
                newImage = "big_pink.png";
                break;
        }

        $(".pattern_line img").attr("src", "assets/img/patterns/" + newImage);
    });
});