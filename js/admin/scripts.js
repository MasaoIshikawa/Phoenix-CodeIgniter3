(function($){
function left_menu(){
	var leftMenu = $("#left-menu").hide();
	var pageBody = $("#page-body").css("min-height", 10 + 'px');
	var pageBodyHeight = $("#wrapper").innerHeight() - $(".navbar").innerHeight() -  $("footer").innerHeight();
	/*pageBody.css("min-height", pageBodyHeight);*/
	var leftMenuHeight = pageBodyHeight + 'px';
	console.log(pageBodyHeight);
	leftMenu.show();
	leftMenu.css('height', leftMenuHeight);
};
/*setTimeout(left_menu,1);*/
left_menu();
$( window ).resize(function() {
	left_menu();
});
})(jQuery);

/*function setupLabel(el) { 
        if($(el).hasClass('c-on')){

            $(el).find("input[type='checkbox']").removeAttr('checked');
            $(el).removeClass('c-on');

        }else {

             $(el).find("input[type='checkbox']").attr('checked',true);
            $(el).addClass('c-on');
        }
    };
    $(document).ready(function(){
        $('.label-check').click(function(){
           
		    setupLabel(this);

        });
        
    });
*/
