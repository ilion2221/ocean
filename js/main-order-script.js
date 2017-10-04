openFirstBlockOnLoad = function () {
	$('.order-line-wrap.active').find('.order-line-wrap_body').slideDown();
}

openNextBlock = function (data) {
	var block = data;
	block.closest('.order-line-wrap').removeClass('active');
	block.closest('.order-line-wrap').addClass('completed');
	block.slideUp();
	block.closest('.order-line-wrap')
	.next('.order-line-wrap')
	.addClass('active')
	.find('.order-line-wrap_body')
	.slideDown();
}

regLineBlockValidate = function () {
	$('.order-line-wrap_body.reg .validate').validate({
	    errorClass:'error-input',
	    validClass:'success',
	    ignore: ".ignore, *:not([name])",
	    highlight: function (element, errorClass, validClass) { 
	      $(element).closest(".m-input-wrap").addClass(errorClass).removeClass(validClass); 
	      $(element).closest(".m-checkbox").addClass(errorClass).removeClass(validClass); 
	    }, 
	    unhighlight: function (element, errorClass, validClass) { 
	      $(element).closest(".m-input-wrap").removeClass(errorClass).addClass(validClass); 
	      $(element).closest(".m-checkbox").removeClass(errorClass).addClass(validClass); 
	    },
	    submitHandler: function(form) {
		    openNextBlock($('.order-line-wrap_body.reg'));
		  },
		  errorPlacement: function(error, element) {},
	  rules: {
	    name: {
	      required: true
	    },
	    suraname: {
	      required: true
	    },
	    phone: {
	      required: true
	    },
	    mail: {
	      required: true,
				emailfull: true
	    },
	    name2: {
	      required: true,
	    },
	    inn: {
	      required: true,
	    },
	    kpp: {
	      required: true,
	    },
	    adress: {
	      required: true,
	    },
	    rules: {
	    	required: true,
	    }
	  }
  });
}
cartPayLineBlockValidate = function () {
	// alert();
	$('.order-line-wrap_body.cart-pay .validate').validate({
	    errorClass:'error-input',
	    validClass:'success',
	    ignore: ".ignore, *:not([name])",
	    highlight: function (element, errorClass, validClass) { 
	      $(element).closest(".m-input-wrap").addClass(errorClass).removeClass(validClass); 
	    }, 
	    unhighlight: function (element, errorClass, validClass) { 
	      $(element).closest(".m-input-wrap").removeClass(errorClass).addClass(validClass); 
	    },
	    submitHandler: function(form) {
		    
		  },
		  errorPlacement: function(error, element) {},
	  rules: {
	    cartNumber: {
	      required: true
	    }, 
	    name: {
	    	required: true
	    }, 
	    cvc: {
	    	required: true
	    }
	  }
  });
}

deliveryLineBlockValidate = function () {
   if ($('.order-line-wrap_body.delivery input[type="radio"]:checked').length > 0) {
   		$('.order-line-wrap_body.delivery .m-radiobox').removeClass('error');
   		var a = $('.order-line-wrap_body.delivery input[type="radio"]:checked');
   		var b = a.closest('.m-radiobox');
   		if (b.find('.line-textarea').length == 0) {
   			openNextBlock($('.order-line-wrap_body.delivery'));
   		} else {
   			var c = b.find('.line-textarea').find('.m-input-wrap');
   			var d = c.find('textarea');
   			var e = d.attr('data-min-leght');
   			if (d.val().length < parseInt(e)) {
   				c.addClass('error-input');
   			} else {
   				c.removeClass('error-input');
   				openNextBlock($('.order-line-wrap_body.delivery'));
   			}
   		}
   } else {
			$('.order-line-wrap_body.delivery .m-radiobox').addClass('error');
   }
}

payLineBlockValidate = function () {
	if ($('.order-line-wrap_body.pay input[type="radio"]:checked').length > 0) {
   		$('.order-line-wrap_body.pay .m-radiobox').removeClass('error');
			openNextBlock($('.order-line-wrap_body.pay'));
   } else {
			$('.order-line-wrap_body.pay .m-radiobox').addClass('error');
   }
}

