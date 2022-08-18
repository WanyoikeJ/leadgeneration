<template>
    <nav>
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">
                Home
                </NavLink>
            </li>

            <!-- <li>
                <NavLink href="/users" :active="$page.component === 'Users'">
                Users
                </NavLink>
            </li> -->

            <li>
                <NavLink href="/accounts" :active="$page.component === 'Accounts'">
                    Accounts
                </NavLink>
            </li>

            <li>
                <NavLink href="/leads" :active="$page.component === 'Leads'">
                    Leads
                </NavLink>
            </li>

            <li>
                <template v-if="role == 'admin'">
                    <NavLink href="/adminlogout" method="post" as="button">
                        Log Out
                    </NavLink>
                </template>
                <template v-else>
                    <NavLink href="/logout" method="post" as="button">
                        Log Out
                    </NavLink>
                </template>
            </li>
        </ul>
    </nav>
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
