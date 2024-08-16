
@extends('frontend.skinoasis.layouts.master')



<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-storage.js"></script>

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyAc14x-1Z70rtG0QU_b4veXF2IbMmTNn9w",
        authDomain: "chat-dokter-d666a.firebaseapp.com",
        projectId: "chat-dokter-d666a",
        storageBucket: "chat-dokter-d666a.appspot.com",
        messagingSenderId: "47960843913",
        appId: "1:47960843913:web:a83206fd29dbc73add8858",
        measurementId: "G-VH36E0EJ3N"
    };

    //# ---- Solusiitkreasi
    // var firebaseConfig = {
    //     apiKey: "AIzaSyCsCHzE5Pov2bBI9RzCWmJmagVKki-uyD8",
    //     authDomain: "skinoasis-web.firebaseapp.com",
    //     projectId: "skinoasis-web",
    //     storageBucket: "skinoasis-web.appspot.com",
    //     messagingSenderId: "797660512190",
    //     appId: "1:797660512190:web:9bb430f7051180c494c3ef",
    //     measurementId: "G-3LBB2D7SCY"
    // };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



@section('contents')

<!-- char-area -->
<section class="message-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="chat-area">
                    <!-- chatlist -->
                    <div class="chatlist">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="chat-header">
                                    <!-- <div class="msg-search">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" aria-label="search">
                                        <a class="add" href="#"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/add.svg" alt="add"></a>
                                    </div> -->

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="Open-tab" data-toggle="tab" data-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Open</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Closed-tab" data-toggle="tab" data-target="#Closed" type="button" role="tab" aria-controls="Closed" aria-selected="false">New</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="modal-body">
                                    <!-- chat-list -->
                                    <div class="chat-lists">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                <!-- chat-list -->
                                                <div class="chat-list">
                                                    @forelse ($chats as $chat)
                                                    <a href="javascript:void(0);" onclick="startChat({{$chat->room_id}});" class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                            <span class="active"></span>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h3>{{ $chat->user->name }} </h3>
                                                            <p>{{ is_null($chat->user->spesialis)?'':'('.$chat->user->spesialis.')' }}</p>
                                                        </div>
                                                    </a>
                                                    @empty
                                                    <p class="text-center">Belum ada pengguna.</p>
                                                    @endforelse

                                                </div>
                                                <!-- chat-list -->
                                            </div>

                                            <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">

                                                <!-- chat-list -->
                                                <div class="chat-list">
                                                    @forelse ($users as $user)
                                                    <a href="javascript:void(0);" onclick="createChat({{$user->id}});" class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                            <span class="active"></span>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h3>{{ $user->name }}</h3>
                                                            <p>{{ is_null($user->spesialis)?'':'('.$user->spesialis.')' }}</p>
                                                        </div>
                                                    </a>
                                                    @empty
                                                    <p class="text-center">Belum ada pengguna.</p>
                                                    @endforelse
                                                </div>
                                                <!-- chat-list -->
                                            </div>
                                        </div>

                                    </div>
                                    <!-- chat-list -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatlist -->



                    <!-- chatbox -->
                    <div class="chatbox">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="msg-head">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                                                <div class="flex-shrink-0">
                                                    <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                </div>
                                                <div class="flex-grow-1 ms-3" id="room_text"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-body">
                                    <div class="msg-body">
                                        <ul class="chat-container"></ul>
                                    </div>
                                    <!-- <div class="msg-body">
                                        <ul class="isipesan">
                                            <li class="sender">
                                                <p> Hey, Are you there? </p>
                                                <span class="time">10:16 am</span>
                                            </li>
                                            <li class="repaly">
                                                <p>yes!</p>
                                                <span class="time">10:20 am</span>
                                            </li>
                                            <li class="sender">
                                                <p> Hey, Are you there? </p>
                                                <span class="time">10:32 am</span>
                                            </li>
                                            <li class="repaly">
                                                <p>How are you?</p>
                                                <span class="time">10:35 am</span>
                                            </li>
                                            <li>
                                                <div class="divider">
                                                    <h6>Today</h6>
                                                </div>
                                            </li>

                                            <li class="repaly">
                                                <p> yes, tell me</p>
                                                <span class="time">10:36 am</span>
                                            </li>
                                            <li class="repaly">
                                                <p>yes... on it</p>
                                                <span class="time">junt now</span>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>

                                <div class="send-box">
                                    <div class="row">
                                        <!-- <div class="col-md-1 text-center">
                                            <i class="fa fa-image fa-2x" id="open-file"></i>
                                            <input type="file" id="file" style="display: none;" onchange="uploadFiles(this);">
                                        </div> -->
                                        <div class="col-md-9">
                                            <input type="text" id="message" class="form-control" aria-label="message…" placeholder="Write message…">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="hidden" id="room_id" value="">
                                            <input type="hidden" id="auth_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" id="auth_name" value="{{Auth::user()->name}}">
                                            <button type="button"onclick="sendMessage('');" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chatbox -->
            </div>
        </div>
    </div>
