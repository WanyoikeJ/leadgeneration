<template>
    <div class="ml-10 flex items-baseline space-x-4">
        <NavLink href="/users" :active="$page.component === 'Users'">
            Users
        </NavLink>

        <NavLink href="/agents" :active="$page.component === 'Agents'">
            Agents
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
