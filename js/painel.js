var urlsArray = [];

// Checks the URL pattern
function urlPatternCheck(urlToInsert) {
  var regexMatchUrl = new RegExp("^(?:http(s)?:\\/\\/)?[\\w.-]+(?:\\.[\\w\\.-]+)+[\\w\\-\\._~:/?#[\\]@!\\$&'\\(\\)\\*\\+,;=.]+$");
  return regexMatchUrl.test(urlToInsert);
}

// Update the URL's array by making a request
function reloadUrls() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'url_manager.php', true);
  xhr.send();

  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      urlsArray = JSON.parse(this.response);
    }
  }
}

// Hides all the feedback boxes
function hideFeedbacks() {
  $("#errorBox").hide();
  $("#successBox").hide();
  $("#refreshedBox").hide();
}

hideFeedbacks();
