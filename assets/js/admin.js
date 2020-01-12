// ---------------------------- Login -------------------------------
var SITEURL = $('#sitename').val()
var ID = $('#userid').val()
var isValidEmail = false;
var emailValidate = '';
var NID = '';

$('#email').keyup(function (){

emailValidate = $(this).val();
EmailValue = emailValidate;
isValidEmail = false;
// var re=new RegExp();
// re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

if(emailValidate != '' && emailValidate.length > 1){
  if(emailValidate.length > 3){
    isValidEmail = true;
    $('#responses').html('');
    }
}else{
  $('#responses').html('');
}
});

$('#password').keyup( function (){
password = $(this).val();
});

$('#signIn').click(function (){
    
    if(isValidEmail == true){
      if(password !=''){
        NID = $('#NID').val();
        console.log(emailValidate+password+NID)
        $.ajax({
          type: 'GET',
          url: SITEURL+'submissions.php',
          data: {
            'action': 'loginSystemUser',
            'email': emailValidate,
            'password': password,
            'NID': NID
          },
          success: function (data){
            console.log(data);
            if(data == 'FalseNotExists'){
              $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Iyi Konti Ntabwo Ifunguye. </div>');
            }else if(data == 'trueAdmin'){
              location.assign(SITEURL+"admin/");
            }else if(data == 'trueAgent'){
              location.assign(SITEURL+"agent/");
            }else if(data == 'trueSecurity'){
              location.assign(SITEURL+"security/");
            }else if(data == 'trueClient'){
              location.assign(SITEURL+"client/");
            }else if(data == 'trueChairman'){
              location.assign(SITEURL+"chairman/");
            }
          }
        })
      }else{
        $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Enter Valid Password. </div>');
      }
    }else{
      $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Enter Valid E-amil Address. </div>');
    }
  })
  //-------------------------- End Login ----------------------------------------


  //********************* Save a New User ************************************* */
  var UserName        = $("#UserName").val();
  var UserEmail       = $("#UserEmail").val();
  var UserPhone       = $("#UserPhone").val();
  var UserOccupation  = $("#UserOccupation").val();
  var UserGender      = $("input[name=radioSocial]").val();
  var UserType        = $("#UserType").val();

$('#UserName').keyup(function (){
  UserName  = $(this).val();
    
})
$('#UserEmail').keyup(function (){
  UserEmail  = $(this).val();
    
})
$('#UserPhone').keyup(function (){
  UserPhone  = $(this).val();
    
})
$('#UserOccupation').keyup(function (){
  UserOccupation  = $(this).val();
    
})
$('#UserType').change('ifChanged',function (){
  UserType  = $(this).val();
    
})
$('input[name=radioSocial]').change('ifChanged',function (){
  UserGender  = $(this).val();
})
$("#SaveUser").click(function (){
  $('#UserResponses').html('<div class="progress progress-lg m-b-5"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>');
  var re=new RegExp();
  re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if(UserName == '' || UserName < 3){
    $('#UserResponses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a> User Names Must Be More Than 3 Characters Long. </div>');

  }else if(re.test(UserEmail) != true || UserEmail == ''){
    $('#UserResponses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a> Enter Valid Email Address. </div>');

  }else if(UserPhone == '' || UserPhone.length < 10){
    $('#UserResponses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a> Enter Valid Phone Number. </div>');

  }else if(UserOccupation  == '' || UserOccupation.length < 3){
    $('#UserResponses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a> User Occupation Must Be More than 3 Characters Long. </div>');

  }else{
    $('#UserResponses').html('<div class="progress progress-lg m-b-5"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>');
    $.ajax({
        type: 'GET',
        url : SITEURL+'submissions.php',
        data:{
          'action'        : 'saveUser',
          'UserNames'     : UserName,
          'UserEmail'     : UserEmail,
          'UserOccupation': UserOccupation,
          'UserPhone'     : UserPhone,
          'UserGender'    : UserGender,
          'UserType'      : UserType,
        },
        success : function (data){
          console.log(data)
          if(data == "false"){
            $('#UserResponses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Couldn\'t Save System User , Try Again Again. </div>');
          }else if(data == "exist"){
            $('#UserResponses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Sytem User Is Already Exist, Check Again. </div>');
          }else{
            $('#UserResponsesCode').html('<h3><strong>'+data+'</strong></h3>');
          }
        }
      })
  }
})
var ActivateEmail                   = $("#ActivateEmail").val();
var ActivateCode                    = $("#ActivateCode").val();
var ActivatePassword                = $("#ActivatePassword").val();
var ActivateConfirmPassword         = $("#ActivateConfirmPassword").val();
var IsActivateValidEmail            = false;
var IsActivateValidPassword         = false;
var IsActivateValidConfirmPassword  = false;

