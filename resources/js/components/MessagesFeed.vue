<template>
    <div class="feed">
        <div v-if="contact">
            <div :class="`message ${message.to === contact.id ? 'sent' : 'received'} other-message float-right`"
                 v-for="message in messages" :key="message.id">
                <div class="text alert alert-primary">{{ message.text }}</div>
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

.message {
    width: 80%;
}
</style>
