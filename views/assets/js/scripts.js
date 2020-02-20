$(function() {
  $("form").submit(function(e) {
    e.preventDefault();

    let form = $(this);
    let action = form.attr("action");
    let data = form.serialize();

    $.ajax({
      url: action,
      data: data,
      type: "post",
      dataType: "json",
      success: function(response) {
        if (response.message) {
          let html =
            '<p class="message ' +
            response.message.type +
            '">' +
            response.message.message +
            "</p>";

          $(".response_callback p").remove();
          $(".response_callback").append(html);
        }

        if (response.redirect) {
          window.location.href = response.redirect.url;
        }
      }
    });
  });
});
