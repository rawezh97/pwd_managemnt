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
        {{-- <a href="#" onclick="create()"><img src="/images/pwd_logo.png" class="img_logo" alt=""></a> --}}
        
        <div class="search">
                <input type="text" name="search" id="searchInput" placeholder="Search" class="input_search">
                {{-- <input type="text" name="search" id="searchInput" onclick="searchData(event)" placeholder="Search" class="input_search"> --}}
        </div>


<script>
        function getLocalStorageData() {
            const localStorageData = localStorage.getItem('savedData');
            return JSON.parse(localStorageData) || [];
        }

    // Function to handle search
        function handleSearch() 
        {
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
                        <input type="password" id="password${count}" value="${item.password}">
                        <a href="#" onclick="copypwd(${count})"><img src="/images/copy.png" class="copy" alt=""></a>
                        <a href="#" id="btno" class="eye" onclick="abas(${count})">
                            <img class="eyeimg" id="eyeimage${count}" src="/images/view.png" alt="">
                        </a>    
                    </td>
                        <td>
                        <span id="secu${count}" onload="check(${count})"></span>
                        </td>
                        
                        <td class="link"><div></div>${item.link}<a href="${item.link}" target="_blank" class="create_btn edit">Open <img src="/images/edit.png" class="logo_png" alt=""></a></td>
                        <td>${item.note}</td>
                    <td class="lr">
                        <div></div>
                        <a href="#" class="create_btn edit" onclick="edit_localstorage(${count})">Edit <img src="/images/edit.png" class="logo_png" alt=""></a>
                        <a href="#" class="confirm" onclick="delete_localstorage(${count})"><img src="/images/red_basket.png" class="basket" alt=""> </a>
                    </td>
                   <!-- <td><input type="checkbox" name="select" value="${count}" id=""></td> -->
                `;
                dataList.appendChild(row);
            });
        }
        var count = JSON.parse(localStorage.getItem("savedData"));
        check(count.length);
    }
</script>
 

    
        
    </div>

    <div class="option_div">
        <div class="create">
            {{-- <a href="/create" class="create_btn c_color ">Create<img src="/images/dashboard.png" class="logo_png create_logo" alt=""></a> --}}
            <a href="#" class="create_btn c_color" onclick="create()">Create<img src="/images/dashboard.png" class="logo_png create_logo" alt=""></a>
        </div>
        
        <div class="modifie_btn">
            <a href="#" class="create_btn" title="Note that all your current data will disapear and the content of the file displyed " onclick="fileInput.click()">Upload  <input type="file" id="fileInput" hidden accept=".json" /><img src="/images/edit.png" class="logo_png" alt=""></a>
            {{-- <a href="/create" class="create_btn">Copy</a> --}}
            <a href="#" class="create_btn" onclick="exportLocalStorageData()">Export <img class="logo_png" src="/images/file-export.png" alt=""></a>
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
                <th>Note</th>
                <th>select</th>

        </tr>
    </thead>
        <tbody id="dataList">
            @yield('con')
        </tbody>

    </table>
</form>





<script>
    // Function to update the view with the saved data from local storage
    function updateView() {
        
        // Retrieve saved data from local storage
        const savedData = JSON.parse(localStorage.getItem('savedData'));

        // Get the target element where the rows will be displayed
        const dataList = document.getElementById('dataList');

        // Clear the existing data from the view
        dataList.innerHTML = '';

        // Display the saved data in the corresponding <td> elements
        var count = 0 ;
        if (savedData) {
            savedData.forEach(item => {
                count += 1 ;
                const row = document.createElement('tr');
                row.innerHTML = `
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
                        <input type="password" id="password${count}" value="${item.password}">
                        <a href="#" onclick="copypwd(${count})"><img src="/images/copy.png" class="copy" alt=""></a>
                        <a href="#" id="btno" class="eye" onclick="abas(${count})">
                            <img class="eyeimg" id="eyeimage${count}" src="/images/view.png" alt="">
                        </a>    
                    </td>
                        <td>
                        <span id="secu${count}" onload="check(${count})"></span>
                        </td>
                        <td class="link"><div></div>${item.link}<a href="${item.link}" target="_blank" class="create_btn edit">Open <img src="/images/share.png" class="logo_png" alt=""></a></td>

                        <td>${item.note}</td>
                    <td class="lr">
                        <div></div>
                        <a href="#" class="create_btn edit" onclick="edit_localstorage(${count})">Edit <img src="/images/edit.png" class="logo_png" alt=""></a>
                        <a href="#" class="confirm" onclick="delete_localstorage(${count})"><img src="/images/red_basket.png" class="basket" alt=""> </a>
                    </td>
                   <!-- <td><input type="checkbox" name="select" value="${count}" id=""></td> -->
                `;
                dataList.appendChild(row);
            });
        }
    }

    // Load the view when the page loads
    window.onload = function() {
        updateView();
        window.history.replaceState({}, document.title, "/" + "start");

        var count = JSON.parse(localStorage.getItem("savedData"));
        check(count.length);

        
    };
</script>


<script>
     function abas(id){
                    var password = document.getElementById("password"+id);
                    var eye = document.getElementById("eyeimage"+id);
                    if(password.type == "password" ? eye.src="/images/eye.png" : eye.src="/images/view.png");
                     if (password.type == "password" ? password.type = "text" : password.type = "password");
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

    function edit_localstorage(nums){
        // let check = document.querySelectorAll('input[name="select"]:checked');
        // alert(nums);
        // check.forEach((checkbox) => {nums.push(checkbox.value)});
        // alert(nums);

        // Retrieve saved data from local storage
        const savedData = JSON.parse(localStorage.getItem('savedData'));

        // Get the target element where the rows will be displayed
        const dataList = document.getElementById('dataList');

        // Clear the existing data from the view
        dataList.innerHTML = '';

        // Display the saved data in the corresponding <td> elements
        var count = 0 ;
        if (savedData) {
            savedData.forEach(item => {
                count += 1 ;

                    if(nums == count){

                        // alert('checked');
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td><input value="${item.username}" name="username" class=""></input></td>
                        <td><input value="${item.password}" name="password" class=""></input></td>
                        <td>
                            <a href="#" class="#" id="action2" onmouseover="openForm2()" onmouseout="closeForm2()" onclick="openForm2()" ><img class="dropDOwn2" id="profile2" src="/images/lightbulb.png"  ></a>

                        </td>
                            <td><input value="${item.link}" name="link" class=""></input></td>
                            <td><input value="${item.note}" name="note" class=""></input></td>
                            <td><button type="submit" class="update" onclick='updateData(event,${count-1})'>update</button></td>
                        `;
                        dataList.appendChild(row);
                    }
            });
        }
        window.history.replaceState({}, document.title, "/" + "start");

    }

    function updateData(event,id) {

        const localStorage_data = localStorage.getItem('savedData');
        // alert(localStorage_data);
        // alert(localStorage_data[0]);
        const json_data = JSON.parse(localStorage_data);
        // alert(json_data[0].note);
        // Get the input field values
        const form = event.target.form;
        var note = form.elements['note'].value;
        var username = form.elements['username'].value;
        var password = form.elements['password'].value;
        var link = form.elements['link'].value;
        id = parseInt(id);
        // Get existing data from local storage or initialize an empty array
        let savedData = JSON.parse(localStorage.getItem('savedData'));
        savedData[id].note = String(note);
        savedData[id].username = (username);
        savedData[id].password = (password);
        savedData[id].link = (link);
        

        const modify = JSON.stringify(savedData);

        // Save the updated array back to local storage
        localStorage.setItem('savedData', modify);

        // document.getElementById("success_up").style.display = "block";
        

        
    
    }

    function delete_localstorage(nums){

        if (confirm('Are you sure?')) {
            let myArray = JSON.parse(localStorage.getItem('savedData')) || [];
            const rowIndexToRemove = nums-1;
            if (rowIndexToRemove >= 0 && rowIndexToRemove < myArray.length) {
            myArray.splice(rowIndexToRemove, 1);
            }
            localStorage.setItem('savedData', JSON.stringify(myArray));
            window.location.reload();
            
        } else {
            
        }

    }
    function copypwd(id){
        var text = document.getElementById("password"+id);
        text.select();
        navigator.clipboard.writeText(text.value);
        // alert('coped');
    }
    function copyusr(id){
        var copyText = document.getElementById("username"+id);
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();                        
        // navigator.clipboard.writeText(text,textContent);
        // alert('coped');
    }
    function exportLocalStorageData() {
      const localStorageData = localStorage.getItem('savedData');

      if (localStorageData) {
        // Convert the data to a JSON string
        const jsonData = JSON.stringify(localStorageData, null, 2);

        // Create a Blob with the JSON data
        const blob = new Blob([jsonData], { type: 'application/json' });

        // Create a link element to trigger the download
        const downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = 'localStorageData.json';
        downloadLink.click();

        // Clean up the URL object
        URL.revokeObjectURL(downloadLink.href);
      } else {
        alert('LocalStorage data is empty!');
      }
    }

    function handleFileUpload(event) {
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        try {
          const jsonData = JSON.parse(e.target.result);
          const localStorageKey = 'savedData';
          
          // Store the data in LocalStorage
          localStorage.setItem(localStorageKey, JSON.stringify(JSON.parse(jsonData)));
          
          alert('File uploaded and data populated to LocalStorage successfully!');
        } catch (error) {
          alert('Error parsing the JSON file: ' + error.message);
        }
      };

      reader.readAsText(file);
    }

    // Add an event listener to the file input element
    const fileInput = document.getElementById('fileInput');
    fileInput.addEventListener('change', handleFileUpload);



    



