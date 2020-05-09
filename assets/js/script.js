
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function validatePhone(field) {
    if (field.match(/^\d{10}/)) {
         return true;
    } 
    return false;
}

function progressBar(percent, $element) {
	var progressBarWidth = percent * $element.width() / 100;
	$element.find('div').animate({ width: progressBarWidth }, 500);
}