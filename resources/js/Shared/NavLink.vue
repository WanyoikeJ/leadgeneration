<template>
    <Link
        class="px-3 py-2 rounded-md text-sm font-medium"
        :class="[active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
    >
        <slot />
    </Link>
</template>

<script>
export default {
  props: {
    active: Boolean
  }
};
</script>
