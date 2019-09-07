    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
        <h1 class="h2">Messages</h1>
    </div>

    <div class="row">
        <div class="col-md-9 inbox pr-0">

            <div id='message_history' class="chatbox pl-3 border" id="chat">
            <p>
               <!-- JS writes messages here  -->
            </p>
            </div>
            <div class="typemessage mt-0">
            <div class="row mr-0 ml-0 border-bottom border-left">
                    <input id="message_input" type="text" name="message" class="form-control col-10 d-inline pt-3 pb-2" placeholder="Type your message here..." autofocus="autofocus">
                    <input type="button" onclick="send_btn()" name="submit" class="btn btn-chat col-2" value="Send">
                    <input type="hidden" id="to_id" value=''>
                </div> 
            </div>
        </div>

        <div  id="message_user_list"  class="col-md-3 users-list pl-0 pr-0">
        <ul class="nav flex-column text-center">
        <li class="nav-item">
            <!-- user list -->
        </li>
        </ul>
        </div>

    </div>


     <script>
     let message_history = document.getElementById('message_history');
     let message_input   = document.getElementById('message_input');
     let message_user_list = document.getElementById('message_user_list');
     let id_user = document.getElementById('to_id'); 
     let d; 

     function user_list() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState === 3 && this.status === 200) {
       message_user_list.innerHTML = this.responseText;
      }
     };
     xhttp.open("GET", "Message/users", true);
     xhttp.send(); 
     }

     function read_all(id) {
         id_user.value  = id; 
         $.ajax({
             url: "Message/read_all", 
             type: "POST",
             data: "id=" + id, 
             success: function(msg) {
                message_history.innerHTML = msg; 
                scroll();
             }
         }); 
         d = setInterval(read, 2000); 
     }
     user_list();
    
    function read() {
        let id = id_user.value
       $.ajax({
           url: "Message/read_new",
           type: "POST", 
           data: "id=" + id,
           success: function(msg) {
               if(msg !== "") {
               let new_dir = document.createElement('div'); 
               new_dir.innerHTML = msg; 
               message_history.appendChild(new_dir); 
               scroll();
               }
           }
       }); 
    } 

     function send_btn() {
        if(message_input.value === "") {
            message_input.focus(); 
        } else {
            send();
        }
    }

    function send() {
        let message = message_input.value; 
        let id = id_user.value; 
        $.ajax({
            url: "Message/new_message",
            type: "POST", 
            data: "id=" + id + "&message=" + message, 
            success:function(msg) {
                let new_dir = document.createElement("div");
                new_dir.innerHTML = msg;
                message_history.appendChild(new_dir);
                scroll();
            }
        }); 
        message_input.value = ""; 
    }

     user_list();

     message_input.addEventListener("keyup", function(event) {
        if(event.keyCode === 13) {
            send();
         }
     });
    
     function scroll() {
       message_history.scrollTop = message_history.scrollHeight;
       return;
    }
      </script>
</main>