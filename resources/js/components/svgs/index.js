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
import alpine from "./Alpine.vue";
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
import arrowRight from "./ArrowRight.vue";
import arrowDown from "./ArrowDown.vue";
import docker from "./Docker.vue";
import prometheus from "./Prometheus.vue";
import grafana from "./Grafana.vue";
import python from "./Python.vue";
import powershell from "./Powershell.vue";


const techIcons = {
    html: {icon: html, name: 'HTML', type: 'frontend'},
    css: {icon: css, name: 'CSS', type: 'frontend'},
    javascript: {icon: javascript, name: 'JavaScript', type: 'frontend'},
    mysql: {icon: mysql, name: 'MySQL', type: 'backend'},
    php: {icon: php, name: 'PHP', type: 'backend'},
    laravel: {icon: laravel, name: 'Laravel', type: 'backend'},
    tailwind: {icon: tailwind, name: 'Tailwind', type: 'frontend'},
    vue: {icon: vue, name: 'Vue.js', type: 'frontend'},
    git: {icon: git, name: 'Git', type: 'tool'},
    alpine: {icon: alpine, name: 'Alpine.js', type: 'frontend'},
    livewire: {icon: livewire, name: 'Livewire', type: 'backend'},
    bootstrap: {icon: bootstrap, name: 'Bootstrap', type: 'frontend'},
    docker: {icon: docker, name: 'Docker', type: 'tool'},
    prometheus: {icon: prometheus, name: 'Prometheus', type: 'tool', knowledge: false},
    grafana: {icon: grafana, name: 'Grafana', type: 'tool', knowledge: false},
    python: {icon: python, name: 'Python', type: 'backend', knowledge: false},
    powershell: {icon: powershell, name: 'Powershell', type: 'backend'},
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
    arrowRight,
    arrowDown,
};
