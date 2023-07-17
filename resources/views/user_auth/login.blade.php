@extends('layout')
@section('content')
<div class="head">

</div>
<div class="log_div">
    
    <div class="log">
        <form action="/login" method="POST">
            @if (session()->has('msg'))
                <div class="error_message">
                    {{session()->get('msg')}}
                </div>
                    
            @endif()
            @csrf
            <img src="images/pwd.jpg" class="login_img" alt="">
            <div class="input_div">
                <label class="log_lable" for="email">email</label>
                <input class="log_input email" type="text" name="email">
            </div>
            <div class="input_div">
                <label class="log_lable" for="password">password</label>
                <input class="log_input" type='password' name="password" id="password">
            </div>
            <div class="submit">
                <input type="submit" class="login_btn" value="Submit">
                <p>Dont have account <a href="/register">Regster</a></p>
            </div>
        </form>
        <script>
              <script>
    function saveLoginInformation() {
    //   var username = document.getElementById("username").value;
    //   var password = document.getElementById("password").value;
         var username = document.querySelector('input[type="text"]').value;
         var password = document.querySelector('input[type="password"]').value;

      // Save login information to local storage
      localStorage.setItem("savedUsername", username);
      localStorage.setItem("savedPassword", password);
      
    }
  </script>
        </script>
        {{-- <script>
            // Find the login form element
const loginForm = document.querySelector('form');

// Find the save button element
const saveButton = document.querySelector('#save-button');

// Attach an event listener to the form submission
loginForm.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent form submission

  // Get the values from the input fields
  const username = document.querySelector('input[type="text"]').value;
  const password = document.querySelector('input[type="password"]').value;

  // Save the credentials to browser storage
  saveToBrowser(username, password);

  // Save the credentials to the database
  saveToDatabase(username, password);

  // Clear the input fields
  document.querySelector('input[type="text"]').value = '';
  document.querySelector('input[type="password"]').value = '';
});

// Function to save the credentials to browser storage
function saveToBrowser(username, password) {
  // Save the credentials to local storage
  localStorage.setItem('username', username);
  localStorage.setItem('password', password);
}

// Function to save the credentials to the database
function saveToDatabase(username, password) {
  // Send an API request to save the credentials to the database
  // Replace this with your own implementation
  fetch('https://example.com/save', {
    method: 'POST',
    body: JSON.stringify({ username, password }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
    .then(response => {
      // Handle the response
      if (response.ok) {
        console.log('Credentials saved to the database');
      } else {
        console.error('Failed to save credentials to the database');
      }
    })
    .catch(error => {
      console.error('An error occurred while saving credentials:', error);
    });
}

// Attach an event listener to the save button
saveButton.addEventListener('click', () => {
  const username = localStorage.getItem('username');
  const password = localStorage.getItem('password');

  // Send the saved credentials to the database
  saveToDatabase(username, password);
});

        </script>
    --}}
    </div>
</div>
@endsection