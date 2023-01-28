<template>
    <Admin-layout>      
         <!-- Breadcrumb items -->
         <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link
                                    :href="route('admin.dashboard.index')"
                                >                                
                                
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </Link>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <div class="text-gray-700 ml-1 md:ml-2 text-sm ont-medium">
                                <Link
                                    :href="route('admin.companys.index')"
                                >                                
                                Companys
                                </Link>
                            </div>                            
                        </div>                        
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <div class="text-gray-700 ml-1 md:ml-2 text-sm ont-medium">
                                <Link
                                    :href="route('admin.companys.create')"
                                >                                
                                Create
                                </Link>
                            </div>                            
                        </div>                        
                    </li>
                </ol>
            </nav>

            <!-- Breadcrumb Header -->
            <div class="text-2xl font-bold mt-2 mb-2"> Create Company</div>
        </div>  
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Company Profile</h3>
                        <p class="mt-1 text-sm text-gray-600">This information will be display publicly so be careful what you share.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                <form @submit.prevent="storeData">
                    <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="initial" class="block text-sm font-medium text-gray-700">Initial</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    v-model="form.initial"
                                    autofocus
                                />
                                <jet-input-error :message="form.errors.initial" class="mt-2"/>
                            </div>
                            

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    v-model="form.name"
                                />
                                <jet-input-error :message="form.errors.name" class="mt-2"/>
                            </div>

                            <div class="col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    v-model="form.description"
                                ></textarea>
                                <jet-input-error :message="form.errors.description" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="web" class="block text-sm font-medium text-gray-700">Website</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span>
                                    <input type="text" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="www.example.com"
                                        v-model="form.web"
                                    />
                                </div>
                                <jet-input-error :message="form.errors.web" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">@</span>
                                    <input type="text" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="example@gmail.com"
                                        v-model="form.email"
                                    />
                                </div>
                                <jet-input-error :message="form.errors.email" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                <label for="telephone" class="block text-sm font-medium text-gray-700">Telephone</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    v-model="form.telephone"
                                />
                                <jet-input-error :message="form.errors.telephone" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                <label for="fax" class="block text-sm font-medium text-gray-700">Fax</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    v-model="form.fax"
                                />
                                <jet-input-error :message="form.errors.fax" class="mt-2"/>
                            </div>

                            <div class="col-span-6">
                                <label for="address" class="block text-sm font-medium text-gray-700">address</label>
                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    v-model="form.address"
                                ></textarea>
                                <jet-input-error :message="form.errors.address" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.city"
                                    />
                                    <jet-input-error :message="form.errors.city" class="mt-2"/>  
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                <input type="text" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    v-model="form.province"
                                />
                                <jet-input-error :message="form.errors.province" class="mt-2"/>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal code</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    v-model="form.postal_code"
                                />
                                <jet-input-error :message="form.errors.postal_code" class="mt-2"/>
                            </div>
                            
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disable="form.processing"
                            >
                            Save
                        </jet-button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </Admin-layout>
</template>

<script>
import { defineComponent, DefineComponent } from 'vue';
import JetButton from "@/Components/PrimaryButton.vue";
import JetInput from "@/Components/TextInput.vue";
import JetInputError from "@/Components/InputError.vue";
import JetLabel from "@/Components/InputLabel.vue";
import JetActionMessage from "@/Components/ActionMessage.vue";
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default defineComponent ({
    created () {
        document.title = "Companys";
    },
    components: {
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        Link,
        AdminLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                initial: "",
                description: "",
                name: "",
                address: "",
                province: "",
                city: "",
                postal_code: "",
                web: "",
                email: "",
                telephone: "",
                fax: "",
            }),
        }
    },
    methods: {
        storeData() {
            this.form.post(this.route('admin.companys.store'), {
                errorBag: 'storeData',
                preserveScroll:true,
            })
        }
    },
    
})

</script>