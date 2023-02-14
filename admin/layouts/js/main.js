$(function () {
  "use strict";
  // Show And Hide dropdown Menu On Hover
  $(".navbar .nav-item.dropdown").hover(
    function () {
      // $(".navbar .nav-item .dropdown-menu").addClass("show");
      $(this).children(".dropdown-menu").addClass("show");
    },
    function () {
      $(".navbar .nav-item .dropdown-menu").removeClass("show");
    }
  );

  // Hide Placeholder On Form Focus
  $("[placeholder]")
    .focus(function () {
      $(this).attr("data-text", $(this).attr("placeholder"));
      $(this).attr("placeholder", "");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).attr("data-text"));
    });

  // Dashboard
  $(".toggle-info").on("click", function () {
    $(this).toggleClass("selected").parent().next(".card-body").slideToggle();
    if ($(this).hasClass("selected")) {
      $(this).html('<i class="fa fa-plus fa-lg"></i>');
    } else {
      $(this).html('<i class="fa fa-minus fa-lg"></i>');
    }
  });

  // Flip Info To Switch Between Inglish And Arabic
  $(".flip-info").on("click", function () {
    let lang = $(this).data("lang");
    if (lang == "en") {
      $(".face.back").removeClass("active");
      $(".face.front").addClass("active");
      $(this).data("lang", "ar");
      $(this).text("إنكليزي");
      $(".search-input").data("lang", "ar");
    } else {
      $(".face.front").removeClass("active");
      $(".face.back").addClass("active");
      $(this).data("lang", "en");
      $(this).text("عربي");
      $(".search-input").data("lang", "en");
    }
  });
});

// Save Changes In Sitting Page And Send Request using Ajax
$("#sittingsForm").on("submit", function (e) {
  e.preventDefault();

  $(".error-validation-messages").text("");
  let formData = new FormData(this);
  let errorsArr = [];

  if ($("#confirmPasswordInput").val() == "") {
    errorsArr["confirmPassword"] = "يرجى إدخال كلمة المرور لتأكيد الهوية...";
  }
  if ($("#adminEmailInput").val() == "") {
    errorsArr["adminEmail"] = "هذا الحقل مطلوب...";
  }
  if ($("#adminFulNameInput").val() == "") {
    errorsArr["fullName"] = "هذا الحقل مطلوب...";
  }
  if (
    $("#adminNewPasswordInput").val() != "" &&
    $("#adminNewPasswordCopyInput").val() == ""
  ) {
    errorsArr["newPasswordCopy"] =
      "يرجى ملئ هذا الحقل لتغيير كلمة المرور.. إذا كنت لا تريد تغيير كلمة المرور اترك الحقل السابق فارغاً..";
  }
  if (
    $("#adminNewPasswordInput").val() == "" &&
    $("#adminNewPasswordCopyInput").val() != ""
  ) {
    errorsArr["newPassword"] =
      "يرجى ملئ هذا الحقل لتغيير كلمة المرور.. إذا كنت لا تريد تغيير كلمة المرور اترك الحقل التالي فارغاً..";
  }
  if (
    $("#confirmPasswordInput").val() != "" &&
    !jQuery.isEmptyObject(errorsArr)
  ) {
    for (const [key, value] of Object.entries(errorsArr)) {
      // console.log(`${key} : ${value}`);
      $("#" + key + "_error").text(value);
      $("#saveSittings").modal("hide");
      $("#errorMsg")
        .text(
          "لم يتم تحديث البيانات.. يرجى إدخال البيانات المطلوبة و المحاولة مرة أخرى.."
        )
        .fadeIn(500)
        .fadeOut(5000, function () {
          $("#errorMsg").text("");
        });
      return;
    }
  }

  if (!jQuery.isEmptyObject(errorsArr)) {
    // console.log("Error!!");
    for (const [key, value] of Object.entries(errorsArr)) {
      // console.log(`${key} : ${value}`);
      $("#" + key + "_error").text(value);
    }
    console.log(false);
  } else {
    console.log(true);
    // $.ajax({
    //   type: "POST",
    //   // url: "courses.php?do=Update",
    //   data: formData,
    //   beforeSend: function () {
    //     $("#confirmPasswordBtn").html(
    //       '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>'
    //     );
    //     $("#confirmPasswordBtn").prop("disabled", true);
    //     $("#confirmPasswordBtn").css("cursor", "not-allowed");
    //   },
    //   success: function (data) {
    //     // let response = {};
    //     // if (data != "") {
    //     let response = JSON.parse(data);
    //     console.log(response);
    //     // console.log("test");
    //     // }
    //     $("#confirmPasswordBtn").html("حفظ التغييرات");
    //     $("#confirmPasswordBtn").prop("disabled", false);
    //     $("#confirmPasswordBtn").css("cursor", "pointer");
    //     // console.log(data.status);
    //     if (response.status == true) {
    //       $("#successMsg")
    //         .text(response.msg)
    //         .fadeIn(500)
    //         .fadeOut(5000, function () {
    //           $("#successMsg").text("");
    //         });
    //     }
    //   },
    //   error: function (reject) {
    //     console.log("error");
    //     console.log(reject);
    //     var response = $.parseJSON(reject.responseText);
    //     console.log(response);
    //     //   $.each(response.errors, function (key, val) {
    //     //     $("#" + key + "_error").text(val[0]);
    //     //   });
    //   },
    // });
  }
});
