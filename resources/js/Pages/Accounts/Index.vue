<template>
    <Head title="Accounts" />

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl tracking-tight font-bold text-gray-900">Accounts</h1>

            <input v-model="search" type="text" placeholder="Search..." class="border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md w-full max-w-md" />
        </div>
    </header>
    
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class=" flex justify-end">
                <Link v-if="can.createUser" href="/account/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    New Account
                </Link>
            </div>
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <td>
                                            <div class="px-6 py-4 whitespace-nowrap font-bold text-base">
                                                Name
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-6 py-4 whitespace-nowrap font-bold text-base text-right">
                                                Action
                                            </div>
                                        </td>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="acc in accounts.data" :key="acc.id">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="https://tailwindui.com/img/avatar-3.jpg" alt="" class="h-10 w-10 flex-none rounded-full">
                                                    <div class="ml-4 flex-auto">
                                                        <div class="font-medium">{{ acc.name }}</div>
                                                        <div class="mt-1 text-sm text-slate-700">By: {{acc.user.name}}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td v-if="acc.can.edit" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <Link class="pointer-events-auto rounded-md py-2 px-4 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" :href="`/account/${acc.slug}/edit`" method="get">View</Link>
                                                <!-- :data="{ acc: acc.id }" -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <Pagination :links="accounts.links" class="mt-6" />
            </div>
            <!-- /End replace -->
        </div>
    </main>
</template>

<script setup>
    import Pagination from '../../Shared/Pagination';
    import { ref, watch } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import debounce from "lodash/debounce";

    let props = defineProps({
        accounts: Object,
        filters: Object,
        can: Object
    });

    let search = ref(props.filters.search);

    watch(search, debounce(function (value) {
        Inertia.get('/accounts', { search: value }, { preserveState: true, replace: true });
    }, 300));
</script>
