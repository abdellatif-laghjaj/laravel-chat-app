<template>
    <div class="contacts-list">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Contacts
            </div>
            <div class="card-body c-list">
                <div
                    :class="`contact alert m-3 d-flex align-items-center gap-3 ${index === selected ? 'alert-success border-4 border-success' : 'alert-dark'}`"
                    role="alert"
                    v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)">
                    <img :src="contact.profile_image" :alt="contact.name" class="rounded-circle contact-image">
                    <div class="contact-deatils d-flex flex-column">
                        <span class="contact-name">
                            {{
                                makeTextShort(contact.name, 20)
                            }}
                        </span>
                        <span class="contact-email">
                            {{ makeTextShort(contact.email, 20) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array,
            default: [],
        }
    },
    name: "ContactsList",
    data() {
        return {
            selected: null,
            max_text_length: 30,
        }
    },
    methods: {
        selectContact(index, contact) {
            this.selected = index;
            this.$emit('selected', contact);
        },
        makeTextShort(text, length) {
            return text.length > this.max_text_length ? text.substring(0, length) + '...' : text;
        }
    },
}
</script>

<style lang="scss" scoped>
$contact_image_width: 50px;

.c-list {
    height: 100%;
    max-height: 75vh;
    overflow-y: scroll;

    @media screen and (max-width: 1016px){
        max-height: 42vh;
    }
}

.contact {
    cursor: pointer;
}

.contact-name {
    font-weight: bold;
    font-size: 18px;
}

.contact-image {
    width: $contact_image_width;
}

.card-header {
    font-weight: bold;
    font-size: 18px;
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
</style>
