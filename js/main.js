$(document).ready(function() {
  //console.log("hello world")
  function loadUserData(page = "", search = "") {
    //  alert(page);
    $.ajax({
      url: "ajax_user_data.php",
      type: "post",
      data: {
        page, search
      },
      success: function(res) {
        $("#userData").html(res);
      }
    })
  }
  loadUserData();

/**** delete record using ajax ***/
$(document).on("click",'.deleteRecord', function(){
  let response= confirm('are You Sure to delete this Record');
  let id =$(this).data("id");
  if(response){
    $.ajax({
      type:"post",
      url:"ajax_check_user.php",
      data:{type:"delete",id},
      success: function(res){
      loadUserData();
      }
    })
  }
});
 
 
 /**** ajax pagination***/
  $(document).on('click', '.pagination-page', function() {
    let page = $(this).data('page');
    let type= $(this).data("type");
    if(type=="prv"){
   page = page -1;    
    }
    if(type=="next"){
      page = page +1;
    }
    // alert(page);
    let search = $("#search").val();
    loadUserData(page, search);

  });
 /**** ajax searching ****/
  $("#search").on('input', function() {
    let search = $("#search").val();
    loadUserData('', search);
  });

  /****** check username exist or not ****/
  function checkEmail_Username_Exist(inputData, error_msg_show) {
    $.ajax({
      type: "post",
      url: "ajax_check_user.php",
      data: inputData,
      success: function(res) {
        const {
          success, message
        } = JSON.parse(res);
        if (success) {
          $("."+error_msg_show).removeClass("text-danger");
          $("."+error_msg_show).addClass("text-success");
          $("#save_btn").removeAttr("disabled");
        } else {
          $("#save_btn").attr("disabled", true);
          $("."+error_msg_show).addClass("text-danger");
          $("."+error_msg_show).removeClass("text-success");
        }
        $("."+error_msg_show).html(message);
      }
    });

  }
  $("#username").on("input",
    function () {
      let username = $("#username").val();

      if (username != "") {
        checkEmail_Username_Exist({
          username: username
        }, 'username_msg')
      } else {
        $('.username_msg').html("");
      }
    });

  $("#email").on("input",
    function() {
      let email = $("#email").val();
      if (email != "") {
        checkEmail_Username_Exist({
          email: email
        }, 'email_msg')
      } else {
        $('.email_msg').html("");
      }
    });
    
    /**** country depends state ***/
    function country_depend_state(){
    let coutry_id = $("#country").val();
    let stateId = $("#country").data("state");
    $.ajax({
      type: "post",
      url: "country_depend_state.php",
      data: {
        coutry_id,stateId
      },
      success: function(res) {
        //   alert(res);
        $("#state").html(res);
      }
    })
  }
  country_depend_state();
  $("#country").change(function() {
country_depend_state();
  });
  
});