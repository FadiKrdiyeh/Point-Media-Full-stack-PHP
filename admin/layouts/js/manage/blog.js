$(document).ready(function () {
  // Flip Info To Switch Between Inglish And Arabic
  // $(".flip-blog-info").on("click", function () {
  //   let lang = $(this).data("lang");
  //   if (lang == "en") {
  //     $(".face.back").removeClass("active");
  //     $(".face.front").addClass("active");
  //     $(this).data("lang", "ar");
  //     $(this).text("إنكليزي");
  //     $("#search-input").data("lang", "ar");
  //   } else {
  //     $(".face.front").removeClass("active");
  //     $(".face.back").addClass("active");
  //     $(this).data("lang", "en");
  //     $(this).text("عربي");
  //     $("#search-input").data("lang", "en");
  //   }
  // });

  // Searching
  // fetchCustomerDataForBlogs();
  let mainData2 = $(".search-result").html();
  // console.log(data);
  function fetchCustomerDataForBlogs(search = "", searchingLang = "ar") {
    $.ajax({
      url: "blog.php?do=Search",
      method: "GET",
      data: {
        search: search,
        searchingLang: searchingLang,
      },
      // dataType: "json",
      beforeSend: function () {
        $("#total_results").html(
          'الرجاء الإنتظار...<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">جاري البحث...</span>'
        );
      },
      success: function (data) {
        let response = JSON.parse(data);
        let finalData = "";
        // $(".search-result").html("asd");
        if (search != "") {
          finalData = response.blogs_data;
          $(".total_results").fadeIn();
          $(".pagination").hide();
        } else {
          $(".total_results").fadeOut();
          $(".pagination").show();
          finalData = mainData2;
        }
        if (response.status == true) {
          $("#total_results").text(response.total_results);
        } else {
          $("#total_results").text("0");
        }
        $(".search-result").html(finalData);
        if (searchingLang == "en") {
          $(".face.back").addClass("active");
          $(".face.front").removeClass("active");
        }
      },
    });
  }
  $("#blog-search-input").on("keyup", function () {
    let searchingLang = $("#blog-search-input").data("lang");
    let search = $(this).val();
    fetchCustomerDataForBlogs(search, searchingLang);
  });
});

