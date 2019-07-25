(function( $ ) {

function triggerError(input) {
	var container = input.closest(".dplr-input-section");
	container.addClass('input-error');
	container.removeClass('tooltip-hide');
	container.find(".tooltip-container span").html(input.attr("data-validation-fixed"));
}

function validateEmail(emailElement){
	var email = emailElement.val();
	var container = emailElement.closest(".dplr-input-section");

	if (email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
		container.removeClass('input-error');
		container.addClass('tooltip-hide');
	} else {
		container.find(".tooltip-container span").html(emailElement.attr("data-validation-email"));
		container.addClass('input-error');
		container.removeClass('tooltip-hide');
	}
}

function validateRequired(requiredElement) {
	var value = requiredElement.val();
	var container = requiredElement.closest(".dplr-input-section");

	if (value) {
		container.removeClass('input-error');
		container.addClass('tooltip-hide');
	} else {
		container.find(".tooltip-container span").html(requiredElement.attr("data-validation-required"));
		container.addClass('input-error');
		container.removeClass('tooltip-hide');
	}
}

function hideUserApiError(){
	$('.tooltip--user_api_error').css('display','none');
}

$(document).ready(function(){

	$("input[data-validation-fixed]").each(function() {
		hideUserApiError();
		triggerError($(this));
	});

	$("input[data-validation-email]").focusout(function() {
		hideUserApiError();
		validateEmail($(this));
	});

	$("input[data-validation-required]").focusout(function() {
		hideUserApiError();
		validateRequired($(this));
	});

	$(".dplr-input-section input[type='text']").focusin(function(e) {
		$(this).closest(".dplr-input-section").addClass("notempty");
		$(this).addClass("notempty");

	});
	$(".dplr-input-section input[type='text']").focusout(function(e) {
		if( $(this).val() == ""){
			$(this).closest(".dplr-input-section").removeClass("notempty");
			$(this).removeClass("notempty");
		}
	});

	$("#dplr-connect-form").submit(function(event) {
		var button = $(this).find('button');
		button.addClass("button--loading");

		validateEmail($("input[data-validation-email]"));
		validateRequired($("input[data-validation-required]"));

		var inputErrors = $(this).children(".input-error");

		if(inputErrors.length > 0){
			event.preventDefault();
			button.removeClass("button--loading");
		}
	});

	$("#dplr-connect-form.error label input[type='text']").keyup(function(event) {
		$(".error").each(function(index, el) {
			$(this).removeClass('error');
		});
	});

	$(".multiple-selec").each(function(){
		var elem = $(this);
		var elemID = elem.attr('id');
		if(elemID != 'widget-dplr_subscription_widget-__i__-selected_lists'){
			elem.chosen({
				width: "100%",

			});
			elem.addClass('selecAdded');
		}
	});

	$( ".sortable" ).sortable({
		placeholder: "ui-state-mark"
	});

	$( ".sortable" ).disableSelection();

	/*
	var fields = {
		container: $("ul#formFields"),

		items: [],
		addItem: function(item) {
			var domElement = $(item.renderItem());
			var _this = this;
			this.items.push(item);
			domElement.find(".icon-close").on("click", function(){
				$(this).parent().remove();
			});
			this.container.append(domElement);
		},
		removeItem: function(element) {

		}
	};*/

	$("body").on('click', "li .alt-toggle", function(e) {
		$(this).closest('li').toggleClass('active');
	});

	$(".dplr-toggle-thankyou").change(function(){
		var o = $('.dplr-toggle-thankyou:checked').val();
		if(o === 'yes'){
			$('.dplr_thankyou_url input').attr('required','required');
			$('.dplr_thankyou_url').css('display','inline');
			$('.dplr_confirmation_message').val('').css('display','none');
		}else{
			$('.dplr_thankyou_url input').removeAttr('required');
			$('.dplr_thankyou_url').val('').css('display','none');
			$('.dplr_confirmation_message').css('display','inline');
		}
	});

	$(".dplr-toggle-consent").change(function(){
		var o = $('.dplr-toggle-consent:checked').val();
		if(o === 'yes'){
			$('#dplr_consent_section').fadeIn();
		}else{
			$('#dplr_consent_section').fadeOut();
		}
	});

	if($('.dplr-toggle-selector').length>0){
		if($('.dplr-toggle-selector:checked').val() === 'yes'){
			$('.dplr_colorpicker_replace').css('visibility', 'visible');
		}
	}

	$(".dplr-toggle-selector").change(function(){
		var o = $('.dplr-toggle-selector:checked').val();
		if(o === 'yes'){
			$('.dplr_colorpicker_replace').css('visibility', 'visible');
		}else{
			$('.dplr_colorpicker_replace').css('visibility', 'hidden');
			$('#color-picker').removeClass('active');
		}
	});

	if($('#dplr-dialog-confirm').length>0){
		$("#dplr-dialog-confirm").dialog({
			autoOpen: false,
			resizable: false,
			height: "auto",
			width: 400,
			modal: true
		});
	}

	$(".dplr-remove").click(function(e) {
		
		e.preventDefault();
		var l = $(this).attr("href");

		$("#dplr-dialog-confirm").dialog("option", "buttons", [{
		  text: object_string.Delete,
		  click: function() {
			window.location.href = l;
		  }
		}, {
		  text: object_string.Cancel,
		  click: function() {
			$(this).dialog("close");
		  }
		}]);

		$("#dplr-dialog-confirm").dialog("open");
	  
	});

});

$(document).on('widget-updated',  function(e, elem){
	select = elem.find("form select.multiple-selec");
	select.chosen({
		width: "100%"

	});
});

$(document).on('widget-added', function(e, elem){
	select = elem.find("form select.multiple-selec");
	select.chosen({
		width: "100%",
	});
});

})( jQuery );
