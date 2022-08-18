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

        <!-- <NavLink href="/users" :active="$page.component === 'Users'">
            Users
        </NavLink> -->
        
    </div>
    
    <!-- <nav>
        <ul class="flex space-x-6">
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
    </nav> -->
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
