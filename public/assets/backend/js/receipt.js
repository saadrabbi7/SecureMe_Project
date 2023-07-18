$(document).ready(function () {
    $(".select2").select2({
    });

    $("#name").blur(function () {
        $("#name").css('text-transform', 'capitalize');
    });

    $("#name").blur(function () {
        let title = $("#name").val().split(" ");
        switch (title[0]) {
            case 'mr.':
                $("#gender").prop('selectedIndex', 0);
                break;
            case 'mr':
                $("#gender").prop('selectedIndex', 0);
                break;
            case 'md.':
                $("#gender").prop('selectedIndex', 0);
                break;
            case 'md':
                $("#gender").prop('selectedIndex', 0);
                break;
            case 'ms.':
                $("#gender").prop('selectedIndex', 1);
                break;
            case 'ms':
                $("#gender").prop('selectedIndex', 1);
                break;
            case 'mrs.':
                $("#gender").prop('selectedIndex', 1);
                break;
            case 'mrs':
                $("#gender").prop('selectedIndex', 1);
                break;

            default:
                break;
        }

    });

    $("#medical_tests").on('change', function (e) {
        var totAmt = 0;
        $.each($(this).find(":selected"), function (i, item) {
            totAmt += $(item).data("cost");
        });
        $('#main_total').val(totAmt);
    });

     function serviceCharge() {
        let main_total = Number(document.getElementById('main_total').value);
        let service_charge = Number(document.getElementById('service_charge').value);
        let total = main_total + service_charge;
        document.getElementById('total').value = total;
    };

    $("#discount_parsent").on('keyup', function (e) {
        document.getElementById('discount_taka').value = '';

        let total = document.getElementById('total').value;

        let discount_parsent = document.getElementById('discount_parsent').value;

        discount_parsent = (total / 100) * discount_parsent;
        document.getElementById('discount_taka').value = discount_parsent;

    });



    function calculation() {

        // discount
        let total = document.getElementById('total').value;
        let discount_taka = document.getElementById('discount_taka').value;

        if (discount_taka > 0) {
            total = total - discount_taka;
        }
        // end discount

        let neet_bill = document.getElementById('neet_bill').value = total;
        let advance = document.getElementById('advance').value;

        let due = neet_bill - advance;
        let money_back = advance - neet_bill;

        if (due >= 0) {
            document.getElementById('due').value = due;
        }

        if (money_back >= 0) {
            document.getElementById('due').value = 0;
        }

    }
    setInterval(() => {
        calculation();
        serviceCharge();
    }, 1000);


});
