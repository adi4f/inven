

<template>
    <admin-layout>
         Edit Branch
    </admin-layout>
 </template>
 
 <script>
     import { useForm } from '@inertiajs/inertia-vue3';
     import { Link } from '@inertiajs/inertia-vue3';
     import AdminLayout from '@/Layouts/AdminLayout.vue';
 
 export default {
     created() {
         document.title = "Branch";
     },
     components: {
         AdminLayout,
         Link
     },
 }
 </script>
 
 
 