$(document).ready(function () {

    //* Global ajaxsetup for multiple requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        }
    });

    $('.apply_coupon_btn').click(function (e) {
        e.preventDefault();
        var coupon_code = $('.coupon_code').val();
        if($.trim(coupon_code).length == 0)
        {
            error_coupon = "Please enter valid Coupon";
            $('#error_coupon').text(error_coupon);
        }
        else {
            error_coupon = '';
            $('#error_coupon').text(error_coupon);

        }
        if(error_coupon != '')
        {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "/check-coupon-code",
            data: {
                'coupon_code': coupon_code
            },
            success: function (response) {
                if(response.error_status == 'error')
                {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    $('.coupon_code').val('');
                }
                else{
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    var discount_price =  response.discount_price;
                    var grand_total_price = response.grand_total_price;
                    //alert(discount_price);
                    $('.coupon_code').prop('readonly',true);
                    $('.discount_price').text(discount_price);
                    $('.grandtotal_price').text(grand_total_price);
                }

            }
        });
    });

    $('.razorpay_pay_btn').click(function (e) {
        e.preventDefault();
        var data = {
            '_token': $('input[name= _token]').val(),
            'first_name': $('input[name= first_name ]').val(),
            'last_name': $('input[name=last_name ]').val(),
            'phone_no': $('input[name=phone_no ]').val(),
            'alternate_no': $('input[name=alternate_no ]').val(),
            'address1': $('input[name=address1 ]').val(),
            'address2': $('input[name=address2 ]').val(),
            'city': $('input[name= city ]').val(),
            'state': $('input[name=state ]').val(),
            'pincode': $('input[name=pincode ]').val(),
        }
        $.ajax({
            url: '/confirm-razorpay-payment',
            method: "POST",
            data: data,
            success: function (response) {
                if (response.status_code == "no_data_in_cart") {
                    window.location.href = "/cart"
                }
                else {
                    //* "amount": (1 * 100),  (Testing purpose)
                    var options = {
                        "key": "rzp_live_tW4u0u9itSFVPM", // Enter the Key ID generated from the Dashboard
                        "amount": (response.total_price * 100), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "name": "Ekart",
                        "description": "Thank you for purchasing",
                        "image": "http://127.0.0.1:8000/assets/img/logo.png",

                        "handler": function (razorpay_response) {
                            $.ajax({
                                url: '/place-order',
                                method: "POST",
                                data: {
                                    '_token': $('input[name= _token]').val(),
                                    'razorpay_payment_id': razorpay_response.razorpay_payment_id,
                                    'first_name': response.first_name,
                                    'last_name': response.last_name,
                                    'phone_no': response.phone_no,
                                    'alternate_no': response.alternate_no,
                                    'address1': response.address1,
                                    'address2': response.address2,
                                    'city': response.city,
                                    'state': response.state,
                                    'pincode': response.pincode,
                                    'place_order_razorpay': true,

                                },
                                success: function (msgsasa) {
                                        window.location.href = "/thank-you"

                                }
                            });

                                    //alert(razorpay_response.razorpay_payment_id);

                                },
                                "prefill": {
                                    "name": response.first_name + response.last_name,
                                    "contact": response.phone_no,
                                    "email": response.email,
                                },

                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                            e.preventDefault();
                        }
                    }
                });
    });
});
