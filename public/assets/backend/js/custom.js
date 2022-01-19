

// Password Confirmation and validation

jQuery(function(){
    $("#AddNew").click(function(){
    $(".error").hide();
    var hasError = false;
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    if (password == '') {
        $("#password").after('<span class="error" style="color:red">Enter your password</span>');
        hasError = true;
    }
    else if (confirm == '') {
        $("#confirm").after('<span class="error" style="color:red">Please Re-enter.</span>');
        hasError = true;
    }else if (password != confirm ) {
        $("#confirm").after('<span class="error" style="color:red">Passwords do not match.</span>');
        hasError = true;
    }
    if(hasError == true) {return false;}
});

$("#Edit").click(function(){
    $(".error").hide();
    var hasError = false;
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    if (password != confirm ) {
        $("#confirm").after('<span class="error" style="color:red">Passwords do not match.</span>');
        hasError = true;
    }
    if(hasError == true) {return false;}
});



// Update User Status
$(document).on("click",".updateUserStatus",function(){
    var status = $(this).children("i").attr("status");
    var user_id = $(this).attr("user_id");
    $.ajax({
      type:'post',
      url: '/admin/update-user-status',
      data:{status:status, user_id:user_id},
      success:function(resp){
         if(resp['status']==0){
             $('#user-'+user_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#user-'+user_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });

// Update User Status
$(document).on("click",".updateBannerStatus",function(){
    var status = $(this).children("i").attr("status");
    var banner_id = $(this).attr("banner_id");
    $.ajax({
      type:'post',
      url: '/admin/banner/update-banner-status',
      data:{status:status, banner_id:banner_id},
      success:function(resp){
         if(resp['status']==0){
             $('#banner-'+banner_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#banner-'+banner_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });

  // Update Service Status
$(document).on("click",".updateServiceStatus",function(){
    var status = $(this).children("i").attr("status");
    var service_id = $(this).attr("service_id");
    $.ajax({
      type:'post',
      url: '/admin/service/update-service-status',
      data:{status:status, service_id:service_id},
      success:function(resp){
         if(resp['status']==0){
             $('#service-'+service_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#service-'+service_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });
  // Update Service Status
$(document).on("click",".updatePackegeStatus",function(){
    var status = $(this).children("i").attr("status");
    var packege_id = $(this).attr("packege_id");
    $.ajax({
      type:'post',
      url: '/admin/packege/update-packege-status',
      data:{status:status, packege_id:packege_id},
      success:function(resp){
         if(resp['status']==0){
             $('#packege-'+packege_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#packege-'+packege_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });

    // Update News Status
$(document).on("click",".updateNewstatus",function(){
    var status = $(this).children("i").attr("status");
    var news_id = $(this).attr("news_id");
    $.ajax({
      type:'post',
      url: '/admin/news/update-news-status',
      data:{status:status, news_id:news_id},
      success:function(resp){
         if(resp['status']==0){
             $('#news-'+news_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#news-'+news_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });
    // Update News Status
$(document).on("click",".updateProductStatus",function(){
    var status = $(this).children("i").attr("status");
    var product_id = $(this).attr("product_id");
    $.ajax({
      type:'post',
      url: '/admin/product/update-product-status',
      data:{status:status, product_id:product_id},
      success:function(resp){
         if(resp['status']==0){
             $('#product-'+product_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#product-'+product_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });
    // Update Blog Status
$(document).on("click",".updateBlogtatus",function(){
    var status = $(this).children("i").attr("status");
    var blog_id = $(this).attr("blog_id");
    $.ajax({
      type:'post',
      url: '/admin/blog/update-blog-status',
      data:{status:status, blog_id:blog_id},
      success:function(resp){
         if(resp['status']==0){
             $('#blog-'+blog_id).html("<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>");
         }else if(resp['status']==1){
            $('#blog-'+blog_id).html("<i class='mdi mdi-toggle-switch' status='Active'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });
// Password Confirmation and validation

    $("#submit").click(function(){
    $(".error").hide();
    var hasError = false;
    var currentVal = $("#old").val();
    var passwordVal = $("#new").val();
    var checkVal = $("#confirm").val();
     if (currentVal == '') {
        $("#old").after('<span class="error" style="color:red">Enter current password</span>');
        hasError = true;
    }
     else if (passwordVal == '') {
        $("#new").after('<span class="error" style="color:red">Please enter new password.</span>');
        hasError = true;
    }else if (checkVal == '') {
        $("#confirm").after('<span class="error" style="color:red">Please confirm your password.</span>');
        hasError = true;
    }else if (passwordVal != checkVal ) {
        $("#confirm").after('<span class="error" style="color:red">Passwords do not match.</span>');
        hasError = true;
    }
    if(hasError == true) {return false;}
   });

    // Confirmation Delete

  $(".confirmDelete").click(function(){
     var name =$(this).attr("name");
     if(confirm("Are you sure you want to delete " +name+ "?")){
        return true;
     }else {
         return false;
     }
  });

        // Add edit Attribute
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div style="margin-top:20px;"> <input type="text" class="form-control"  id="name" name="name[]" placeholder="Task name" required/> <input type="file" class="form-control mt-2"  id="image" name="image[]" required/>  <textarea name="details[]" class="form-control"  style="margin-top: 20px" id="details" cols="30" rows="10" placeholder="Tast details" required></textarea> <a href="javascript:void(0);" class="remove_button" style="color:red; margin-top:20px">Delete</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

       
 });
