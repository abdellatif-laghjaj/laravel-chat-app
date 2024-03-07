import './bootstrap';
import {createApp} from 'vue';

const app = createApp({});

import ExampleComponent from './components/Conversation.vue';
import ChatApp from "./components/ChatApp.vue";

app.component('example-component', ExampleComponent);
app.component('chat-app', ChatApp);

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });


app.mount('#app');
