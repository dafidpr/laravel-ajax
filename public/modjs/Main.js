function setLoadingButton(element, type, html = null){
    if(type == 'add'){
      $(element).addClass('disabled');
      $(element).html('<i class="fas fa-spinner fa-spin"></i> Loading..');
      } else{
        $(element).removeClass('disabled');
        $(element).html(html);
      }
  }

//   $('.ajax-link').click(function (event) {
//     event.preventDefault();

//     loadAjax($(this).attr('href'), '#viewData');
//     $('.view-data').load($(this).attr('href'));
//     window.history.pushState(null,'',$(this).attr('href'));
// });

// function loadAjax(url, element){
//   $.ajax({
//     type: "get",
//     url: document.URL + url,
//     dataType: "json",
//     success: function (response) {
//       $(element).load(response);
//       window.history.pushState(null,'', url);
//     }
//   });
// }



$('input[type="file"]').change(function(e){
  var fileName = e.target.files[0].name;
  $('.custom-file-label').html(fileName);
});
