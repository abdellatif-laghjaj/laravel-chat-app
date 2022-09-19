<template>
    <div class="feed">
        <div v-if="contact">
            <div
                :class="`message alert ${message.to === contact.id ? 'float-end alert-success' : 'float-start alert-warning'} float-right`"
                v-for="message in messages" :key="message.id" v-if="messages.length > 0">

                <div class="message-sender mb-2">
                    <span class="badge rounded-pill text-bg-primary" v-if="message.to === contact.id">
                        You
                    </span>
                    <span class="badge rounded-pill text-bg-danger" v-else>
                        {{ contact.name }}
                     </span>
                </div>

                {{ message.text }}
            </div>
            <div v-else>
                <div class="text alert alert-secondary">No messages yet</div>
            </div>
        </div>
        <div class="h-100 d-flex justify-content-center align-items-center" v-else>
            <div class="text alert alert-danger">Select a contact to start chatting</div>
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

<style lang="scss" scoped>
.feed {
    height: 60vh;
    max-height: 60vh;
    overflow: auto;

    .message {
        position: relative;

    }
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