$(document).ready(function() {
	if ($('.order-line-wrap').length > 0) {

		// открытие блока с классом '.active' при загрузке страницы
		openFirstBlockOnLoad();

		// добавление класа к инпутам если выбрано юридичиское лицо
		$('.order-line-wrap_body.reg input[type="radio"]').on('change', function () {
			// var validator = $('.order-line-wrap_body.reg .validate').validate();
			// validator.resetForm();
			if($('.order-line-wrap_body.reg #secondBlockTriggerRadio').is(':checked')) {
				$('.order-line-wrap_body.reg .ignore-trigger').removeClass('ignore');
			} else {
				$('.order-line-wrap_body.reg .ignore-trigger').addClass('ignore');
			}
		})

		// валидация блока регистрации при клике на кнопку "далее"
		$('.order-line-wrap_body.reg .next-block-btn button').on('click', function () {
			regLineBlockValidate();
		})

		// валидация блока способа доставки при клике на кнопку "далее"
		$('.order-line-wrap_body.delivery .next-block-btn button').on('click', function () {
			deliveryLineBlockValidate();
		})

		$('.order-line-wrap_body.delivery input[type="radio"]').on('change', function () {
			$('.order-line-wrap_body.delivery .m-radiobox').removeClass('error');
		})

		// валидация блока способа оплаты при клике на кнопку "далее"
		$('.order-line-wrap_body.pay .next-block-btn button').on('click', function () {
			payLineBlockValidate();
			// заполнение даных о получателе в блоке информации
			$('#infoBLockName').html('<span>' + $('#orderSurname').val() + ' ' + $('#orderName').val() + '</span>');
			$('#infoBLockphone').html('<span>' + $('#orderPhone').val() + '</span>');
			$('#infoBLockMail').html('<span>' + $('#orderMail').val() + '</span>');
			var a = $('.order-line-wrap_body.pay input[type="radio"]:checked').siblings('.title').text();
			$('#infoBLockPayvar').html('<span>' + a + '</span>');
		})


		$('.order-line-wrap_body.pay input[type="radio"]').on('change', function () {
			$('.order-line-wrap_body.pay .m-radiobox').removeClass('error');
		})

		// заполнение даных о товарах в корзине в блоке информации
		// $('.order-line-wrap_body.info .items-wrap.first').empty();
		// $('.cart-wrap_left-block_line').each(function () {
		// 	var th = $(this);
		// 	var name = th.find('.text-wrap').find('text').text();
		// 	var count = th.find('.counter').find('input').val();
		// 	var price = th.find('.price').text().replace(/\D+/g,"")
		// 	var line = '<div class="line clearfix"><div class="text"><span>' + name + '</span></div><div class="price"><span>' + abc(price) + '</span><span class="rouble">й</span></div><div class="numb"><span>' + count + '</span></div></div>'
		// 	$('.order-line-wrap_body.info .items-wrap.first').append(line);
		// })
		// заполнение даных о ценах в корзине в блоке информации
		var delivery = $('#deliveryPrice').text().replace(/\D+/g,"");
		var discount = $('#goodsDiscount').text().replace(/\D+/g,"");
		var ttlPrice = $('#ttlPrice2').text().replace(/\D+/g,"");
		$('#infoBlockdelivery').html('<span>' + abc(delivery) + '</span><span class="rouble">й</span>');
		$('#infoBlockDiscount').html('<span>' + abc(discount) + '</span><span class="rouble">й</span>');
		$('#infoBlockTtlPrice').html('<span>' + abc(ttlPrice) + '</span><span class="rouble">й</span>');


		// открытие блока оплаты картой при клике на кнопку "ПОДТВЕРДИТЬ"
		$('.order-line-wrap_body.info .next-block-btn button').on('click', function () {
			 openNextBlock($('.order-line-wrap_body.info'));
		})

		// валидация блока оплаты картой при клике на кнопку "ОПЛАТИТЬ"
		$('.order-line-wrap_body.cart-pay .next-block-btn button').on('click', function () {
			cartPayLineBlockValidate();
		})

		$('.cart-mask').mask('0000-0000-0000-0000');
		$('.cvc-mask').mask('000');

		// изменить уже заполненый блок по клике на кнопку "ИЗМЕНИТЬ"
		$('.order-line-wrap_title .change-btn').on('click', function () {
			$('.order-line-wrap.active').removeClass('active').find('.order-line-wrap_body').slideUp();
			$(this).closest('.order-line-wrap').removeClass('completed').addClass('active').find('.order-line-wrap_body').slideDown();
			return false;
		})

		// удаление блока входа и открытие первого блока оформления заказа при клике на кнопку "продолжыть"
		$('.order-login-block .login-wrap_reg-side_button a').on('click', function () {
			$('.order-login-block').slideUp();
			$('.order-line-wrap').eq(0).addClass('active');
			openFirstBlockOnLoad();
			return false;
		})

	}
})

jQuery.validator.addMethod("emailfull", function(value, element) {
  return this.optional(element) || /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i.test(value);
}, "Please enter valid email address!");