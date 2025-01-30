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
            <span class="me-2"><b>Nadun Silva</b></span>
            <img src="{{ asset('assets/icon_green.jpeg') }}" alt="User Image" class="rounded-circle">
        </div>
    </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="option-sidebar">
                <div class="icon-option">
                    <i class="bi bi-chat-dots"></i>
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
                    <a class="dropdown-item" href="#">Hello! 👋 This is [Agent Name].I’m here to assist you with any questions or concerns you may have.Let me know how I can help you today!</a>
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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const emp_id = '{{ $emp_id }}' 
                const contacts = @json($contacts);
        
                console.log(emp_id);
                console.log(contacts);
        
                const chatBox = document.getElementById('chat-box');
                const messageForm = document.getElementById('chat-form');
                const messageInput = document.getElementById('message');
                const predefinedMessageBtn = document.getElementById('predefined-message-btn');
                const predefinedMessageDropdown = document.getElementById('predefined-message-dropdown');
                const contactInfo = document.getElementById('contact-info');
                let currentContact = '';
                
        
                // Toggle dropdown when predefined message button is clicked
                predefinedMessageBtn.addEventListener('click', () => {
                    predefinedMessageDropdown.classList.toggle('show');
                });
    
                // Select a predefined message from the dropdown
                predefinedMessageDropdown.addEventListener('click', (e) => {
                    if (e.target && e.target.classList.contains('dropdown-item')) {
                        messageInput.value = e.target.textContent;
                        predefinedMessageDropdown.classList.remove('show');
                    }
                });
    
                // Select contact and update UI
                document.querySelectorAll('.contact-item').forEach(contact => {
                    contact.addEventListener('click', function() {
                        currentContact = contact.getAttribute('data-phone');
                        updateContactInfo(currentContact);
                        loadMessages(currentContact);
                    });
                });
        
                // Load messages for a specific contact
                function loadMessages(phoneNumber) {
                    axios.get(`/messages/${phoneNumber}`)
                        .then(response => {
                            chatBox.innerHTML = '';
        
                            response.data.forEach(msg => {
                                const messageDiv = document.createElement('div');
                                messageDiv.className = 'message ' + (msg.from === emp_id ? 'sent' : 'received');
                                messageDiv.innerHTML = ` 
                                    <div>${msg.message}</div>
                                    <small class="text-muted" style="display: block; margin-top: 5px; font-size: 0.8rem;">
                                        ${msg.formatted_time}
                                    </small>
                                `;
                                chatBox.appendChild(messageDiv);
                            });
        
                            scrollToBottom();
                        })
                        .catch(error => {
                            console.error("Error loading messages!", error);
                        });
                }
        
    
                function scrollToBottom() {
                    chatBox.scrollTop = chatBox.scrollHeight;
                }
        
               
                function updateContactInfo(phoneNumber) {
                    contactInfo.innerHTML = `<img src="https://via.placeholder.com/50" alt="">${phoneNumber}`;
                }
        
                // Send the message when the form is submitted
                messageForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const message = messageInput.value.trim();
        
                    if (message && currentContact) {
                        axios.post('/send-message', {
                            from: emp_id,
                            to: currentContact,
                            message: message
                        }).then(() => {
                            const messageDiv = document.createElement('div');
                            messageDiv.className = 'message sent';
                            const timestamp = 'Just now';
                            messageDiv.innerHTML = `
                                <span>${message}</span>
                                <small>${timestamp}</small>
                            `;
                            chatBox.appendChild(messageDiv);
        
                            scrollToBottom();
        
                            messageInput.value = '';
                        }).catch(error => {
                            console.error("Error sending the message!", error);
                        });
                    } else {
                        alert('Please select a contact and enter a message.');
                    }
                });
        
                // Initial load: if there is a contact, load its messages
                if (document.querySelector('.contact-item')) {
                    const firstContact = document.querySelector('.contact-item');
                    currentContact = firstContact.getAttribute('data-phone');
                    updateContactInfo(currentContact);
                    loadMessages(currentContact);
                }
            });
            
     
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