$('#ActivateEmail').keyup(function (){
  ActivateEmail  = $(this).val();
    
})
$('#ActivateCode').keyup(function (){
  ActivateCode  = $(this).val();
    
})
$('#ActivateCode').keydown(function (){
  ActivateCode  = $(this).val();
    
})
$('#ActivatePassword').keyup(function (){
  ActivatePassword  = $(this).val();
    
})
$('#ActivateConfirmPassword').keyup(function (){
  ActivateConfirmPassword  = $(this).val();
    
})
$('#ActivateButton').click(function (){
  $('#ActiveResponse').html('');
  ActivateEmail = $("#ActivateEmail").val();
  ActivateCode  = $("#ActivateCode").val();
  if(ActivateCode == '' || ActivateCode.length != 6){
    $('#ActiveResponse').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Andika Neza Code Yibanga wahawe N\'Umuyobozi!. </div>');

  }else if(ActivatePassword == '' || ActivatePassword.length < 6){
    $('#ActiveResponse').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Umubare wibanga ugomba kuba uri hejuru y\'inyuguti esheshatu(6). </div>');

  }else if(ActivatePassword != ActivateConfirmPassword || ActivateConfirmPassword == ''){
    $('#ActiveResponse').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Umubare wibanga ntago wahuye,Gerageza Nanone. </div>');
    $('#ActivatePassword').val("");
    $('#ActivateConfirmPassword').val("");
  }else{
    $('#ActiveResponse').html('<div class="progress progress-lg m-b-5"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>');
    $.ajax({
      type: 'GET',
      url : SITEURL+'submissions.php',
      data:{
        'action'            : 'activateUser',
        'ActivateEmail'     : ActivateEmail,
        'ActivateCode'      : ActivateCode,
        'ActivatePassword'  : ActivatePassword
      },
      success : function (data){
        $('#ActiveResponse').html('')
        if(data == "true"){
          $('#ActiveResponse').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Byiza!</strong><a href="#" class="alert-link"></a> Konti Yawe Yafunguwe!!. </div>');
          location.assign(SITEURL+"login/");
        }else if(data == "exist"){
          console.log(data)
          $('#ActiveResponse').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a>Nshuti Iyi konti Isanzwe Ifunguye. </div>');
        }else if(data == "NotExist"){
          $('#ActiveResponse').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a>Nshuti Iyi konti Ntabwo iri muri sisiteme. </div>');
        }else{
          console.log(data)
          $('#ActiveResponse').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oh!</strong><a href="#" class="alert-link"></a> Ntibyakunze gufungura konti,Mugerageze nanone mukanya. </div>');

        }
      }
    })
  }
});


