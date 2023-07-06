import './bootstrap';

import { createApp } from 'vue';
import PostsComponent from "./components/PostsComponent.vue";

createApp(PostsComponent).mount('#app')


// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

