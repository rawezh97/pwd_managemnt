  // Listen for messages from the extension
chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
    if (request.password) {
      // Store the generated password in the web page's localStorage
      localStorage.setItem("generatedPassword", request.password);
      alert("Password saved in LocalStorage!");
    }
  });
  
  