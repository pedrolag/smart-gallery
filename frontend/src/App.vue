<template>
  <v-app>
    <Navbar @toggle-drawer="$refs.drawer.drawer = !$refs.drawer.drawer" />
    <Sidebar ref="drawer" />
    <Main />
    <Footer />
  </v-app>
</template>

<script>
import Navbar from "./components/template/Navbar.vue";
import Sidebar from "./components/template/Sidebar.vue";
import Main from "./components/template/Main.vue";
import Footer from "./components/template/Footer.vue";

export default {
  name: 'App',

  components: {
    Navbar,
    Sidebar,
    Main,
    Footer,
  },

  data: () => ({
    toggleSidenav: false,
  }),
};
</script>
