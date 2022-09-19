<template>
    <div id="emojyPicker"></div>
    <div class="composer input-group mb-3">
        <button class="btn border d-flex justify-content-center align-items-center" @click="pickEmojy">
            <box-icon name='smile'></box-icon>
        </button>
        <textarea type="text" class="form-control" placeholder="Type your message here..." v-model="message"
                  @keydown.enter="send" rows="1" style="resize: none"></textarea>
        <button class="btn btn-primary d-flex align-items-center justify-content-center" type="button" @click="send">
            <box-icon type='solid' name='send' color="#fff"></box-icon>
        </button>
    </div>
</template>

<script>
import 'boxicons';
import {createPicker} from 'picmo';

export default {
    name: "MessageComposer",
    data() {
        return {
            message: '',
            toggle_emojy: false,
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
        },
        pickEmojy() {
            const rootElement = document.querySelector('#emojyPicker');
            if (this.toggle_emojy) {
                rootElement.innerHTML = '';
                this.toggle_emojy = false;
                return;
            }
            const picker = createPicker({rootElement});
            this.toggle_emojy = true;

            // The picker emits an event when an emoji is selected. Do with it as you will!
            picker.addEventListener('emoji:select', event => {
                this.message += event.emoji;
            });
        }
    },
}
</script>

<style scoped>
.composer {
    margin-top: 12px;
}
</style>
