<template>
    <admin-layout>
        <!-- breadcrumb items -->
        <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link
                            :href="route('dashboard')"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </Link>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <div class= "text-gray-700 ml-1 md:ml-2 text-sm font-medium">
                                <Link
                                    :href="route('admin.roles.index')"
                                >
                                    Roles
                                </Link>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <div class= "text-gray-700 ml-1 md:ml-2 text-sm font-medium">
                                <Link
                                    :href="route('admin.roles.create')"
                                >
                                    Create
                                </Link>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- breadcrumb header -->
            <div class="text-3xl font-bold mt-2 mb-2">
                Create Role
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Role
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            This information will be displayed publicly so be careful what you share.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                <form @submit.prevent="storeData">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-3">
                                    <label for="initial" class="block text-sm font-medium text-gray-700">Role name</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        v-model="form.name"
                                        autofocus
                                    />
                                    <jet-input-error :message="form.errors.name" class="mt-2" />
                                </div>
                                <div class="col-span-12">
                                    <label for="initial" class="block text-sm font-medium text-gray-700">Permissions</label>
                                    <div v-for="permission in permissions" class="flex items-center mr-4 mb-2">
                                        <input :id="'permission-' + permission.id" :value="permission.name" v-model="form.permissions" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                        <label :for="'permission-' + permission.id" class="ml-2 text-sm leading-5 font-medium text-gray-700">{{ permission.name }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <jet-button
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Save
                            </jet-button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import JetButton from '@/JetStream/Button.vue';
import JetInput from '@/JetStream/Input.vue';
import JetInputError from '@/JetStream/InputError.vue'
import JetLabel from '@/JetStream/Label.vue'
import JetActionMessage from '@/JetStream/ActionMessage.vue';
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout";

export default {
    created () {
        document.title = "Create Role";
    },
    components: {
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        Link,
        AdminLayout
    },
    props: {
        permissions: Array,
    },
    data() {
        return {
            sending: false,
            form: this.$inertia.form({
                name: null,
                permissions: []
            }),
        }
    },
    methods: {
        storeData() {
            this.form.post(this.route('admin.roles.store'), {
                errorBag: 'storeData',
                preserveScroll: true,
            })
        }
    }

}
</script>
