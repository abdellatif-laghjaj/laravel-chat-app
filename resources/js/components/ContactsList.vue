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
                        <span class="contact-name">{{ contact.name }}</span>
                        <span class="contact-email">{{ contact.email }}</span>
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
            selected: 0,
        }
    },
    methods: {
        selectContact(index, contact) {
            this.selected = index;
            this.$emit('selected', contact);
        }
    }
}
</script>

<style lang="scss" scoped>
$contact_image_width: 50px;

.c-list{
    max-height: 60vh;
    overflow-y: scroll;
}

.contact-name {
    font-weight: bold;
    font-size: 18px;
}

.contact-image {
    width: $contact_image_width;
}

.card-header{
    font-weight: bold;
    font-size: 18px;
}
</style>
