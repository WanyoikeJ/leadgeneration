<template>
    <div class="ml-10 flex items-baseline space-x-4">
        <NavLink href="/tasks" :active="$page.component === 'Home'">
            Agent tasks
        </NavLink>

        <NavLink href="/" :active="$page.component === 'Home'">
            Login
        </NavLink>
    </div>
</template>

<script>
import NavLink from "./NavLink";

export default {
    components: { NavLink },
};
</script>
