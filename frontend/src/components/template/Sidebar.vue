<template>
  <v-navigation-drawer app v-model="drawer" temporary>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="text-h6"> Application </v-list-item-title>
        <v-list-item-subtitle> subtext </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>

    <v-divider></v-divider>

    <v-list dense nav>
      <v-list-item
        v-for="item in items"
        :to="item.route"
        active-class="primary white--text"
        :key="item.title"
      >
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  name: "Sidebar",
  data: () => ({
    drawer: false,
    items: [
      {
        title: "Home",
        icon: "mdi-home-outline",
        route: "/",
      },
      {
        title: "Gallery",
        icon: "mdi-view-gallery-outline",
        route: "/gallery",
      },
      {
        title: "Categories",
        icon: "mdi-label-multiple-outline",
        route: "/category",
      },
    ],
    right: null,
  }),
};
</script>

<style lang="scss" scoped>
.v-list-item--active::before {
  opacity: 0 !important;
}
</style>