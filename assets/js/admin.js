// ---------------------------- Login -------------------------------
var SITEURL = $('#sitename').val()
var ID = $('#userid').val()
var isValidEmail = false;
var emailValidate = '';
var NID = '';

var AgentNID = ""
var AgentNames = ""
var AgentUsername = ""
var AgentType = ""
var AgentDistrict = ""
var AgentVillage = ""
var AgentSector = ""
var AgentCell = ""
$('#SaveAgent').click(function (){
  AgentNID = $("#AgentNID").val()
  AgentNames = $("#AgentNames").val()
  AgentUsername = $("#AgentUsername").val()
  AgentType = $("#AgentType").val()
  AgentDistrict = $("#AgentDistrict").val()
  AgentVillage = $("#AgentVillage").val()
  AgentSector = $("#AgentSector").val()
  AgentCell = $("#AgentCell").val()
  

  console.log(AgentNID+" /"+AgentNames+" /"+AgentUsername+" /"+AgentType+" /"+AgentDistrict+" /"+AgentVillage+" /"+AgentSector+" /"+AgentCell);
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
        'AgentType'     : AgentType,
        'AgentDistrict' : AgentDistrict,
        'AgentVillage'  : AgentVillage,
        'AgentSector'   : AgentSector,
        'AgentCell'     : AgentCell,
      },
      success: function(data){
        console.log(data)
        if(data =='true'){
          $('#responses').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>Successfully Saved An Agent.</div>');
        }else if(data == 'existed'){
          $('#responses').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Oops!</strong><a href="#" class="alert-link"></a>This Agent Is Already Registered.</div>');
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
