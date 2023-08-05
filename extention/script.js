document.addEventListener("DOMContentLoaded", function() {
  const passwordField = document.getElementById("passwordField");
  const generateButton = document.getElementById("generateButton");
  const copyButton = document.getElementById("copyButton");

  generateButton.addEventListener("click", function() {
    const generatedPassword = generateStrongPassword(12); // You can adjust the password length as needed
    passwordField.value = generatedPassword;

    // Send the generated password to the content script
    chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
      chrome.tabs.sendMessage(tabs[0].id, { password: generatedPassword });
    });
  });

  copyButton.addEventListener("click", function() {
    passwordField.select();
    document.execCommand("copy");
    alert("Password copied to clipboard!");
  });
});

  function generateStrongPassword(length) {
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
    let password = "";
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * charset.length);
      password += charset[randomIndex];
    }
    return password;
  }
  
  function saveToLocalStorage(key, value) {
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem(key, value);
      alert("Password saved in LocalStorage!");
    } else {
      alert("LocalStorage is not supported in your browser!");
    }
  }
  