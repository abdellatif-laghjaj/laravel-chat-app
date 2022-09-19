<template>
    <div class="composer input-group mb-3">
        <textarea type="text" class="form-control" placeholder="Type your message here..." v-model="message"
                  @keydown.enter="send" rows="1" style="resize: none"></textarea>
        <button class="btn btn-primary d-flex align-items-center justify-content-center" type="button" @click="send">
            <box-icon type='solid' name='send' color="#fff"></box-icon>
        </button>
    </div>
</template>

<script>
import 'boxicons'

export default {
    name: "MessageComposer",
    data() {
        return {
            message: '',
        }
    },
    methods: {
        send(e) {
            e.preventDefault();
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
.composer {
    margin-top: 12px;
}
</style>
