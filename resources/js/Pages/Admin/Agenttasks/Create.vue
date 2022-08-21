<template>
    <Head title="Create Agent" />

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl tracking-tight font-bold text-gray-900 capitalize">Create agent task</h1>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <form @submit.prevent="submit" class="border-4 border-dashed border-gray-200 rounded-lg p-4">
                    <div class="grid grid-cols-6 gap-6 mb-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Agent</label>
                            <select id="companyname" v-model="form.agent_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Select agent</option>
                                <option v-for="agt in users.data" :key="agt.id" :value="agt.id">{{agt.name}}</option>
                            </select>
                            <div v-if="form.errors.agent_id" v-text="form.errors.agent_id" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Leads</label>
                            <select id="companyname" v-model="form.lead_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Select agent</option>
                                <option v-for="ld in leads.data" :key="ld.id" :value="ld.id">
                                    {{ld.account}} => {{ld.description}}
                                </option>
                            </select>
                            <div v-if="form.errors.lead_id" v-text="form.errors.lead_id" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" v-model="form.description" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div v-if="form.errors.description" v-text="form.errors.description" class="text-red-500 text-xs mt-1"></div>
                        </div>

                    </div>

                    <div class="-mx-4 -mb-4 px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button :disabled="form.processing" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>                    
                </form>
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
import { useForm } from "@inertiajs/inertia-vue3";

    let props = defineProps({
        users: Array,
        leads: Array
    });

    let form = useForm({
        agent_id: '',
        lead_id: '',
        description: '',
    });

    let submit = () => {
        form.post('/agentstasks');
    };
</script>
