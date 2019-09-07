let message_history = document.getElementById('message_history');
let message_input   = document.getElementById('message_input');
let message_user_list = document.getElementById('message_user_list');

let messager = {};
let data = {};
data.id;
data.url;
data.datas;
data.request;
data.message;


messager.users = () => {
  data.url = "message/users";
  data.datas = "";
  messager.comun;
  message_user_list.innerHTML = data.reqest;
  return;
}

messager.read_all = (id) => {
    data.id = id;
    data.url = 'message/read_all';
    data.datas = `id=${data.id}`;
    messager.comun;
    messager.print;
    d = setInterval(messager.read, 2000);
    return;
}

messager.read = () => {
    data.url = 'message/read';
    data.data = `id=${data.id}`;
    messager.comun;
    if(messager.reqest === '') {
      messager.print;
    }
    return;
}

messager.send = () => {
   let message = message_input.value;
   data.url = 'message/send';
   data.data = `id=${data.id}&message=${data.message}`;
   messager.comun;
   messager.print;
   return;
}

messager.print = () => {
  let new_dir = document.createElement("div");
  new_dir.innerHTML = data.message;
  message_history.appendChild(new_dir);
}

messager.comun = () => {
   $.ajax({
     type: 'POST',
     data: data.datas,
     success: function (data) {
       data.reqest = data;
     }
   });
   return;
}

message_input.addEventListener("keyup", function(event) {
     if(event.keyCode === 13) {
       data.message = message_input.value;
       messager.send;
       messager.print();
       message_input.value = "";
   }
});

// var messages_history = document.getElementById('chat');
// var users_list = document.getElementById('users_list');  // dodati u view id= user_list
// var input_text = document.getElementById('insert_text');
// var users, user, d;

// function read_message() {
//     let id_user = "id_user= " + user;
//     xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             let msg = this.responseText;
//             if (msg.length > 0) {
//                 for (i in msg) {
//                     message_write('sender', msg[i].message);
//                 }
//             }
//         };
//         xmlhttp.open("POST", "Message/read_message", true);
//         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xmlhttp.send(id_user);
//     }
// }

//     function send_messag() {
//         let message = input_text.value;
//         let msg = "id_user=" + user + "&message=" + message;
//         xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 if (this.responseText) {

//                     message_write('reciver', message);
//                 }
//                 message_history.innerHTML = txt;
//             }
//         };
//         xmlhttp.open("POST", "Message/new_message", true);
//         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xmlhttp.send(msg);
//     }

//     function read_all(id) {
//         var messages = "";
//         user = id;
//         xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 let txt = "";
//                 messages = JSON.parse(this.responseText);
//                 for(i in messages) {
//                     txt += "<div class='container-fluid'>";
//                     if (messages[i].senderId === user) {
//                         txt += "<div class='sender'><span class='text-span'>" + messages[i].message + "</span></div>";
//                     } else {
//                         txt += "<div class='reciever'><span class='text-span'>" + messages[i].message + "</span></div>";
//                     }
//                     txt += "</div>";
//                 }
//                 messages_history.innerHTML = txt;
//                 d = setInterval(read_user, 2000);
//             }
//         };
//         xmlhttp.open("GET", "Message/show_user_messages?id_user=" + user, true);
//         xmlhttp.send();
//     }

//     // Read all users
//     function read_user() {
//         var txt = "";
//         xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 users = JSON.parse(this.responseText);
//                 for (i in users) {
//                     txt += "<div class='container'onclick='read_all(" + users[i].id + ")'><span class='text-dark'>" + users[i].username + "</div>"
//                 }
//                 user_list.innerHTML = txt;
//             }
//         };
//         xmlhttp.open("GET", "Message/show_user", true);
//         xmlhttp.send();
//     }

//     function key_send(event) {
//         var key = event.keyCode;
//         if (key == 13) {
//             send_messag();
//         }
//     }

//     function bold_user(id) {
//         var bold_text = document.getElementById(id);
//         bold_text.classList.add("font-weight-bold");
//         return;
//     }

//     function text_user(id) {
//         var bold_text = document.getElementById(id);
//         bold_text.classList.remove("font-weight-bold");
//         return;
//     }

//     function message_write(position, message) {
//         let container = document.createElement("div");
//         let sender = document.createElement("div");
//         let span = document.createElement("span");

//         container.className = "container-fluid";
//         sender.className = position;

//         container.appendChild(sender);
//         sender.appendChild(span);
//         span.appendChild(message);

//         messages_history.appendChild(container);

//         return;
//     }


