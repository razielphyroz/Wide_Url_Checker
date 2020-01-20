// Checks the URL pattern
function urlPatternCheck(urlToInsert) {
  var regexMatchUrl = new RegExp("^(?:http(s)?:\\/\\/)?[\\w.-]+(?:\\.[\\w\\.-]+)+[\\w\\-\\._~:/?#[\\]@!\\$&'\\(\\)\\*\\+,;=.]+$");
  return regexMatchUrl.test(urlToInsert);
}

// Hides all the feedback boxes
function hideFeedbacks() {
  $("#errorBox").hide();
  $("#successBox").hide();
  $("#refreshedBox").hide();
}

hideFeedbacks();