</section>
<!-- char-area -->

@endsection

@section('scripts')
<script>

    jQuery(document).ready(function() {

        $(".chat-list a").click(function() {
            $(".chatbox").addClass('showbox');
            return false;
        });

        $(".chat-icon").click(function() {
            $(".chatbox").removeClass('showbox');
        });

    });

    $(document).ready(function(e) {
        $("#open-file").click(function () {
            $("#file").trigger('click');
        });
    });
</script>

<script>
    const database = firebase.firestore();
    const storage = firebase.storage();
    const chatsCollection = database.collection('chats');

    function createChat(userId) {
        let senderId = $("#auth_id").val();
        axios.post('/api/check-room', {
            senderId, userId
        })
        .then(function (res) {
            // exits chat
            if (res.data.isChat > 0) {
                startChat(res.data.roomId);
            } else {
                chatsCollection
                .add({})
                .then(function(docRef) {
                    console.log("Document written with ID: ", docRef.id);
                    createRoom(docRef.id, userId);
                })
                .catch(function(error) {
                    console.error("Error adding document: ", error);
                });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function createRoom(roomId, userId) {
        let senderId = $("#auth_id").val();
        let recipientId = userId;
        axios.post('/api/save-room', {
            roomId, senderId, recipientId
        })
        .then(function (res) {
            console.log(res);
            window.location.reload();
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function startChat(roomId) {
        axios.post('/api/get-room', {
            roomId
        })
        .then(function (res) {
            let dokter = res.data.dokter;
            let docRef = res.data.data.room_name;
            $("#room_text").html("Ruang obrolan " + dokter);
            $("#room_id").val(docRef);

            getAllMessage(docRef);
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function sendMessage(image) {
        let message = $("#message").val();
        let doc = $("#room_id").val();
        let userId = $("#auth_id").val();
        let userName = $("#auth_name").val();

        chatsCollection
        .doc(doc)
        .collection("message")
        .add({
            createdAt: firebase.firestore.FieldValue.serverTimestamp(),
            userId: userId,
            userName: userName,
            message: message,
            image: image,
        })
        .then(function(docRef) {
            $("#message").val("");
        })
        .catch(function(error) {
            console.error("Error writing document: ", error);
        });
    }

    function uploadFiles(element) {
        const ref = storage.ref();
        const file = $(element)[0].files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType:file.type
        }

        const task = ref.child('chats/'+name).put(file, metadata);

        let userId = $("#auth_id").val();
        let userName = $("#auth_name").val();

        task
        .then(snapshot => snapshot.ref.getDownloadURL())
        .then(url => {
            console.log(url)
            sendMessage(url);
        });
    }

    function getAllMessage(roomId) {
        chatsCollection
        .doc(roomId)
        .collection("message")
        .orderBy('createdAt', 'desc')
        .onSnapshot(function(querySnapshot) {
            $(".chat-container").empty();
            const allMessages = [];
            querySnapshot.forEach(doc => {
                if (doc) allMessages.push(doc.data())
            });

            let reverse = Array.prototype.reverse.call(allMessages);

            if (reverse.length > 0) {
                $.each(reverse, function (index, value) {
                    // console.log(value)
                    let id = value.userId;
                    let username = value.userName;
                    let message = value.message;
                    let image = value.image;
                    let time = value.createdAt.toDate().toLocaleTimeString('en-US',{hour: '2-digit', minute: '2-digit' });
                    let isMe = id == '{{Auth::user()->id}}' ? 'chat-right' : 'chat-left';
                    let chat = '';
                    if (image == "") {
                        chat = '<li class="chat '+isMe+'"><p>'+ message +'</p> <span class="time">'+ time +'</span></li>';
                    } else {
                        chat = '<li class="chat '+isMe+'"> <img src="'+image+'" width="100%" height="150" /><br>' + time + '</li>';
                    }
                    $(".chat-container").append(chat);
                });
            } else {
                $(".chat-container").append('<p class="text-center">Silakan kirim pesan untuk memulai percakapan.</p');
            }

        }, function(error) {
            console.log(error);
        });
    }

</script>
@endsection
