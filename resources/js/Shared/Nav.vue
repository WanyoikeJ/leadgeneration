<template>
    <div class="ml-10 flex items-baseline space-x-4">
        <NavLink href="/" :active="$page.component === 'Home'">
            Home
        </NavLink>

        <NavLink href="/accounts" :active="$page.component === 'Accounts/Index'">
            Accounts
        </NavLink>

        <NavLink href="/leads" :active="$page.component === 'Leads/Index'">
            Leads
        </NavLink>        
    </div>
</template>

<script>
import NavLink from "./NavLink";

export default {
  components: { NavLink },
  computed: {
    role() {
      return this.$page.props.auth.user.role;
    }
  }
};
</script>