// **************************** Logout **********************
var userId = $('#userid').val();
$('#Logout').click(function (e){
  userId = $('#userid').val();
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: SITEURL+'submissions.php',
    data:{
      "action" : "SignOut",
      "userId" : userId
    },
    success: function(data){
      if(data == "true"){
        location.assign(SITEURL);
      }
    }
  })
})
//saving new chairman
var ChairmanNID = ""
var ChairmanNames = ""
var ChairmanUsername = ""
var ChairmanType = ""
var ChairmanDistrict = ""
var ChairmanVillage = ""
var ChairmanSector = ""
var ChairmanCell = ""
$('#SaveChairman').click(function (){
  ChairmanNID = $("#ChairmanNID").val()
  ChairmanNames = $("#ChairmanNames").val()
  ChairmanUsername = $("#ChairmanUsername").val()
  ChairmanType = $("#ChairmanType").val()
  ChairmanDistrict = $("#ChairmanDistrict").val()
  ChairmanVillage = $("#ChairmanVillage").val()
  ChairmanSector = $("#ChairmanSector").val()
  ChairmanCell = $("#ChairmanCell").val()
  

  //console.log(AgentNID+" /"+AgentNames+" /"+AgentUsername+" /"+AgentType+" /"+AgentDistrict+" /"+AgentVillage+" /"+AgentSector+" /"+AgentCell);
  if(ChairmanNID.length < 1 || ChairmanNames.length < 1 || ChairmanUsername.length < 1 || ChairmanType.length < 1 || ChairmanDistrict.length < 1 || ChairmanVillage.length < 1 || ChairmanSector.length < 1 || ChairmanCell.length < 1){
    $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Please!!</strong><a href="#" class="alert-link"></a>Fill All Fields.</div>');
  }else{
    $.ajax({
      type: 'GET',
      url: SITEURL+'submissions.php',
      data:{
        'action'        : 'SaveChairman',
        'ChairmanNID'      : ChairmanNID,
        'ChairmanNames'    : ChairmanNames,
        'ChairmanUsername' : ChairmanUsername,
        'ChairmanType'     : ChairmanType,
        'ChairmanDistrict' : ChairmanDistrict,
        'ChairmanVillage'  : ChairmanVillage,
        'ChairmanSector'   : ChairmanSector,
        'ChairmanCell'     : ChairmanCell,
      },
      success: function(data){
        //console.log(data)
        if(data =='true'){
          $('#responses').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>Successfully Saved An Chairman.</div>');
        }else if(data == 'existed'){
          $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>This Chairman Is Already Registered.</div>');
        }else{
          $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>Can not save Chairman now, try after sometimes.</div>');
        }
      }
      })
  }
})
//saving new agent
var AgentNID = ""
var AgentNames = ""
var AgentUsername = ""
var AgentPosition = ""
var AgentType = ""
var AgentDistrict = ""
var AgentVillage = ""
var AgentSector = ""
var AgentCell = ""
$('#SaveAgent').click(function (){
  AgentNID = $("#AgentNID").val()
  AgentNames = $("#AgentNames").val()
  AgentPosition =  $("#AgentPosition").val()
  AgentUsername = $("#AgentUsername").val()
  AgentType = $("#AgentType").val()
  AgentDistrict = $("#AgentDistrict").val()
  AgentVillage = $("#AgentVillage").val()
  AgentSector = $("#AgentSector").val()
  AgentCell = $("#AgentCell").val()
  

  console.log(AgentNID+" /"+AgentNames+" /"+AgentUsername+" /"+AgentType+" /"+AgentPosition + " /"+AgentDistrict+" /"+AgentVillage+" /"+AgentSector+" /"+AgentCell);
  if(AgentNID.length < 1 || AgentNames.length < 1 || AgentUsername.length < 1 || AgentType.length < 1 || AgentDistrict.length < 1 || AgentVillage.length < 1 || AgentSector.length < 1 || AgentCell.length < 1){
    $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Please!!</strong><a href="#" class="alert-link"></a>Fill All Fields.</div>');
  }else{
    $.ajax({
      type: 'GET',
      url: SITEURL+'submissions.php',
      data:{
        'action'        : 'SaveAgent',
        'AgentNID'      : AgentNID,
        'AgentNames'    : AgentNames,
        'AgentUsername' : AgentUsername,
        'AgentPosition' : AgentPosition,
        'AgentType'     : AgentType,
        'AgentDistrict' : AgentDistrict,
        'AgentVillage'  : AgentVillage,
        'AgentSector'   : AgentSector,
        'AgentCell'     : AgentCell,
      },
      success: function(data){
        console.log(data)
        if(data =='true'){
          alert("Successfully Saved An Agent. :)")
          $('#responses').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Wow!</strong><a href="#" class="alert-link"></a>Successfully Saved An Agent.</div>');
        }else if(data == 'existed'){
          $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>Agent with same National ID or username Is Already Registered. Try Another National ID or username</div>');
        }else{
          $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>Can not save agent now, try after sometimes.</div>');
        }
      }
      })
  }
})
var nid = ""
var names = ""
var sex = ""
var father_names = ""
var mother_names = ""
var birth_date = ""
var job_type = ""
var education_type  = ""
var relationship    = ""
var position        = ""
var zip_code        = ""
var house_code      = ""
var assurance       = ""
var telephone       = ""
var district        = ""
var village         = ""
var sector = ""
var cell = ""
$('#SaveClient').click(function (){
  nid = $('#nid').val()
  names = $('#names').val()
  sex = $('#sex').val()
  father_names = $('#father_names').val()
  mother_names = $('#mother_names').val()
  birth_date = $('#birth_date').val()
  job_type = $('#job_type').val()
  education_type = $('#education_type').val()
  relationship = $('#relationship').val()
  position = $('#position').val()
  zip_code = $('#zip_code').val()
  house_code = $('#house_code').val()
  assurance = $('#assurance').val()
  telephone = $('#telephone').val()
  district = $('#district').val()
  village = $('#village').val()
  sector = $('#sector').val()
  cell = $('#cell').val()
  if(nid.length <1 ||
    names.length <1 ||
    sex.length <1 ||
    father_names.length <1 ||
    mother_names.length <1 ||
    birth_date.length <1 ||
    job_type.length <1 ||
    education_type.length <1 ||
    relationship.length <1 ||
    position.length <1 ||
    zip_code.length <1 ||
    house_code.length <1 ||
    assurance.length <1 ||
    telephone.length <1 ||
    district.length <1 ||
    village.length <1 ||
    sector.length <1 ||
    cell.length <1){
      alert("Uzuza Neza Uko Bisabwa");
  }else{
    
    if (Date.parse(birth_date)) {
      $.ajax({
        type: 'GET',
        url: SITEURL+'submissions.php',
        data: {
          'action': 'saveClient',
          'savedBy': ID,
          'nid' :nid,
          'names' :names,
          'sex' :sex,
          'father_names' :father_names,
          'mother_names' :mother_names,
          'birth_date' :birth_date,
          'job_type' :job_type,
          'education_type' :education_type,
          'relationship' :relationship,
          'position' :position,
          'zip_code' :zip_code,
          'house_code' :house_code,
          'assurance' :assurance,
          'telephone' :telephone,
          'district' :district,
          'village' :village,
          'sector' :sector,
          'cell' :cell
        },
        success: function(data){
          console.log(data);
          if(data == "true"){
            alert("Kubika Ibiranga Umuturage Byakunze Neza");
            location.href=location.href
          }else if(data == "exist"){
            alert("Asanzwe Ari Muri Sisiteme");
          }else{
            alert("Ntago Byakunze, Mugerageze Mukanya");
          }
        }
      })
    } else {
        alert("Shyiramo Igihe Yavukiye");
    }
  }
})
var payment = ""
var payment_method = ""
var phone_number = ""
var Month = ""
$("#savePayment").click(function (){
  payment = $("#payment").val()
  payment_method = $("#payment_method").val()
  phone_number = $("#phone_number").val()
  Month = $("#Month").val()
  var id = $("#id").val()
  if(phone_number.length < 10){
      alert("Nimero ya Telefone ntago yuzuye");
    }else{
      if(payment.length < 2){
        alert("Amafaranga Ntajya Munsi ya 100");
      }else{
        $.ajax({
          type: 'GET',
          url: SITEURL+'submissions.php',
          data:{
            'action': 'savePayment',
            'payment': payment,
            'payment_method': payment_method,
            'phone_number': phone_number,
            'Month': Month,
            'id': id
          },
          success: function(data){
            console.log(data);
            if(data == "true"){
              location.assign(SITEURL+'client/');
            }else{
              alert("Ntibyakunze Kwishyura, Mugerageze mukanya");
            }
          }
        })
    }
  }
})
