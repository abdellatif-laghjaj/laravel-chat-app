<template>
    <div class="feed" ref="feed">
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

                <span>{{ message.text }}</span>
                <span class="message-time">
                    {{ timeAgo(message.created_at) }}
                </span>
            </div>
            <div class="d-flex justify-content-center align-items-center" v-else>
                <div class="text alert alert-danger">Select a contact to start chatting</div>
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
    name: "MessagesFeed",
    data() {
        return {
            MONTH_NAMES: [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ],
        }
    },
    methods: {
        scrollToBottom() {
            setTimeout(() => {
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            }, 50);
        },
        formatTime(time) {
            return moment(time).format('h:mm a');
        },
        getFormattedDate(date, prefomattedDate = false, hideYear = false) {
            const day = date.getDate();
            const month = this.MONTH_NAMES[date.getMonth()];
            const year = date.getFullYear();
            const hours = date.getHours();
            let minutes = date.getMinutes();

            if (minutes < 10) {
                // Adding leading zero to minutes
                minutes = `0${minutes}`;
            }

            if (prefomattedDate) {
                // Today at 10:20
                // Yesterday at 10:20
                return `${prefomattedDate} at ${hours}:${minutes}`;
            }

            if (hideYear) {
                // 10. January at 10:20
                return `${day}. ${month} at ${hours}:${minutes}`;
            }

            // 10. January 2017. at 10:20
            return `${day}. ${month} ${year}. at ${hours}:${minutes}`;
        },
        timeAgo(dateParam) {
            if (!dateParam) {
                return null;
            }

            const date = typeof dateParam === 'object' ? dateParam : new Date(dateParam);
            const DAY_IN_MS = 86400000; // 24 * 60 * 60 * 1000
            const today = new Date();
            const yesterday = new Date(today - DAY_IN_MS);
            const seconds = Math.round((today - date) / 1000);
            const minutes = Math.round(seconds / 60);
            const isToday = today.toDateString() === date.toDateString();
            const isYesterday = yesterday.toDateString() === date.toDateString();
            const isThisYear = today.getFullYear() === date.getFullYear();


            if (seconds < 5) {
                return 'now';
            } else if (seconds < 60) {
                return `${seconds} seconds ago`;
            } else if (seconds < 90) {
                return 'about a minute ago';
            } else if (minutes < 60) {
                return `${minutes} minutes ago`;
            } else if (isToday) {
                return getFormattedDate(date, 'Today'); // Today at 10:20
            } else if (isYesterday) {
                return getFormattedDate(date, 'Yesterday'); // Yesterday at 10:20
            } else if (isThisYear) {
                return getFormattedDate(date, false, true); // 10. January at 10:20
            }

            return getFormattedDate(date); // 10. January 2017. at 10:20
        },

    },
    watch: {
        contact: function (old) {
            this.scrollToBottom();
        },
        messages: function (old) {
            this.scrollToBottom();
        },
    },
}
</script>

<style lang="scss" scoped>
.feed {
    height: 60vh;
    max-height: 60vh;
    overflow: auto;
}

.message-time {
    font-size: 0.8rem;
    color: #232121;
    display: block;
    text-align: right;
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
