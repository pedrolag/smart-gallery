<template>
  <v-menu top :close-on-click="true">
    <template v-slot:activator="{ on, attrs }">
      <v-chip
        color="category.color"
        label
        dark
        class="category-chip"
        v-bind="attrs"
        v-on="on"
      >
        {{ category.name }}

        <v-btn
          icon
          x-small
          @click.native.stop="category.favorited = !category.favorited"
          :class="{ favorited: category.favorited }"
        >
          <v-icon v-if="!category.favorited" color="grey">
            mdi-star-outline
          </v-icon>
          <v-icon v-if="category.favorited" color="amber"> mdi-star </v-icon>
        </v-btn>
      </v-chip>
    </template>

    <v-list>
      <v-list-item v-for="(item, index) in items" :key="index" @click="teste">
        <v-list-item-title>{{ item.title }}</v-list-item-title>
        <v-spacer></v-spacer>
        <v-chip x-small label> {{ category.images }} </v-chip>
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script>
export default {
  name: "CategoryChip",
  props: {
    category: {
      type: Object,
      required: true,
    },
  },
  data: () => ({
    items: [
      { title: "Ver imagens relacionadas" },
      { title: "Click Me" },
      { title: "Click Me" },
      { title: "Click Me 2" },
    ],
  }),
  methods: {
    teste() {
      console.log("asd");
    },
  },
};
</script>

<style lang="scss" scoped>
.category-chip {
  text-transform: uppercase;
  font-size: 12px !important;
  letter-spacing: 2px;

  .v-btn {
    margin-left: 0px;
    display: none;

    &.favorited {
      margin-left: 8px;
      display: flex;
    }
  }

  &:hover {
    .v-btn {
      margin-left: 8px;
      display: flex;
    }
  }
}
</style>