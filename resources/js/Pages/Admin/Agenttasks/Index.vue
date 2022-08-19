<template>
    <Head title="Agents" />

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl tracking-tight font-bold text-gray-900">Agents Tasks</h1>

            <input v-model="search" type="text" placeholder="Search..." class="border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md w-full max-w-md" />
        </div>
    </header>
    
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class=" flex justify-end">
                <Link v-if="can.createUser" href="/agentstasks/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    New Task
                </Link>
            </div>
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg">

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="agent in tasks.data" :key="agent.id">

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img src="https://tailwindui.com/img/avatar-3.jpg" alt="" class="h-10 w-10 flex-none rounded-full">
                                                        <div class="ml-4 flex-auto">
                                                            <div class="font-medium">{{ agent.agent.name }}</div>
                                                            <div class="mt-1 text-slate-700 text-xs">Asigned By: {{agent.admin.name}}</div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4 flex-auto">
                                                            <div class="font-medium">{{ agent.lead.account }}</div>
                                                            <div class="mt-1 text-slate-700 text-xs">Desc: {{agent.lead.description}}</div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4 flex-auto">
                                                            <div class="font-medium">{{ agent.lead.source }}</div>
                                                            <div class="mt-1 text-slate-700 text-xs">Stage: {{agent.lead.stage}}</div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="font-normal">{{ agent.lead.timeline }}</div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div v-if="agent.status == false" class="font-normal rounded-full bg-green-600 shadow-md px-2 py-0.5 text-xs text-white">Completed</div>
                                                        <div v-else class="font-normal rounded-full bg-red-600 shadow-md px-2 py-0.5 text-xs text-white">Ongoing</div>
                                                    </div>
                                                </td>

                                                <td v-if="agent.can.edit" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <Link class="pointer-events-auto rounded-md py-2 px-4 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" :href="`/agentstask/${agent.id}/edit`" method="get">View</Link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <Pagination :links="tasks.links" class="mt-6" />
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        layout: 'admin',
    };
</script>
<script setup>
    import Pagination from '../../../Shared/Pagination';
    import { ref, watch } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import debounce from "lodash/debounce";

    let props = defineProps({
        tasks: Object,
        filters: Object,
        can: Object
    });

    let search = ref(props.filters.search);

    watch(search, debounce(function (value) {
        Inertia.get('/agenttasks', { search: value }, { preserveState: true, replace: true });
    }, 300));
</script>
