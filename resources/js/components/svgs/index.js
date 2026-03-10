import github from "./Github.vue";
import linkedIn from "./LinkedIn.vue";
import darkMode from "./DarkMode.vue";
import lightMode from "./LightMode.vue";
import html from "./Html.vue";
import css from "./Css.vue";
import javascript from "./Javascript.vue";
import mysql from "./Mysql.vue";
import php from "./Php.vue";
import laravel from "./Laravel.vue";
import tailwind from "./Tailwind.vue";
import alpine from "./Apline.vue";
import livewire from "./Livewire.vue";
import vue from "./Vue.vue";
import bootstrap from "./Bootstrap.vue";
import git from "./Git.vue";
import spinner from "./Spinner.vue";
import checkmark from "./Checkmark.vue";


const techIcons = {
    html: {icon: html, name: 'HTML'},
    css: {icon: css, name: 'CSS'},
    javascript: {icon: javascript, name: 'JavaScript'},
    mysql: {icon: mysql, name: 'MySQL'},
    php: {icon: php, name: 'PHP'},
    laravel: {icon: laravel, name: 'Laravel'},
    tailwind: {icon: tailwind, name: 'Tailwind'},
    vue: {icon: vue, name: 'Vue.js'},
    git: {icon: git, name: 'Git'},
    alpine: {icon: alpine, name: 'Alpine.js'},
    livewire: {icon: livewire, name: 'Livewire'},
    bootstrap: {icon: bootstrap, name: 'Bootstrap'},
};

export {
    github,
    linkedIn,
    darkMode,
    lightMode,
    techIcons,
    spinner,
    checkmark,
};
