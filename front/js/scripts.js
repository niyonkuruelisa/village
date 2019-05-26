var SITEURL = $('#sitename').val()
var nid = "";
$("#clientLogin").click(function (){
    nid = $("#nid").val();
    if(nid.length < 1 || ! $.isNumeric(nid)){
        alert("Ntabwo Washyize mo Nimero z'Indangamuntu");
    }else{
        $('#responses').html('<div class="progress progress-lg m-b-5"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>')

        $.ajax({
            type: 'GET',
            url: SITEURL+"submissions.php",
            data:{
                'action': 'clientLogin',
                'nid': nid
            },
            success: function(data){
                console.log(data);
                $('#responses').html('');
                if(data == "true"){
                    location.assign(SITEURL+'client/?account='+nid);
                }else if(data == "notExist"){
                    alert("Iyi Konti Ntago Iri Muri Sisteme");
                }else{
                    alert("Ntago Byakunze Kwinjira,Mwongere Mugerageza Mukanya");
                }
            }
        })
    }
})


// Handle the submission of the QUICK payment page
$("#quick-pay-form").submit(function (e){
    e.preventDefault()
    var nid = $("#quick-pay-nid").val();
    var amount = $("#pledge-amount").val();
    var month = $("#pledgeMonth").val();
    var phone = $("#phone-number").val();

    // Check the ID
    if(nid.length < 5 || ! $.isNumeric(nid)){
        alert("Ntabwo Washyize mo Nimero z'Indangamuntu neza");
        return false;
    }

    // Check amount
    if(isNaN(amount) || amount < 100 || amount > 2500000 ){
        alert("Mwashyizemo amafranga nabi\nShyiramo amafranga neza kandi ari hagati y'ijana na miliyoni ebyiri");
        return false;
    }

     // Check month
    if(isNaN(month) || month < 1 || month > 12 ){
        alert("Mwashyizemo ukwezi nabi\nHitamo ukwezi hagati 1-12");
        return false;
    }

    // If no problem let's caall the API
    $('#responses').html('<div class="progress progress-lg m-b-5"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>')

    $.ajax({
        type: 'GET',
        url: SITEURL+"submissions.php",
        data:{
            'action': 'quickPay',
            'nid': nid,
            'amount': amount,
            'month': month,
            'phoneNumber': phone
        },
        success: function(data){
            console.log(data);
            $('#responses').html(data.msg);

            var status = data.status

            if(status == true){
                // Hide the form
                $("#quick-pay-form").hide(5)
            }
        }
    })
})

// Handle the authetication
$("#client-auth-form").submit(function (e){
    e.preventDefault()
    var nid = $("#client-auth-nid").val();
    var pin = $("#client-pin-input").val();

    // Check the ID
    if(nid.length < 5 || ! $.isNumeric(nid)){
        alert("Ntabwo Washyize mo Nimero z'Indangamuntu neza");
        return false;
    }

    // Check amount
    if(pin.toString().length < 2){
        alert("PIN yanditse nabi");
        return false;
    }

    // If no problem let's caall the API
    $('#auth-responses').html('<div class="progress progress-lg m-b-5"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>')

    $.ajax({
        type: 'GET',
        url: SITEURL+"submissions.php",
        data:
        {
            'action': 'clientAuthentication',
            'nid': nid,
            'PIN': pin
        },

        success: function(data){
            console.log(data);
            $('#auth-responses').html(data.msg);

            var status = data.status

            if(status == true){
                // Hide the form
                $("#client-auth-form").hide(5)
                location.href = SITEURL + 'client';
            }
        }
    })
})