</script>









{{-- 333333 --}}

<script>
        function create(){
        // let check = document.querySelectorAll('input[name="select"]:checked');
        // alert(nums);
        // check.forEach((checkbox) => {nums.push(checkbox.value)});
        // alert(nums);

        // Retrieve saved data from local storage
        const savedData = JSON.parse(localStorage.getItem('savedData'));

        // Get the target element where the rows will be displayed
        const dataList = document.getElementById('dataList');

        // Clear the existing data from the view
        dataList.innerHTML = '';

        // Display the saved data in the corresponding <td> elements


        // alert('checked');
        const row = document.createElement('tr');
        row.innerHTML = `
        <form action="/store" id="createForm" method="POST">
    @csrf
        <tr>

            <td><input type="text" name="username" placeholder="Username" class="create_input"></td>
            <td><input type="password" name="password" onkeydown="check()" placeholder="Password" class="create_input"></td>
            <td>
                <a href="#" class="#" id="action2" onmouseover="openForm2()" onmouseout="closeForm2()" onclick="openForm2()" ><img class="dropDOwn2" id="profile2" src="/images/lightbulb.png"  ></a>

            </td>
            <td><input type="text" name="link" placeholder="link" class="create_input"></td> 
            <td><input type="text" name="note" placeholder="note" class="create_input"></td>
            <td><button type="submit" class="update_btn" onclick="saveData(event)">save</button></td>

                
        </tr>  

</form>`;
        dataList.appendChild(row);
        

        
    }
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
        window.location.reload();
    }
