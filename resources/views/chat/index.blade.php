<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
</head>
<body>
    <div class="top-bar d-flex align-items-center justify-content-between px-3 py-2">
        <div class="logo">
            <img src="{{ asset('assets/Logo.png') }}" alt="SLT Logo" height="40">
        </div>
        <div class="search-bar d-flex flex-grow-1 mx-3">
            <input type="text" id="search-input" class="form-control me-2" placeholder="Search contacts, messages, or options here...">

        </div>
        <div class="user-info d-flex align-items-center">
            <span class="me-2"><b>{{ $agentName }}</b></span>
            <img src="{{ asset('assets/icon_green.jpeg') }}" alt="User Image" class="rounded-circle">
        </div>
    </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="option-sidebar">
                <div class="icon-option">
                    <a href="{{ route('agent.chat') }}">
                        <i class="bi bi-chat-dots text-white"></i>
                    </a>
                </div>
                <div class="icon-option">
                    <i class="bi bi-gear"></i>
                </div>
                <div class="icon-option">
                    <i class="bi bi-person"></i>
                </div>
                <div class="icon-option">
                    <form action="{{ route('logout') }}" method="POST" class="icon-option d-inline">
                        @csrf
                        <button type="submit" class="btn">
                            <i class="bi bi-box-arrow-right text-white"></i>
                        </button>
                    </form>
                </div>
            </div>
    
            <!-- Contact List -->
            <div class="col-md-3 contact-sidebar">
                <div class="d-flex align-items-center p-3" style="background-color: #2e3a84;">
                    <img src="https://via.placeholder.com/40" alt="" class="me-2">
                    <span>Contacts</span>
                </div>
                <ul id="contacts" class="contact-list">
                    @forelse($contacts as $contact)
                        <li class="contact-item" data-phone="{{ $contact->phone_number }}">
                            <img src="{{ asset('assets/human_icon2.jpeg') }}" alt="">
                            <span>{{ $contact->phone_number }}</span>
                            <span class="unread-count" style="display: none;">0</span> <!-- Unread count -->
                        </li>
                    @empty
                        <li>No contacts available</li>
                    @endforelse
                </ul>
            </div>
    
            <!-- Chat Box -->
            <div class="col-md-8 chat-section">
                <div id="contact-info" class="contact-info">
                    <img src="{{ asset('images/human_icon2.jpeg') }}" alt="">
                    <span>Select a contact to start chatting</span>
                </div>
    
                <div id="chat-box" class="chat-box">
                </div>
                <div id="predefined-message-dropdown" class="dropdown-menu">
                    <a class="dropdown-item" href="#">Hello! 👋 This is {{ $agentName }}.I’m here to assist you with any questions or concerns you may have.Let me know how I can help you today!</a>
                    <a class="dropdown-item" href="#">Please hold on for a moment while I look into this for you. Thank you!</a>
                    <a class="dropdown-item" href="#">I'm here to help you. What do you need?</a>
                    <a class="dropdown-item" href="#">Please let me know your query.</a>
                    <a class="dropdown-item" href="#">Thank you for your patience! 🙏 I’ll check this for you and be right back.</a>
                </div>
    
                <form id="chat-form" class="message-input-group">
                    <button type="button" class="btn btn-outline-secondary me-2" id="predefined-message-btn">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <input type="text" id="message" class="form-control" placeholder="Type a message">
                    <button type="submit">
                        <i class="bi bi-send"></i> Send
                    </button>
                </form>
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <script>
document.addEventListener('DOMContentLoaded', () => {
    const emp_id = '{{ $emp_id }}';
    const contacts = @json($contacts);
    const chatBox = document.getElementById('chat-box');
    const messageForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message');
    const predefinedMessageBtn = document.getElementById('predefined-message-btn');
    const predefinedMessageDropdown = document.getElementById('predefined-message-dropdown');
    const contactInfo = document.getElementById('contact-info');
    const contactList = document.getElementById('contacts');
    let currentContact = '';

    // Initialize Pusher
    Pusher.logToConsole = true;
    const pusher = new Pusher('8b8cd58f044da646b71a', {
        cluster: 'ap2',
        encrypted: true
    });

    let channel = null;

    // Request notification permission on page load
    if (Notification.permission !== 'granted' && Notification.permission !== 'denied') {
        Notification.requestPermission().then(permission => {
            console.log(permission); // Log permission status: 'granted' or 'denied'
        });
    }

    function subscribeToChannel(contact) {
        if (channel) {
            channel.unbind('message.sent');
            pusher.unsubscribe(channel.name);
        }

        channel = pusher.subscribe('chat.' + contact);
        channel.bind('message.sent', function (data) {
    appendMessage(data.message, data.message.from === emp_id);

    // Move sender to the top immediately, regardless of whether their chat is open
    moveContactToTop(data.message.from);

    // If the message is from someone other than the current user
    if (data.message.from !== emp_id) {
        showNotification(data.message);
        updateUnreadCount(data.message.from);
    }
});

    }

    // Handle predefined message selection
    predefinedMessageBtn.addEventListener('click', () => {
        predefinedMessageDropdown.classList.toggle('show');
    });

    predefinedMessageDropdown.addEventListener('click', (e) => {
        const message = e.target.textContent;
        if (message) {
            messageInput.value = message; // Populate input with selected message
            predefinedMessageDropdown.classList.remove('show'); 
        }
    });

    function appendMessage(data, isSent) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message ' + (isSent ? 'sent' : 'received');
        messageDiv.innerHTML = `
            <div>${data.message}</div>
            <small class="text-muted" style="display: block; margin-top: 5px; font-size: 0.8rem;">
                ${data.formatted_time}
            </small>
        `;

        chatBox.appendChild(messageDiv);
        scrollToBottom();

        // Mark the message as unread for the current contact
        if (data.message.from !== emp_id) {
            markAsUnread(data.message.from);
        }
    }

// Save the updated order of contacts to localStorage
function saveContactOrder() {
    const contactItems = document.querySelectorAll('.contact-item');
    const contactOrder = Array.from(contactItems).map(contact => contact.getAttribute('data-phone'));
    localStorage.setItem('contactOrder', JSON.stringify(contactOrder)); // Save to localStorage
}


let lastMessageTime = 0; // Initialize with 0 as a base timestamp

//Function to move contact to the top based on phone number
function moveContactToTop(phoneNumber) {
    const contactList = document.querySelector('.contact-list');
    const contactItem = document.querySelector(`.contact-item[data-phone="${phoneNumber}"]`);
    
    if (contactItem && contactList) {
        // Move the contact item to the top of the list
        contactList.prepend(contactItem);
    }
}

// Function to move contact to the top based on phone number
function moveContactToTops(phoneNumber) {
    const contactList = document.querySelector('.contact-list');
    const contactItem = document.querySelector(`.contact-item[data-phone="${phoneNumber}"]`);
    
    if (contactItem && contactList) {
        // Move the contact item to the top of the list
        contactList.prepend(contactItem); 
    }
}

// Load messages for a specific contact
function loadMessages(phoneNumber) {
    axios.get(`/messages/${phoneNumber}`)
        .then(response => {
            chatBox.innerHTML = '';
            response.data.forEach(msg => {
                appendMessage(msg, msg.from === emp_id);
            });

            // Set lastMessageTime to the timestamp of the most recent message
            if (response.data.length > 0) {
                lastMessageTime = response.data[response.data.length - 1].timestamp; // Assuming 'timestamp' is in the message data
            }

            // Reset the unread count when the contact is opened
            const contactItem = document.querySelector(`.contact-item[data-phone="${phoneNumber}"]`);
            const unreadBadge = contactItem.querySelector('.unread-count');
            if (unreadBadge) {
                unreadBadge.remove(); // Remove the badge when chat is opened
            }
        })
        .catch(error => console.error("Error loading messages!", error));
}

    // Update contact info when a contact is selected
    function updateContactInfo(phoneNumber) {
        contactInfo.innerHTML = `<img src="https://via.placeholder.com/50" alt=""> ${phoneNumber}`;
    }

    // Scroll to the bottom of the chat box
    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // Restore contact order from localStorage
    document.addEventListener('DOMContentLoaded', function () {
    const savedOrder = JSON.parse(localStorage.getItem('contactOrder'));

    if (savedOrder) {
        savedOrder.forEach(phoneNumber => {
            const contact = document.querySelector(`.contact-item[data-phone="${phoneNumber}"]`);
            if (contact) {
                contactList.appendChild(contact); // Append in the saved order
            }
        });
    }
      
    });

    // Optimize contact selection with event delegation
contactList.addEventListener('click', function (e) {
    const contact = e.target.closest('.contact-item');
    if (contact) {
        const phoneNumber = contact.getAttribute('data-phone');
        localStorage.setItem('lastActiveChat', phoneNumber);
        currentContact = phoneNumber;
        updateContactInfo(currentContact);
        loadMessages(currentContact);
        subscribeToChannel(currentContact);

        // Reset the unread count
        const unreadCountElement = contact.querySelector('.unread-count');
        if (unreadCountElement) {
            unreadCountElement.textContent = 0;
            unreadCountElement.style.display = 'none'; // Hide unread count if it's zero
            contact.classList.remove('has-unread');
        }
    }
});

    // Send a message when the form is submitted
    messageForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const message = messageInput.value.trim();

        if (message && currentContact) {
            axios.post('/send-message', { from: emp_id, to: currentContact, message: message })
                .then(response => {
                    appendMessage(response.data, true);
                    messageInput.value = '';
                    moveContactToTop(currentContact);
                })
                .catch(error => console.error("Error sending the message!", error));
        } else {
            alert('Please select a contact or enter a message.');
        }
    });

    setInterval(() => {
    if (currentContact) {
        axios.get(`/messages/${currentContact}`)
            .then(response => {
                const messages = response.data;

                if (messages.length > 0) {
                    // Get the most recent message
                    const latestMessage = messages[messages.length - 1];
                    const latestMessageTime = latestMessage.timestamp;

                    // Append new messages to the chat
                    messages.forEach(msg => {
                        appendMessage(msg, msg.from === emp_id);
                    });

                    // Check if the most recent message is new by comparing timestamps
                    if (latestMessageTime > lastMessageTime) {
                        // Update the last message timestamp
                        lastMessageTime = latestMessageTime;

                        // Move the contact to the top (based on the phone number)
                        moveContactToTop(currentContact);


                        // Optionally, add an unread count badge for the new message
                        // const contactItem = document.querySelector(`.contact-item[data-phone="${currentContact}"]`);
                        // const unreadCountElement = contactItem.querySelector('.unread-count');
                        // if (!unreadCountElement) {
                        //     const unreadBadge = document.createElement('span');
                        //     unreadBadge.classList.add('unread-count');
                        //     unreadBadge.textContent = '1'; // Adjust as needed for the number of new messages
                        //     contactItem.appendChild(unreadBadge);
                        // }
                    }
                }
                
            })
            .catch(error => console.error("Error fetching new messages!", error));
    }
}, 5000);
});


