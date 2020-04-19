$(document).ready(function() {
  $("#submit").click(function() {
    if($(".Must").val().length == 0) {
      alert("All not filled");
      return false;
    }
  });
});
