<template>
    <Head title="Settings" />

    <h1 class="text-3xl">
        Settings
    </h1>

    <div>
        {{admin}}
        <br/>
        <br/>
        {{$page}}
    </div>
</template>


<script setup>
    import { ref, watch } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import debounce from "lodash/debounce";

    let props = defineProps({
        admin: Object,
    });
</script>