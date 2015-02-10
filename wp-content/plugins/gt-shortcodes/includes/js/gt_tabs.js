jQuery(document).ready(function ($) {

    var tabs = $('ul.tabs');
    tabs.each(function (i) {
        //Get all tabs
        var tab = $(this).find('> li > a');
        $("ul.tabs li:first").addClass("active").fadeIn(); //Activate first tab
        $("ul.tabs li:first a").addClass("active").fadeIn(); //Activate first tab
        $("ul.tabs-content li:first").addClass("active").fadeIn(); //Activate first tab
        tab.click(function (e) {
            //Get Location of tab's content
            var contentLocation = $(this).attr('href') + "Tab";
            //Let go if not a hashed one
            if (contentLocation.charAt(0) == "#") {
                e.preventDefault();
                //Make Tab Active
                tab.removeClass('active');
                $(this).addClass('active');
                //Show Tab Content & add active class
                $(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
            }
        });
    });

});