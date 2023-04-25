

<template>
   <admin-layout>
        Dashboard
   </admin-layout>
</template>

<script>
    import { useForm } from '@inertiajs/inertia-vue3';
    import { Link } from '@inertiajs/inertia-vue3';
    import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
    created() {
        document.title = "Dashboard";
    },
    components: {
        AdminLayout,
        Link
    },
}
</script>


