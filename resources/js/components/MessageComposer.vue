<template>
    <div class="composer input-group mb-3">
        <textarea type="text" class="form-control" placeholder="Type your message here..." v-model="message"
                  @keydown.enter="send" rows="1" style="resize: none"></textarea>
        <button class="btn btn-primary d-flex align-items-center justify-content-center" type="button" @click="send">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="32" height="32"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="10" y1="14" x2="21" y2="3"/>
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5"/>
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
.composer{
    margin-top: 12px;
}
</style>
