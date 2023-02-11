<template>
    <div class="w-full bg-gray-700 drop-shadow-xl print:hidden">
        <div class="max-w-screen-2xl mx-auto">
            <div class="grid grid-cols-2 py-1 px-2">
                <div class="col-start-1 flex-flex-wrap content-center">
                    <button type="button" 
                        class="text-gray-200 hover:text-gray-500"
                        arial-label = "toggle menu"
                        @click="$emit('toggleNav')"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="col-end-12">
                    <div>
                        <AccountDropdown></AccountDropdown>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AccountDropdown from "@/Layouts/Partials/AccountDropdown.vue";
// import NotificationsDropdown from "./NotificationsDropdown.vue";

export default {
    components: {
        AccountDropdown,
        //NotificationsDropdown
    },
}
</script>