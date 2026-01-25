<template>
  <div id="app">
    <Transition
      v-if="isAuthPage"
      name="crossfade"
      mode="out-in"
    >
      <router-view />
    </Transition>

    <router-view v-else />
  </div>
</template>

<script>
export default {
  computed: {
    isAuthPage() {
      return this.$route.path === '/login' || this.$route.path === '/register'
    }
  }
}
</script>