function markAsUnread(phoneNumber) {
    const contactItem = document.querySelector(`.contact-item[data-phone="${phoneNumber}"]`);
    if (contactItem) {
        const unreadCountElement = contactItem.querySelector('.unread-count');
        if (unreadCountElement) {
            let unreadCount = parseInt(unreadCountElement.textContent) || 0;
            unreadCountElement.textContent = unreadCount + 1;
            contactItem.classList.add('has-unread');  // Optional: Add class to highlight contact with unread messages
        }
    }
}

function updateUnreadCount(contactPhone) {
    const contactItem = document.querySelector(`.contact-item[data-phone="${contactPhone}"]`);
    const unreadBadge = contactItem.querySelector('.unread-count');
    
    if (unreadBadge) {
        // Increment the unread count if it exists
        unreadBadge.textContent = parseInt(unreadBadge.textContent) + 1;
    } else {
        // Create a new unread count badge
        const badge = document.createElement('span');
        badge.classList.add('badge', 'bg-danger', 'unread-count');
        badge.textContent = '1';
        contactItem.appendChild(badge);
    }
}


    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const chatBox = document.getElementById('chat-box');
    const contactsList = document.getElementById('contacts');

    const searchMessages = (query) => {
        const messages = chatBox.querySelectorAll('.message');
        messages.forEach((message) => {
            if (message.textContent.toLowerCase().includes(query.toLowerCase())) {
                message.style.display = 'block';
            } else {
                message.style.display = 'none';
            }
        });
    };

    const searchContacts = (query) => {
        const contacts = contactsList.querySelectorAll('.contact-item');
        contacts.forEach((contact) => {
            if (contact.textContent.toLowerCase().includes(query.toLowerCase())) {
                contact.style.display = 'flex';
            } else {
                contact.style.display = 'none';
            }
        });
    };
    
    searchInput.addEventListener('input', (event) => {
        const query = event.target.value.trim();
        if (query) {
            searchMessages(query); 
            searchContacts(query); 
        } else {
            chatBox.querySelectorAll('.message').forEach((message) => (message.style.display = 'block'));
            contactsList.querySelectorAll('.contact-item').forEach((contact) => (contact.style.display = 'flex'));
        }
    });
});

</script>
</body>
</html>
