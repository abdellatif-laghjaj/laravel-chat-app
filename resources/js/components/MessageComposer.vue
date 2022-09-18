<template>
    <div class="composer input-group mb-3">
        <textarea type="text" class="form-control" placeholder="Type your message here..." v-model="message"
                  @keydown.enter="send" rows="1"></textarea>
        <button class="btn btn-primary d-flex align-items-center justify-content-center" type="button" @click="send">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"/>
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    name: "MessageComposer",
    data() {
        return {
            message: '',
        }
    },
    methods: {
        send() {
            if (this.message === '') {
                return;
            }
            this.$emit('send', this.message);
            this.message = '';
        }
    }
}
</script>

<style scoped>
</style>
