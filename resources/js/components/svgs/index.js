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
import school from "./School.vue";
import work from "./Work.vue";
import house from "./House.vue";
import phone from "./Phone.vue";
import mail from "./Mail.vue";
import car from "./Car.vue";
import linked from "./Link.vue";


const techIcons = {
    html: {icon: html, name: 'HTML', color: 'bg-orange-300', type: 'frontend'},
    css: {icon: css, name: 'CSS', color: 'bg-blue-300', type: 'frontend'},
    javascript: {icon: javascript, name: 'JavaScript', color: 'bg-yellow-300', type: 'frontend'},
    mysql: {icon: mysql, name: 'MySQL', color: 'bg-green-300', type: 'backend'},
    php: {icon: php, name: 'PHP', color: 'bg-violet-300', type: 'backend'},
    laravel: {icon: laravel, name: 'Laravel', color: 'bg-red-300', type: 'backend'},
    tailwind: {icon: tailwind, name: 'Tailwind', color: 'bg-sky-300', type: 'frontend'},
    vue: {icon: vue, name: 'Vue.js', color: 'bg-green-300', type: 'frontend'},
    git: {icon: git, name: 'Git', color: 'bg-orange-300', type: 'tool'},
    alpine: {icon: alpine, name: 'Alpine.js', color: 'bg-gray-300', type: 'frontend'},
    livewire: {icon: livewire, name: 'Livewire', color: 'bg-pink-300', type: 'backend'},
    bootstrap: {icon: bootstrap, name: 'Bootstrap', color: 'bg-purple-300', type: 'frontend'},
};

export {
    github,
    linkedIn,
    darkMode,
    lightMode,
    techIcons,
    spinner,
    checkmark,
    school,
    work,
    house,
    phone,
    mail,
    car,
    linked,
};
