@extends('layout')
@section('content')


<header>
    <a href="/" class="create_btn logout_color">home</a>
    <span class="sucess_message" style="display: none" id="success_up">Successfully Updated</span>  

    <span class="error_message" style="display: none" id="error">Faild</span>  

</header>

<div class="big_div">

    <div class="big_head">
        <a href="/start"><img src="/images/pwd_logo.png" class="img_logo" alt=""></a>
        
        <div class="search">
            <form>
                <input type="text" name="search" id="searchInput"  placeholder="Search" class="input_search">
                
            </form>
        </div>


<script>
    // Add an event listener to the search input
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', handleSearch);
    function disply_searchResult(data) {
        // Retrieve saved data from local storage
        // const savedData = JSON.parse(localStorage.getItem('savedData'));

        // Get the target element where the rows will be displayed
        const dataList = document.getElementById('dataList');

        // Clear the existing data from the view
        dataList.innerHTML = '';

        // Display the saved data in the corresponding <td> elements
        var count = 0 ;
        if (data) {
            data.forEach(item => {
                count += 1 ;
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.note}</td>
                    <td class="lr">
                        <div></div>
                        <div class="usr">
                            <span id="username${count}">${item.username}</span>
                        </div>
                        <div class="cpy_btn">
                            <a href="#" onclick="copyusr(${count})"><img src="/images/copy.png" class="copy" alt=""></a>
                        </div>
                        </td>
                    <td>
                        <input type="password" onkeydown="check(${count})" id="password${count}" value=" ${item.password}">
                        <a href="#" onclick="copypwd(${count})"><img src="/images/copy.png" class="copy" alt=""></a>
                        <a href="#" id="btno" class="eye" onclick="abas(${count})">
                        <img class="eyeimg" id="eyeimage${count}" src="/images/view.png" alt="">
                        </a>    
                    </td>
                    
                    <td>
                      <span id="secu${count}" onkeydown="check(${count})"></span>
                    </td>
                    <td>${item.link}</td>
                    <td>
                        <a href="#" class="create_btn" onclick="edit_localstorage(${count})">Edit_localstorage <img src="/images/edit.png" class="logo_png" alt=""></a>
                        <a href="#" class="create_btn" onclick="delete_localstorage(${count})">delete <img src="/images/delete.png" class="logo_png" alt=""></a>
                    </td>
                   <!-- <td><input type="checkbox" name="select" value="${count}" id=""></td> -->
                `;
                dataList.appendChild(row);
                
            });
        }
        var count = JSON.parse(localStorage.getItem("savedData"));
        check(count.length);
    }


        function getLocalStorageData() {
      const localStorageData = localStorage.getItem('savedData');
      return JSON.parse(localStorageData) || [];
    }

    // Function to handle search
    function handleSearch() {
      const searchInput = document.getElementById('searchInput');
      const searchQuery = searchInput.value.toLowerCase();

      const localStorageData = getLocalStorageData();

      // Filter the array based on the search query
      const searchResults = localStorageData.filter((item) => {
        // Search for the "note" property
        return item.note.toLowerCase().includes(searchQuery);
      });

    //   alert(searchResults);
      disply_searchResult(searchResults);
      // Do whatever you want with the search results here, e.g., update other elements on the page or perform additional actions.
    }


</script>
 

    
        
    </div>

    <div class="option_div">
        <div class="create">
            <a href="/create" class="create_btn c_color ">Create<img src="/images/dashboard.png" class="logo_png create_logo" alt=""></a>
        </div>
        
        <div class="modifie_btn">
            <a href="#" class="create_btn" onclick="">Upload  <input type="file" id="fileInput" hidden accept=".json" /><img src="/images/edit.png" class="logo_png" alt=""></a>
            {{-- <a href="/create" class="create_btn">Copy</a> --}}
            <a href="#" class="create_btn" onclick="">Export <img class="logo_png" src="/images/file-export.png" alt=""></a>
            {{-- <a href="#" class="create_btn">More</a> --}}
            <a href="#" class="create_btn" id="action" onclick="openForm()" ><img class="dropDOwn" id="profile" src="/images/question.png"  ></a>
            <div class="form-popup" id="myForm">
                <div class="form-container">
                    <h3>how it work</h3>
                    <span class="hs">
                        this application is totaly save and scure 
                        because we don't have a database to store things
                        every thing is stored on your device and 
                        we don't have access to your data.
                    </span>
                    <h3>backup your data</h3>
                    <span class="hs">
                        because this application is totaly in your device 
                        that meant if you want to change your device 
                        the data not transmetid through the devices 
                        you should make it <b>Export</b> and then 
                        in the new device <b>Import</b> your data.

                    </span>
                        <h3>Do Not clear</h3>
                    <span class="hs">
                        becearfuly you must't clear your cache 
                        because it will remove your staf 
                        if you want make a backup on it then clear it.
                    </span>
                </div>
              </div>


              
              <div class="form-popup" id="modifyForm">
                <form action="/update_User" method="post" class="form-container">
                    @csrf
                    <div class="p_head">
                        <div class="profile_head">
                          <img src="/images/user.png" class="user_p" alt="">
                          <h1>Profile</h1>
                        </div>
                        <div class="num_item">
                          <span class="pro_equa"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="usr_info">
                        <h4 for="username">Username : </h4>
                    </div>
                  <input type="text" placeholder="Enter username" name="username" value="" required>
                    
                  <div  class="usr_info">
                      <h4 for="email">Email :</h4>               
                  </div>
                  <input type="text" placeholder="Enter Email" name="email" value="" required>

                  <div class="usr_info">
                      <h4 for="psw"><b>New Password : </b></h4>
                  </div>
                  <input type="password" placeholder="Enter Password"  name="password" value="" required>
              
                  <button type="submit" class="btn up rb">Update</button>
                  <button type="button" class="btn cancel db" onclick="closeForm()">Delete Acount</button>
                </form>
              </div>
              <script>
                function openForm() {
                  document.getElementById("myForm").style.display = "block";
                  document.getElementById("profile").src = "/images/close.png";
                  document.getElementById("action").onclick = closeForm;
                  
                }
                function modifyForm() {
                //   document.getElementById("myForm").style.display = "none";
                  document.getElementById("modifyForm").style.display = "block";
                  document.getElementById("action").onclick = closeForm;
                //   document.getElementById("profile").src = "/images/close.png";
                //   document.getElementById("action").onclick = "closeForm()";
                }
                
                function closeForm() {
                  document.getElementById("action").onclick = openForm;
                  document.getElementById("profile").src = "/images/question.png";
                  document.getElementById("myForm").style.display = "none";
                  document.getElementById("modifyForm").style.display = "none";
                
                }
                </script>
        
           

        </div>

        <script>
            function submitFunction (){
                document.getElementById('edit').submit();
            }
        </script>

        
        <div class="help">
            <a href="#" class="create_btn help" title="Total"><script>
                var count = JSON.parse(localStorage.getItem("savedData"));
                document.write(count.length);
                </script></a>
        </div>
    </div>


<form>
<table>
    <thead>
        <tr class="h">
            <th>username</th>
            <th>password</th>
            <th>security</th>
            <th>link</th>
            <th>note</th>
            <th>select</th>

        </tr>
    </thead>
        <tbody id="dataList">
            @yield('con')


<form action="/store" id="createForm" method="POST">
    @csrf
        <tr>

            <td><input type="text" name="username" placeholder="Username" class="create_input"></td>
            <td><input type="password" name="password" onkeydown="check(${count})" placeholder="Password" class="create_input"></td>
            <td>
                <span id="secu${count}" onload="check(${count})"></span>
            </td>
            <td><input type="text" name="link" placeholder="link" class="create_input"></td> 
            <td><input type="text" name="note" placeholder="note" class="create_input"></td>
            <td><button type="submit" class="update_btn" onclick="saveData(event)">save</button></td>

                
        </tr>  

</form>
</tbody>

</table>
<script>
    // Function to save data to local storage and update the view
    function saveData(event) {
        event.preventDefault(); // Prevent form submission

        const form = event.target.form; // Get the form element

        // Get the input field values
        const username = form.elements['username'].value;
        const password = form.elements['password'].value;
        const link = form.elements['link'].value;
        const note = form.elements['note'].value;

        // Get existing data from local storage or initialize an empty array
        let savedData = JSON.parse(localStorage.getItem('savedData')) || [];

        // Add the new data to the array
        savedData.push({ note, username, password, link });

        // Save the updated array back to local storage
        localStorage.setItem('savedData', JSON.stringify(savedData));

        // Reset the form fields
        form.reset();

        // Update the view
        // updateView();
    }
    function check(count){
        let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
        let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')
        // alert("secu"+count);
        // var count = parseInt(count)
        for (var i = 1; i <= count; i++) {
            var password = document.getElementById("password"+i).value;
            // alert("password"+i);
            // alert(password);
            // alert("secu"+1);
            const criteria = {
            length: false,
            uppercase: false,
            lowercase: false,
            number: false,
            specialChar: false,
        };

        // Check if the password meets each criteria
        if (password.length >= 8) {
            criteria.length = true;
        }

        if (/[A-Z]/.test(password)) {
            criteria.uppercase = true;
        }

        if (/[a-z]/.test(password)) {
            criteria.lowercase = true;
        }

        if (/\d/.test(password)) {
            criteria.number = true;
        }

        if (/[$@!%*?&]/.test(password)) {
            criteria.specialChar = true;
        }

        // Calculate the number of criteria met
        const numCriteriaMet = Object.values(criteria).filter(Boolean).length;
        // alert(numCriteriaMet);

        // Return the strength of the password based on the number of criteria met
        if(numCriteriaMet == 1) {
            document.getElementById("secu"+i).innerHTML = "Password Weak";
            document.getElementById("secu"+i).style.color = "red";
        }
        else if(numCriteriaMet==2){
            document.getElementById("secu"+i).innerHTML = "Password Moderate";
            document.getElementById("secu"+i).style.color = "#fbff00";

        }
        else if(numCriteriaMet==3){
            document.getElementById("secu"+i).innerHTML = "Password Medium";
            document.getElementById("secu"+i).style.color = "#ff9900";

        }
        else if(numCriteriaMet==4){
            document.getElementById("secu"+i).innerHTML = "Password Strong";
            document.getElementById("secu"+i).style.color = "#2a8330";

        }
        else if(numCriteriaMet==5){
            document.getElementById("secu"+i).innerHTML = "Password Extrime";
            document.getElementById("secu"+i).style.color = "#00ff1f";

        }
        
            
        }


    }

    // Function to update the view with the saved data
    function updateView() {
        const localStorage_data = localStorage.getItem('saveData');
        alert(localStorage_data);
        const json_data = JSON.parse(localStorage_data);
        alert(json_data);
        // Display each saved item in the list
        if (savedData) {
            savedData.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <td>${item.username}</td>
                <td>${item.password}</td>
                <td>${item.link}</td>
                <td>${item.note}</td>
                `;
                dataList.appendChild(row);
            });
        }
    }

    // Load the view when the page loads
    // window.onload = function() {
    //     updateView();
    // };
</script>

@endsection
