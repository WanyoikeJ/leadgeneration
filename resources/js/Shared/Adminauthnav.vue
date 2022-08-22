<template>
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <MobilenavLink href="/users" :active="$page.component === 'Admin/Users/Index'">
            Users
        </MobilenavLink>

        <MobilenavLink href="/agentstasks" :active="$page.component === 'Admin/Agenttasks/Index'">
            Agents tasks
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
