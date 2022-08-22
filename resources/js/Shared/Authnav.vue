<template>
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <MobilenavLink href="/" :active="$page.component === 'Home'">
            Home
        </MobilenavLink>

        <MobilenavLink href="/accounts" :active="$page.component === 'Accounts/Index'">
            Accounts
        </MobilenavLink>

        <MobilenavLink href="/leads" :active="$page.component === 'Leads/Index'">
            Leads
        </MobilenavLink>        
    </div>
</template>

<script>
import MobilenavLink from "./MobilenavLink";

export default {
  components: { MobilenavLink },
  computed: {
    role() {
      return this.$page.props.auth.user.role;
    }
  }
};
</script>
