<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Password Generator</h2>
        <div class="result-container">
          <input type="text" id="result">
          <button class="copy-result" id="copy">
            Copy
          </button>
        </div>
        <div class="settings">
          <div class="input-group">
            <label>Password length (4-20)</label>
            <input type="range" id="length" min='4' max='20' step="1" />
            <span id="length-result">10</span>
          </div>
          <div class="input-group">
            <label>Include numbers</label> 
            <input type="checkbox" id="numbers" checked />
          </div>
          <div class="input-group">
            <label>Include symbols</label> 
            <input type="checkbox" id="symbols" checked />
          </div>
        </div>
        <button class="generate-btn" id="generate">
          Generate
        </button>
      </div>  
      
      
      <script>
        const result = document.querySelector('#result');
const passLength = document.querySelector('#length');
const passLengthResult = document.querySelector('#length-result')
const includeNumbers = document.querySelector('#numbers');
const includeSymbols = document.querySelector('#symbols');
const generateBtn = document.querySelector('#generate');
const copyPass = document.querySelector('#copy');


// Set default password length 20 max on load
document.addEventListener('DOMContentLoaded', () => {
  passLength.value = 20  
  passLengthResult.innerText = 20
  
  let onLoadLength = passLength.value
  let onLoadNumbers = includeNumbers.checked
  let onLoadSymbols = includeSymbols.checked
  result.value = generatePassword(onLoadNumbers, onLoadSymbols, onLoadLength)
})

// Listen for password range change
passLength.addEventListener('change', (event) => {
  passLengthResult.innerText  = event.target.value                   
})

// Listen for copy button
copyPass.addEventListener('click', () => {
  copy(result.value)
})

generateBtn.addEventListener('click', () => {
  const length = passLength.value
  const numbers = includeNumbers.checked
  const symbols = includeSymbols.checked
  result.value = generatePassword(numbers, symbols, length)
})

function generatePassword(number, symbol, length) {
  let generatedPassword = '';
  let variationsCount = [number, symbol].length
  
  for(let i = 0; i < length; i += variationsCount) {
    if (number) {
      generatedPassword += getRandomNumber()
    } 
    if (symbol) {
      generatedPassword += getRandomSymbol()
    }
    generatedPassword += getRandomLower()
  }
  
  const finalPassword = generatedPassword.slice(0, length);
  
  return finalPassword;
}

function getRandomLower() {
  return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
}

function getRandomNumber() {
  return String.fromCharCode(Math.floor(Math.random() * 10) + 48);
}

function getRandomSymbol() {
  const symbols = '!@#$%^&*(){}[]=<>/,.'
  return symbols[Math.floor(Math.random() * symbols.length)];
}

// Copy generated password in more secure way
function copy(text) {
  const input = document.createElement('input');
  input.setAttribute('value', text);
  document.body.appendChild(input);
  input.select();
  let copiedResult = document.execCommand('copy');
  document.body.removeChild(input);
  
  const alert = document.createElement("div")
  alert.classList.add("alert");
  alert.textContent = "Copied!"
  document.body.appendChild(alert)
  
  setTimeout(() => {
    document.querySelector('.alert').style.display = "none"
    document.body.removeChild(alert)
  }, 1000)
  return result;
}
      </script>
</body>
</html>

