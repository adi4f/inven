<template>
    <admin-layout>
         <!-- breadcrumb items -->
        <div class="print:hidden">
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
                                    :href="route('admin.users.index')"
                                >
                                    Users
                                </Link>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- breadcrumb header -->
            <div class="text-3xl font-bold mt-2 mb-2 print:hidden">
                Users
            </div>
        </div>

        <!-- search, select option paginate & button create -->
        <div class="flex flex-row flex-wrap space-x-0 lg:space-x-2 mb-2 print:hidden">
            <div class="w-full lg:w-64 mb-2 lg:mb-0">
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="text-gray-500 sm:text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- textbox search -->
                    <input type="text"
                        class="
                            focus:ring-indigo-500
                            focus:border-indigo-500
                            block w-full pl-7 pr-12
                            sm:text-sm border-gray-300 rounded-md
                        "
                        placeholder="Search"
                        v-model="form.search"
                    />

                    <!-- select option paginate -->
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <select class="
                            focus:ring-indigo-500
                            focus:border-indigo-500
                            h-full py-0 pl-2 pr-7 border-transparent
                            bg-transparent
                            text-gray-500
                            sm: text-sm rounded-md
                        "
                        v-model="form.per_page"
                        >
                            <option>5</option>
                            <option>10</option>
                            <option>50</option>
                            <option>100</option>
                            <option>500</option>
                            <option>1000</option>
                        </select>
                    </div>
                </div>
            </div>

            <jet-button class="w-full lg:w-auto text-center mb-2 lg:mb-0">
                <Link
                    :href="route('admin.users.create')"
                >
                    Create
                </Link>
            </jet-button>
        </div>

         <!-- data list v1-->
        <!-- <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-2 lg:-mx-2">
                <div class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-2">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" @click="sort('name')">
                                        <div
                                            class="
                                                flex
                                                justify-between
                                            "
                                        >
                                            <span>Name</span
                                            >
                                            <sort-indicator
                                                field="name"
                                                :sort_by="form.sort_by"
                                                :sort_dir="form.sort_dir"
                                            />
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell table-header">Role</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">#</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="(user, index) in users.data" :key="index"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 uppercase">
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.users.edit',
                                                        user.id
                                                    )
                                                "
                                            >
                                                {{ user.name }}
                                            </Link>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden lg:table-cell">
                                        <div class="text-sm text-gray-900">
                                            <span v-for="role in user.roles" v-bind:key="role.id">
                                                
                                                <div
                                                    class="
                                                        uppercase
                                                        mr-2
                                                        px-2
                                                        inline-flex
                                                        text-xs
                                                        leading-5
                                                        rounded-full
                                                        bg-yellow-200
                                                    "
                                                >
                                                    {{ role.name }}
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <span class="flex justify-end">
                                            
                                            <div
                                                v-if="
                                                    user.name !==
                                                    'admin'
                                            ">
                                                <button
                                                        @click="deleteData(user)"
                                                        v-show="user.id"
                                                        class="
                                                            text-red-700
                                                            hover:text-red-900 mr-2 print:hidden
                                                        "
                                                        :class="{
                                                            'opacity-25':
                                                                form.processing,
                                                        }"
                                                        :disabled="form.processing"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.users.edit',
                                                        user.id
                                                    )
                                                " class = "print:hidden"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-blue-700 hover:text-blue-900 mx-1"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                                                    />
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </Link>
                                        </span>
                                    </td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- data list v2-->
        <div class="mx-auto font-mono mt-2">
            <div class="w-full mb-2 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-bold tracking-wide text-left text-black bg-gray-200 uppercase border-b border-gray-400">
                                <th class="px-3 py-1 table-header" @click="sort('name')">
                                    <div class="flex item-center justify-between mx-8">
                                        <span>data list</span>
                                        <sort-indicator field="name" :sort_by="form.sort_dir" :sort_dir="form.sort_dir" />
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="(user, index) in users.data" :key="index" class="text-gray-700">
                                <td class="px-3 py-1 border">
                                    <div class="bg-white">
                                        <div class="pt-2">
                                            <div class="max-w-2xl mx-auto pt-2 pb-2 px-2 sm:px-2 lg:max-w-7xl lg:pt-2 lg:pb-2 lg:px-2 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                                                <div class="lg:col-span-2 lg:border-gray-200 lg-pr-8">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full" :src="user.profile_photo_url" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ user.name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ user.email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-2 lg:mt-0 lg:row-span-3">
                                                    <p class="test-lg test-gray-900">Role(s)</p>
                                                    <div class="mt-1">
                                                        <div class="flex iteems-center">
                                                            <span v-for="role in user.roles" v-bind:key="role.id">
                                                                <div class="px-2 inline-fle text-xs leading-5 rounded-full bg-yellow-200 text-gray-800">
                                                                    {{ role.name }}
                                                                </div>

                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="mt-2 print:hidden">
                                                        <div class="flex justify-start">
                                                            <Link :href="route('admin.users.edit', user.id)">
                                                                <button type="submit" class="mr-1 mt-2 w-full bg-gray-900 border border-transparent rounded-md py-1 px-1 flex item-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                            </Link>
                                                            <div class="ml-2" v-if="user.name != 'Admin'">
                                                                    <button type="submit" class="mr-1 mt-2 w-full  bg-red-600 border border-transparent rounded-md py-1 px-1 flex item-center justify-center text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600" @click="deleteData(user)" v-show="user.id" :class="{
                                                                        'opacity-25': form.processing,
                                                                    }" :disabled="form.processing">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                        </svg>

                                                                        Delete
                                                                    </button>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>

                                                <div class="ml-0 lg:ml-6 py-2 lg:pt-2 lg-pb-2 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                                                    <div class="mt-2 ml-0  lg:ml-4">
                                                        <h2 class="ml-0  lg:ml-4 text-sm font-medium text-gray-900">
                                                            Created : {{ user.created_at }}, Modified : {{ user.updated_at }}
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- pagination -->
        <div class="bg-white px-3 py-1 flex items-center justify-between border-t border-gray-200 sm:px-3 print:hidden">
            <!-- button -->
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="btn-pagination" :disabled="users.current_page <= 1"
                    @click.prevent="paginate(users.current_page - 1)"
                >
                    Previous
                </button>

                <button class="btn-pagination" :disabled="users.current_page >= users.last_page"
                    @click.prevent="paginate(users.current_page + 1)"
                >
                    Next
                </button>
            </div>

            <!-- information -->
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm leading-5 text-gray-700">
                        Showing
                        <span class="font-medium">
                            {{ users.from }}
                        </span>
                        to
                        <span class="font-medium">
                            {{ users.to }}
                        </span>
                        of
                        <span class="font-medium">
                            {{ users.total }}
                        </span>
                        result
                    </p>
                </div>

                <!-- menampilkan pagination -->
                <pagination
                    :current_page="current_page"
                    :total="users.total"
                    :per_page="users.per_page"
                    :last_page="users.last_page"
                    :from="users.from"
                    :to="users.to"
                    @paginate="paginate"
                    :offset="4"
                >
                </pagination>
            </div>

        </div> 
    </admin-layout>
 </template>
 
 <script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from '@/Layouts/AdminLayout.vue';
import JetButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/Components/Pagination.vue";
import Button from "../../../Components/PrimaryButton.vue";
import SortIndicator from "@/Components/SortIndicator.vue";
import JetDangerButton from "@/Components/DangerButton.vue";

export default {
    created () {
        document.title = "Users";
    },
    components: {
        Link,
        AdminLayout,
        JetButton,
        Pagination,
        Button,
        SortIndicator,
        JetDangerButton,
    },
    props: {
        filters: Object,
        users: Object,
    },
    data() {
        return{
            current_page: this.users.current_page,
            form: {
                search: this.filters.search,
                per_page: this.users.per_page,
                page: this.filters.page,
                sort_by: this.filters.sort_by,
                sort_dir: this.filters.sort_dir ?? "asc",
            },
            formDelete: this.$inertia.form({
                _method: "DELETE",
            }),
        };
    },
    watch: {
        form: {
            handler: _.throttle(function () {
                let query = _.pickBy(this.form);
                this.$inertia.get(
                    this.route("admin.users.index"),
                    Object.keys(query).length ? query : { remember: "forget" },
                    { preserveState: true }
                );
            }, 300),
            deep: true,
        },
        users(users) {
            this.current_page = users.current_page;
        }
    },
    methods: {
        deleteData(data) {
            if (!confirm("Are you sure want to delete this?")) return;
            this.formDelete.post(this.route("admin.users.destroy", data.id));
        },
        reset() {
            this.form = _.mapValues(this.form, () => null);
        },
        paginate(page) {
            this.form.page = page;
        },
        sort(s) {
            if (s === this.form.sort_by) {
                this.form.sort_dir =
                    this.form.sort_dir === "asc" ? "desc" : "asc";
            }
            this.form.sort_by = s;
        },
    }
}
</script>
 
 
 