<template>
    <div class="ml-10 flex items-baseline space-x-4">
        <NavLink href="/users" :active="$page.component === 'Admin/Users/Index'">
            Users
        </NavLink>

        <!-- <NavLink href="/agents" :active="$page.component === 'Admin/Agents/Index'">
            Agents
        </NavLink> -->

        <NavLink href="/agentstasks" :active="$page.component === 'Admin/Agenttasks/Index'">
            Agents tasks
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
