<template>
    <div class="conversation">
        <div class="card">
            <div class="card-header">
                {{ contact ? contact.name : "Select a contact to start chatting" }}
            </div>
            <div class="card-body">
                <MessagesFeed :contact="contact" :messages="messages"/>
                <MessageComposer @send="sendMessage"/>
            </div>
        </div>
    </div>
</template>

<script>
import MessagesFeed from "./MessagesFeed.vue";
import MessageComposer from "./MessageComposer.vue";

export default {
    props: {
        contact: {
            type: Object,
            default: null,
        },
        messages: {
            type: Array,
            default: [],
        }
    },
    data() {
        return {}
    },
    methods: {
        sendMessage(text) {
            alert(text);
        }
    },
    components: {
        MessagesFeed,
        MessageComposer
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
