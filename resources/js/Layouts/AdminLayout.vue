<template>
    <div class="flex flex-col h-screen">
        <div class="flex flex-1 overflow-hidden">
            
                <SideBar :openNav="navOpen"/> 
            
            <div class="flex flex-1 flex-col">
                <div class="flex bg-gray-500">
                    <NavBar @toggleNav="navOpen = !navOpen" />
                </div>

                <div class="overflow-y-auto p-2">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import NavBar from '@/Layouts/Partials/navbar.vue';
    import SideBar from '@/Layouts/Partials/sidebar.vue';
    import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        NavBar,
        SideBar,
        Link
    },
    data() {
        return{
            navOpen:
                localStorage.getItem("navOpen") === "false"
                ? false
                :localStorage.getItem("navOpen") === "true"
                ? true
                : "",
        };
        
    },
    watch: {
            navOpen(navOpen) {
                localStorage.navOpen = navOpen;
            },
    },
    computed: {
        path() {
            return window.location.pathname;
        }
    }
}

</script>

