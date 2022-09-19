<template>
    <div class="contacts-list">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white gap-5">
                <span>Contacts</span>
                <span class="badge badge-primary text-white" data-bs-toggle="collapse"
                      data-bs-target="#collapseExample">
                    <div style="cursor: pointer;" v-if="is_collapsed">
                        <box-icon type='solid' name='up-arrow' color="#fff" @click="toggleCollapse"></box-icon>
                    </div>
                    <div style="cursor: pointer;" v-else>
                        <box-icon name='down-arrow' type='solid' color="#fff" @click="toggleCollapse"></box-icon>
                    </div>
                </span>
            </div>
            <div class="card-body c-list collapse-horizontal" id="collapseExample">
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
import 'boxicons'

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
            is_collapsed: false,
        }
    },
    methods: {
        selectContact(index, contact) {
            this.selected = index;
            this.$emit('selected', contact);
        },
        makeTextShort(text, length) {
            return text.length > this.max_text_length ? text.substring(0, length) + '...' : text;
        },
        toggleCollapse() {
            this.is_collapsed = !this.is_collapsed;
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

    @media screen and (max-width: 1016px) {
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
