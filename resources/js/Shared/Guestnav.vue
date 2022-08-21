<template>
    <div class="ml-10 flex items-baseline space-x-4">
        <NavLink href="/tasks" :active="$page.component === 'Agenttasks'">
            Agent tasks
        </NavLink>

        <NavLink href="/" :active="$page.component === 'Auth/Login'">
            User login
        </NavLink>

        <NavLink href="/adminlogin" :active="$page.component === 'Auth/Admin'">
            Admin login
        </NavLink>
    </div>
</template>

<script>
import NavLink from "./NavLink";

export default {
    components: { NavLink },
};
</script>
