<template>
   <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <MobilenavLink href="/tasks" :active="$page.component === 'Agenttasks'">
            Agent tasks
        </MobilenavLink>

        <MobilenavLink href="/" :active="$page.component === 'Auth/Login'">
            User login
        </MobilenavLink>

        <MobilenavLink href="/adminlogin" :active="$page.component === 'Auth/Admin'">
            Admin login
        </MobilenavLink>
    </div>
</template>

<script>
import MobilenavLink from "./MobilenavLink";

export default {
    components: { MobilenavLink },
};
</script>