</script>












<div class="form-popup2" id="myForm2">
    <div class="form-container2">
        <h3 class="info">Strong Password is</h3>
        <span class="hs">
            <ul>
                <li>At least 12 characters long but 14 or more is better.</li>
                <li>A combination of uppercase letters, lowercase letters, numbers, and symbols.</li>
                <li>Not a word that can be found in a dictionary or the name of a person, character, product, or organization.</li>
                <li>Significantly different from your previous passwords.</li>
            </ul>
            

           
            
            
            
            
            
            Easy for you to remember but difficult for others to guess. Consider using a memorable phrase like <span class="example">!iLoveMyCat^-^</span> .
        </span>
       
    </div>
  </div>


  
 
  <script>
    function openForm2() {
      document.getElementById("myForm2").style.display = "block";
      document.getElementById("profile2").src = "/images/lightbulbon.png";
      document.getElementById("action2").onclick = closeForm2;
      
    }
    function modifyForm2() {
    //   document.getElementById("myForm").style.display = "none";
      document.getElementById("modifyForm").style.display = "block";
      document.getElementById("action2").onclick = closeForm2;
    //   document.getElementById("profile").src = "/images/close.png";
    //   document.getElementById("action").onclick = "closeForm()";
    }
    
    function closeForm2() {
        document.getElementById("action2").onclick = openForm2;
        document.getElementById("profile2").src = "/images/lightbulb.png";
      document.getElementById("myForm2").style.display = "none";
      document.getElementById("modifyForm").style.display = "none";
    
    }
    </script>








@endsection