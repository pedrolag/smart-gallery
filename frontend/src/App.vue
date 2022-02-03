<template>
  <v-app>
    <Navbar />
    <Sidenav />
    <Main />
    <Footer />
  </v-app>
</template>

<script>
import Navbar from "./components/template/Navbar.vue";
import Sidenav from "./components/template/Sidenav.vue";
import Main from "./components/template/Main.vue";
import Footer from "./components/template/Footer.vue";

export default {
  name: 'App',

  components: {
    Navbar,
    Sidenav,
    Main,
    Footer,
  },

  data: () => ({
    //
  }),
};
</script>
