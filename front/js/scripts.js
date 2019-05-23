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
                    location.assign(SITEURL+'client/');
                }else if(data == "notExist"){
                    alert("Iyi Konti Ntago Iri Muri Sisteme");
                }else{
                    alert("Ntago Byakunze Kwinjira,Mwongere Mugerageza Mukanya");
                }
            }
        })
    }
})