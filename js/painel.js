var urlsArray = [];

// Called when user hits the "Submit" button
function submitUrl() {
  var urlInput = document.getElementById("url");
  const urlToInsert = urlInput.value.toLowerCase().trim();
  const isUrlPatternCorrect = urlPatternCheck(urlToInsert);

  hideFeedbacks();

  if (isUrlPatternCorrect) {
    insertUrlOnDb(urlToInsert);
    reloadUrls();
    urlInput.value = "";
    $("#successBox").show();
  } else {
    $("#errorBox").show();
  }
}

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

function createHtmlCard(obj) {

   // Clones the HTML model box
   var boxClone = urlBoxModel.cloneNode(true);
   boxClone.classList.remove("hidden");

   // Manages the URL name
   boxClone.getElementsByClassName("url-name")[0].innerHTML = obj.url;

   // Manages the URL status
   var urlStatus = obj.status ? `Status: ${obj.status}` : 'Unverified';
   boxClone.getElementsByClassName("url-status")[0].innerHTML = urlStatus;
   
   // Manages the URL body
   var bodyElement = boxClone.getElementsByClassName("url-body")[0];
   
   if (obj.body) {
     bodyElement.innerHTML = obj.body;
   } else {
     boxClone.removeChild(bodyElement);
   }

   return boxClone;
}

// Hides all the feedback boxes
function hideFeedbacks() {
  $("#errorBox").hide();
  $("#successBox").hide();
  $("#refreshedBox").hide();
}

hideFeedbacks();
