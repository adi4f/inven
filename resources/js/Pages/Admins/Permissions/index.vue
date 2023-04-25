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
                                    :href="route('admin.permissions.index')"
                                >
                                    permissions
                                </Link>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- breadcrumb header -->
            <div class="text-3xl font-bold mt-2 mb-2 print:hidden">
                permissions
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
                    :href="route('admin.permissions.create')"
                >
                    Create
                </Link>
            </jet-button>
        </div>

        <!-- data list -->
        <div class="flex flex-col">
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
                                            <span>permission</span
                                            >
                                            <sort-indicator
                                                field="name"
                                                :sort_by="form.sort_by"
                                                :sort_dir="form.sort_dir"
                                            />
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell table-header">Roles</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">#</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="(permission, index) in permissions.data" :key="index"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 uppercase">
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.permissions.edit',
                                                        permission.id
                                                    )
                                                "
                                            >
                                                {{ permission.name }}
                                            </Link>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden lg:table-cell">
                                        <div class="text-sm text-gray-900">
                                            <span v-for="role_has_permission in permission.role_has_permissions" v-bind:key="role_has_permission.roles.id">
                                                <!-- <span> -->
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
                                                    {{ role_has_permission.roles.name }}
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <span class="flex justify-end">
                                            <!-- delete data -->
                                            <div
                                                v-if="
                                                    permission.name !==
                                                    'admin'
                                                "
                                            >
                                                <button
                                                        @click="deleteData(permission)"
                                                        v-show="permission.id"
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
                                            <!-- edit data -->
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.permissions.edit',
                                                        permission.id
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

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div v-for="(permission, index) in permissions.data" :key="index">

        </div> -->

        <!-- pagination -->
        <div class="bg-white px-3 py-1 flex items-center justify-between border-t border-gray-200 sm:px-3">
            <!-- button -->
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="btn-pagination" :disabled="permissions.current_page <= 1"
                    @click.prevent="paginate(permissions.current_page - 1)"
                >
                    Previous
                </button>

                <button class="btn-pagination" :disabled="permissions.current_page >= permissions.last_page"
                    @click.prevent="paginate(permissions.current_page + 1)"
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
                            {{ permissions.from }}
                        </span>
                        to
                        <span class="font-medium">
                            {{ permissions.to }}
                        </span>
                        of
                        <span class="font-medium">
                            {{ permissions.total }}
                        </span>
                        result
                    </p>
                </div>

                <!-- menampilkan pagination -->
                <pagination
                    :current_page="current_page"
                    :total="permissions.total"
                    :per_page="permissions.per_page"
                    :last_page="permissions.last_page"
                    :from="permissions.from"
                    :to="permissions.to"
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

export default {
    created () {
        document.title = "Permissions";
    },
    components: {
        Link,
        AdminLayout,
        JetButton,
        Pagination,
        Button,
        SortIndicator,
    },
    props: {
        filters: Object,
        permissions: Object,
    },
    data() {
        return{
            current_page: this.permissions.current_page,
            form: {
                search: this.filters.search,
                per_page: this.permissions.per_page,
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
                    this.route("admin.permissions.index"),
                    Object.keys(query).length ? query : { remember: "forget" },
                    { preserveState: true }
                );
            }, 300),
            deep: true,
        },
        permissions(permissions) {
            this.current_page = permissions.current_page;
        }
    },
    methods: {
        deleteData(data) {
            if (!confirm("Are you sure want to delete this?")) return;
            this.formDelete.post(this.route("admin.permissions.destroy", data.id));
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
