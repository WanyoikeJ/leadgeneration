<template>
    <Head>
        <title>Home</title>
        <meta
            type="description"
            content="Home information"
            head-key="description"
        >
    </Head>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl tracking-tight font-bold text-gray-900">All tasks</h1>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
                    {{agents.data}}
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>

</template>

<script>
    export default {
        layout: 'guest',
    };
</script>
<script setup>
    import Pagination from '../Shared/Pagination';
    import { ref, watch } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import debounce from "lodash/debounce";

    let props = defineProps({
        agents: Object,
        filters: Object,
        can: Object
    });

    // let search = ref(props.filters.search);

    // watch(search, debounce(function (value) {
    //     Inertia.get('/users', { search: value }, { preserveState: true, replace: true });
    // }, 300));
</script>