<template>
  <v-container>
    <v-data-table
      :headers="headers"
      :items="desserts"
      :items-per-page="5"
      class="elevation-1"
    >
      <template v-slot:item.name="{ item }">
        <v-chip :color="item.color" label dark>
          {{ item.name }}
        </v-chip>
      </template>
      <template v-slot:item.favorited="{ item }">
        <v-icon v-if="!item.favorited" color="grey"> mdi-star-outline </v-icon>
        <v-icon v-if="item.favorited" color="amber"> mdi-star </v-icon>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
export default {
  name: "Index",

  data: () => ({
    headers: [
      {
        text: "Category",
        align: "start",
        value: "name",
      },
      { text: "Images", value: "images" },
      { text: "Favorited", value: "favorited" },
    ],
    desserts: [
      {
        name: "General memes",
        images: 159,
        favorited: true,
        color: "primary",
      },
      {
        name: "Personal",
        images: 22,
        favorited: false,
        color: "success",
      },
      {
        name: "Cat memes",
        images: 12312,
        favorited: true,
        color: "warning",
      },
    ],
  }),
};
</script>
