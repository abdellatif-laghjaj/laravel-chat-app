<template>
    <div class="chat-app">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
        <Conversation :contact="selectedContact" :messages="messages"/>
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
        }
    },
    mounted() {
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
</style>
