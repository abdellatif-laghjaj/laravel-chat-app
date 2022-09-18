<template>
    <div class="contacts-list">
        <div class="card">
            <div class="card-header">
                Contacts
            </div>
            <div class="card-body">
                <div class="contact alert alert-primary m-3 d-flex align-items-center gap-3" role="alert"
                     v-for="contact in contacts" :key="contact.id">
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
    name: "ContactsList"
}
</script>

<style lang="scss" scoped>
$contact_image_width: 50px;
.contact-name {
    font-weight: bold;
    font-size: 18px;
}

.contact-image {
    width: $contact_image_width;
}
</style>
