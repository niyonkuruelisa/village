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
$("#quick-pay-form").submit(function (){
    var nid = $("#nid").val();
    var amount = $("#pledge-amount").val();
    var month = $("#pledgeMonth").val();

    // Check the ID
    if(nid.length < 5 || ! $.isNumeric(nid)){
        alert("Ntabwo Washyize mo Nimero z'Indangamuntu");
        return false;
    }

    // Check amount
    if($.isNumeric(amount) && amount >= 100 && amount <= 2500000 ){
        alert("Mwashyizemo amafranga nabi\nShyiramo amafranga neza kandi ari hagati y'ijana na miliyoni ebyiri");
        return false;
    }

     // Check month
    if($.isNumeric(month) && month >= 1 && month <= 12 ){
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
            'month': month
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
})

$("#quickPay").click(function(){
    // Handles the quick payment page
})