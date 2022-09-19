<template>
    <div class="feed">
        <div v-if="contact">
            <div :class="`message ${message.to === contact.id ? 'sent' : 'received'} other-message float-right`"
                 v-for="message in messages" :key="message.id" v-if="messages.length > 0">
                <div class="text alert alert-primary" v-if="message.to === contact.id">
                    {{ message.text }}
                </div>
                <div class="text alert alert-secondary" v-else>
                    {{ message.text }}
                </div>
            </div>
            <div v-else>
                <div class="text alert alert-secondary">No messages yet</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        contact: {
            type: Object,
        },
        messages: {
            type: Array,
            require: true,
        }
    },
    name: "MessagesFeed"
}
</script>

<style scoped>
.feed {
    height: 60vh;
    max-height: 60vh;
    overflow: auto;
}

/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #ffab2f;
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #ff3636;
}

.message {
    width: 80%;
}
</style>
