<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages"/>
        <ContactsList :contacts="contacts"/>
    </div>
</template>

<script>
import Conversation from "./Conversation.vue";
import ContactsList from "./ContactsList.vue";

export default {
    name: "ChatApp",
    data() {
        return {
            selectedContact: null,
            contacts: [],
            messages: [],
        }
    },
    mounted() {
        axios.get('/contacts')
            .then(response => {
                this.contacts = response.data;
                console.log(response.data);
            });
    },
    components: {
        Conversation,
        ContactsList
    }
}
</script>

<style scoped>

</style>
