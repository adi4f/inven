<template>
    <nav class="relative z-0 inlain-flex">
        <!-- Previous to first page -->
        <a href="#"
            v-if="current_page > 1" class="relative inline-flex items-center p-1 rounded bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-non focus:border-blu-300 focus:ring-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" arial-label="Previous" @click.prevent="change(0)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
            </svg>
        </a>

        <!-- Previous to page -1 Sebelumnya -->
        <a href="#"
            v-if="current_page > 1" class="relative inline-flex items-center p-1 rounded bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-non focus:border-blu-300 focus:ring-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" arial-label="Previous" @click.prevent="change(current_page -1)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

        </a>

        <!-- Information -->
        <a href="#"
            v-for="page in Pages" :key="page" class="relative inline-flex items-center px-3 py-1 text-sm leading-5 font-medium focus:z-10 focus:outline-non focus:border-blu-300 focus:ring-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 rounded" 
            :class="page == current_page ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:text-gray-500'"
            @click.stop="change(page)">
            {{ page }}
        </a>

        <!-- Previous to page +1 Selanjutnya -->
        <a href="#"
            v-if="current_page < last_page" class="relative inline-flex items-center p-1 rounded bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-non focus:border-blu-300 focus:ring-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" arial-label="Previous" @click.prevent="change(current_page +1)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>

        <!-- Previous to Last Page -->
        <a href="#"
            v-if="current_page < last_page" class="relative inline-flex items-center p-1 rounded bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-non focus:border-blu-300 focus:ring-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" arial-label="Previous" @click.prevent="change(last_page)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
            </svg>
        </a>
    </nav>
</template>

<script>
export default {
    props: {
        current_page: {
            type: Number,
        },
        total: {
            type: Number,
        },
        per_page: {
            
        },
        last_page: {
            type: Number,
        },
        from: {
            type: Number,
        },
        to: {
            type: Number,
        },
        offset: {
            type: Number,
            default: 4
        },
        disabled: {
            type: Boolean,
            default: false
        },
    }
}
</script>