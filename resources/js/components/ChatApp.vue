<template>
    <div class="chat-app">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
    </div>
</template>

<script>
import Conversation from "./Conversation.vue";
import ContactsList from "./ContactsList.vue";

export default {
    props: {
        user: {
            Object,
            require: true
        }
    },
    name: "ChatApp",
    data() {
        return {
            selectedContact: null,
            contacts: [],
            messages: [],
        }
    },
    methods: {
        startConversationWith(contact) {
            axios.get(`/conversation/${contact.id}`)
                .then(response => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
        },
        saveNewMessage(text) {
            this.messages.push(text);
        },
        handleIncoming(message) {
            if (this.selectedContact && message.from === this.selectedContact.id) {
                this.messages.push(message);
                return;
            }

            //unread messages
            alert(message.text);
        },
    },
    mounted() {
        Echo.private(`messages.${this.user.id}`)
            .listen('NewMessage', (e) => {
                this.handleIncoming(e.message);
            })

        axios.get('/contacts')
            .then(response => {
                this.contacts = response.data;
            });
    },
    components: {
        Conversation,
        ContactsList
    }
}
</script>

<style lang="scss" scoped>

.chat-app {
    display: flex;
    gap: 18px;
    flex-direction: row;
}

@media screen and (max-width: 1016px) {
    .chat-app {
        flex-direction: column;
        gap: 18px;
    }
}
</style>