$(function () {
  // Add New Blog
  $("#addBlogForm").on("submit", function (e) {
    e.preventDefault();

    $(".error-validation-messages").text("");
    let formData = new FormData(this);
    let errorsArr = [];
    let match = ["image/jpeg", "image/png", "image/jpg", "image/GIF"];
    let imageFile = formData.get("image").type;
    if (
      !(
        imageFile == match[0] ||
        imageFile == match[1] ||
        imageFile == match[2] ||
        imageFile == match[3]
      )
    ) {
      errorsArr["image"] = "الرجاء اختيار صورة صالحة...";
      $("#imageInput").val("");
    }

    for (const pair of formData.entries()) {
      if (pair[1] == "") {
        errorsArr[pair[0]] = "هذا الحقل مطلوب...";
      }
    }

    if (!jQuery.isEmptyObject(errorsArr)) {
      // console.log("Error!!");
      for (const [key, value] of Object.entries(errorsArr)) {
        $("#" + key + "_error").text(value);
      }
    } else {
      // console.log("Good!!");
      $.ajax({
        type: "POST",
        url: "blog.php?do=Insert",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#addBlogBtn").html(
            '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>'
          );
          $("#addBlogBtn").prop("disabled", true);
          $("#addBlogBtn").css("cursor", "not-allowed");
        },
        success: function (data) {
          let response = JSON.parse(data);
          console.log(response);
          console.log(data);
          // $("#imageInput").val("");
          // $("#titleArInput").val("");
          // $("#titleEnInput").val("");
          // $("#shortDescriptionArInput").val("");
          // $("#shortDescriptionEnInput").val("");
          // $("#descriptionArInput").val("");
          // $("#descriptionEnInput").val("");
          $("#addBlogBtn").html('إضافة <i class="fa fa-plus"></i>');
          $("#addBlogBtn").prop("disabled", false);
          $("#addBlogBtn").css("cursor", "pointer");
          console.log(response.status);
          if (response.status == true) {
            $("#successMsg")
              .text(response.msg)
              .fadeIn(500)
              .fadeOut(5000, function () {
                $("#successMsg").text("");
              });
          } else {
            $("#errorMsg")
              .text(response.msg)
              .fadeIn(500)
              .fadeOut(5000, function () {
                $("#errorMsg").text("");
              });
          }
          // console.log(data);
        },
        error: function (reject) {
          console.log("error");
          console.log(reject);
          let response = $.parseJSON(reject.responseText);
          console.log(response);
          $.each(response.errors, function (key, val) {
            $("#" + key + "_error").text(val);
          });
        },
      });
    }
  });

  // $("#imageInput").on("change", function () {
  //   $("#addCourseForm").submit();
  // });
  // });

  // Edit Blog
  $("#editBlogForm").on("submit", function (e) {
    e.preventDefault();

    $(".error-validation-messages").text("");
    let formData = new FormData(this);
    let errorsArr = [];

    if (formData.get("image").name == "" || formData.get("image").size == 0) {
      // console.log("empty");
      formData.delete("image");
    } else {
      let match = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
      let imageFile = formData.get("image").type;
      if (
        !(
          imageFile == match[0] ||
          imageFile == match[1] ||
          imageFile == match[2] ||
          imageFile == match[3]
        )
      ) {
        errorsArr["image"] = "الرجاء اختيار صورة صالحة...";
        $("#imageInput").val("");
      }
    }

    for (const pair of formData.entries()) {
      if (pair[1] == "") {
        errorsArr[pair[0]] = "هذا الحقل مطلوب...";
      }
    }

    if (!jQuery.isEmptyObject(errorsArr)) {
      // console.log("Error!!");
      for (const [key, value] of Object.entries(errorsArr)) {
        $("#" + key + "_error").text(value);
      }
    } else {
      $.ajax({
        type: "POST",
        url: "blog.php?do=Update",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#editBlogBtn").html(
            '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>'
          );
          $("#editBlogBtn").prop("disabled", true);
          $("#editBlogBtn").css("cursor", "not-allowed");
        },
        success: function (data) {
          let response = JSON.parse(data);
          console.log(response);
          if (response.status == true) {
            $("#successMsg")
              .text(response.msg)
              .fadeIn(500)
              .fadeOut(5000, function () {
                $("#successMsg").text("");
              });
          }
          $("#editBlogBtn").html('حفظ التغييرات <i class="fa fa-edit"></i>');
          $("#editBlogBtn").prop("disabled", false);
          $("#editBlogBtn").css("cursor", "pointer");
          // console.log(data.status);
        },
        error: function (reject) {
          console.log("error");
          console.log(reject);
          let response = $.parseJSON(reject.responseText);
          console.log(response);
          //   $.each(response.errors, function (key, val) {
          //     $("#" + key + "_error").text(val[0]);
          //   });
        },
      });
    }
  });

  // Confirm To Delete Course
  $(".delete-blog-confirm").on("click", function (e) {
    e.preventDefault();
    $id = $(this).data("id");
    $title = $(this).data("title");
    $(".delete-blog").data("id", $id);
    $(".delete-title").text($title);
  });

  // Delete Course
  $(".delete-blog").on("click", function (e) {
    e.preventDefault();
    $id = $(this).data("id");
    let btn = $(this);
    $.ajax({
      type: "GET",
      url: "blog.php?do=Delete",
      data: { blogId: $id },
      beforeSend: function () {
        btn.html(
          '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>'
        );
        btn.prop("disabled", true);
        btn.css("cursor", "not-allowed");
      },
      success: function (data) {
        let response = JSON.parse(data);
        btn.html('حذف <i class="fa fa-check"></i>');
        btn.prop("disabled", false);
        btn.css("cursor", "pointer");
        if (response.status === true) {
          // from-show-page
          $("#successMsg")
            .text(response.msg)
            .fadeIn(500)
            .fadeOut(5000, function () {
              $("#successMsg").text("");
            });
          if (btn.hasClass("from-show-page")) {
            $(".buttons-side")
              .html(`<button class="btn btn-primary" type="button" disabled>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          <span class="visually-hidden">Loading...</span>
        </button>
        <button class="btn btn-danger" type="button" disabled>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          <span class="visually-hidden">Loading...</span>
        </button>`);
            setTimeout(function () {
              window.location.replace("blog.php?do=Manage");
            }, 2000);
          } else if (btn.hasClass("from-dashboard-page")) {
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            $(".blog-" + $id).fadeOut(700, function () {
              $(this).remove();
            });
          }
        } else {
          $("#errorMsg")
            .text(response.msg)
            .fadeIn(500)
            .fadeOut(5000, function () {
              $("#errorMsg").text("");
            });
        }
      },
    });
  });
});
