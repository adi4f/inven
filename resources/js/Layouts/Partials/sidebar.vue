<template>
    <aside class="flex flex-col w-64 h-screen p-2 bg-gray-800 print:hidden"
            v-if="openNav"
    >
        <!-- Logo -->
        <div class="flex flex-col items-center">
            <div class="felx items-center inline-flex">
            
                <!-- <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                </svg> -->
                <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="/storage/logo/logo.png" alt="logo">

                </div>

                <span class="ml-2 text-2xl font-mono font-bold text-gray-300">
                    IT
                </span> 
                <span class="text-2xl font-mono font-bold text-gray-400">
                    Hardware
                </span> 

            </div>

            <div class="mt-2 flex items-center">
                <span class="text-sm font-sans font-bold text-gray-200">
                    PT. Royal Abadi Sejahtera
                </span>
            </div>
        </div>
        <hr class="border-gray-600 mt-2">
        <div class="overflow-auto h-screen flex flex-col justify-between flex-1 mt-1">
            <nav>
                <!-- Dashboard -->
                <div class="nav-item mb-1" >
                    
                    <Link 
                        :href="route('dashboard')"
                        class="nav-item"
                        :class="
                            route().current('dashboard')
                            ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                            : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                        "
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                        </svg>

                        <span class="ml-2 font-medium">Dashboard</span>
                    </Link>
                </div>

                <!-- company -->
                <div class="nav-item mb-1 " v-if="can('company read')">
                
                    <Link 
                        :href="route('companys.index')"
                        class="nav-item"
                        :class="
                            route().current('companys.*')
                            ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                            : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                        "
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>


                            <span class="ml-2 font-medium">Company</span>
                    </Link>
                </div>
                <!-- Branch -->
                <div class="nav-item mb-1 " v-if="can('branch read')">
                
                <Link 
                    :href="route('branchs.index')"
                    class="nav-item"
                    :class="
                        route().current('branchs.*')
                        ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                        : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                    "
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>


                        <span class="ml-2 font-medium">Branch</span>
                </Link>
            </div>

                <!-- Admin -->
                <div v-if="can('admin')">
                    <div class="items-center mt-2 text-white mx-2 font-medium">
                        <span class="font-bold">Admins</span>
                    </div>
    
                    <!-- users -->
                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.users.index')" 
                            class="nav-item" 
                            :class="
                                route().current('admin.users.*')
                                    ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                    : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
    
    
                        <span class="ml-2 font-medium">Users</span>
                        </Link>
                    </div>
                    <!-- Roles -->
                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.roles.index')" 
                            class="nav-item" 
                            :class="
                                route().current('admin.roles.*')
                                    ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                    : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
    
    
                        <span class="ml-2 font-medium">Roles</span>
                        </Link>
                    </div>
                    
                    <!-- Permissions -->
                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.permissions.index')" 
                            class="nav-item" 
                            :class="
                                route().current('admin.permissions.*')
                                    ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                    : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                            </svg>
    
    
                            <span class="ml-2 font-medium">Permissions</span>
                        </link>
                    </div>

                </div>
                
            </nav>
        </div>
    </aside>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link,
    },
    props: ["openNav"],
    methods: {
        can(permission){
            if (this.$page.props.auth.user.is_admin) return true; 
            return this.$page.props.auth.user.permissions.includes(permission);
        }   
    }
}
</script>