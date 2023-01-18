<template>
    <Admin-layout>
       <!-- Breadcrumb items -->
        <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>

                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <div class="text-gray-700 ml-1 md:ml-2 text-sm ont-medium">
                                Companys
                            </div>                            
                        </div>                        
                    </li>
                </ol>
            </nav>

            <!-- Breadcrumb Header -->
            <div class="text-2xl font-bold mt-2 mb-2">Companys</div>
        </div>

        <!-- search, select option paginate & button create -->
        <div class="flex flex-row flex-wrap space-x-0 lg:space-x-2 mb-2">
            <div class="w-full lg:w-64 mb-2 lg:mb-0">
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="text-grey-500 sm:text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
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
                    />

                    <!-- select option paginate -->
                    <div class="absolute inset-y-0 right-0 flex item-center">
                        <select class="
                            focus:ring-indigo-500
                            focus:border-indigo-500
                            h-full py-0 pl-2 pr-7 border-transparent bg-transparent
                            text-gray-500
                            sm:text-sm rounded-md
                        ">
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
                Create
            </jet-button>
        </div>

        <!-- Data List Companys -->
        <div v-for="(company, index) in companys.data" :key="index">
            <div class="bg-white">
                <div class="pt-2">
                    <!-- Product info -->
                    <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-2 lg:px-0 lg:pt-2 lg:pb-24">
                    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-2">
                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ company.name }}</h1>
                    </div>
    
                    <!-- Options -->
                    <div class="mt-4 lg:row-span-3 lg:mt-0">
                        <p class="text-3xl tracking-tight text-gray-900"> {{ company.initial }}</p>
    
                        <!-- Reviews -->
                        <div class="mt-6">
                            <div class="flex flex-col">
                               <!-- province & City -->
                               <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                  
                                    
                                    <p href="#" class="ml-3 text-sm font-medium">{{ company.province }} - {{ company.city }} - {{ company.postal_code }}</p>
                                    
                                </div>
                                <!-- Website -->
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                    </svg>

                                    <p href="#" class="ml-3 text-sm font-medium">{{ company.web }}</p>
                                </div>
                                <!-- email -->
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                    <p href="#" class="ml-3 text-sm font-medium">{{ company.email }}</p>
                                </div>
                                <!-- Telephone -->
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>                   
                                    
                                    <p href="#" class="ml-3 text-sm font-medium">{{ company.telephone }} - Fax: {{ company.fax }}</p>
                                    
                                </div>
                                
                                
                            </div>
                        </div>
    
                        <div class="mt-10">
                        
                            <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</button>
                        </div>
                    </div>
    
                    <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pb-16 lg:pr-8">
                        <!-- Description and details -->
                        <div>
                        <h3 class="sr-only">Description</h3>
    
                            <div class="space-y-6">
                                <p class="text-base text-gray-900">{{ company.description }}</p>
                            </div>
                        </div>
    
                        
    
                        <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Alamat</h2>
    
                        <div class="mt-4 space-y-6">
                            <p class="text-sm text-gray-600">{{ company.address }}</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pagination -->
        <div class="bg-white px-3 py-1 fle items-center justify-between border-t border-gray-200 sm:px-3">
            <!-- Button -->
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="btn-pagination" :disable="companys.current_page <=1"
                    @click.prevent="paginate(companys.current_page - 1)"
                >
                    Previous
                </button>

                <button class="btn-pagination" :disable="companys.current_page >= companys.last_page"
                    @click.prevent="paginate(companys.current_page + 1)"
                >
                    Next
                </button>
            </div>

            <!-- Information -->
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    
                    <p class="text-sm leading-5 text-gray-700">
                        showing
                        <span class="font-medium">
                            {{ companys.from }}
                        </span>
                        to
                        <span class="font-medium">
                            {{ companys.to }}
                        </span>
                        of
                        <span class="font-medium">
                            {{ companys.total }}
                        </span>
                        result
                    </p>
                </div>
                <!-- menampilkan pagination -->
                <pagination
                    :current_page="current_page"
                    :total="companys.total"
                    :per_page="companys.per_page"
                    :last_page="companys.last_page"
                    :from="companys.from"
                    :to="companys.to"
                    @paginate="paginate"
                    :offset="4"
                >

                </pagination>
            </div>
            
        </div>

    </Admin-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from '@/Layouts/AdminLayout.vue';
import JetButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/components/Pagination.vue";
import Button from "../../../Components/PrimaryButton.vue";

export default {
    created () {
        
    },
    components: {
        Link,
        AdminLayout,
        JetButton,
        Pagination,
        Button,
    },
    props: {
        filters: Object,
        companys: Object,
    },
    data() {
        return{
            current_page: this.companys.current_page,
            form: {
                search: this.filters.search,
                per_page: this.companys.per_page,
                page: this.filters.page,
                sort_by: this.filters.sort_by,
                sort_dir: this.filters.sort_dir ?? "asc",
            }
        }
    },
    watch: {
        form: {
            handler: _.throttle(function () {
                let query = _.pickBy(this.form);
                this.$inertia.get(
                    this.route("admin.companys.index"),
                    Object.keys(query).length ? query : { remember: "forget"},
                    { preserveState: true}
                );
            },300),
            deep: true,
        },
        companys(companys) {
            this.current_page = companys.current_page;
        }
    },
    methods: {
        reset() {
            this.form = _.mapValue(this.form, () => null);
        },
        paginate(page) {
            this.form.page = page;
        }
    }
}
</script>