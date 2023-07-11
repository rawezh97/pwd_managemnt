// Inject the string "abas" into the HTML content
function injectContent() {
  const content = document.documentElement.innerHTML;
  document.documentElement.innerHTML = content.replace(/<\/body>/, 'abas</body>');
}

// Execute the function when the DOM content is loaded
document.addEventListener('DOMContentLoaded', injectContent);
