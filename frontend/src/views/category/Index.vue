<template>
  <v-container>
    <v-menu top :close-on-click="closeOnClick">
      <template v-slot:activator="{ on, attrs }">
        <!-- <v-btn
          color="primary"
          dark
          v-bind="attrs"
          v-on="on"
          dense
          flat
          elevation="0"
        >
          Dropdown
        </v-btn> -->
        <v-chip color="category.color" label dark class="category-chip" v-bind="attrs"
          v-on="on">
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
        <v-list-item v-for="(item, index) in items" :key="index">
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>

    <!-- <v-chip color="category.color" label dark class="category-chip">
      {{ category.name }}

      <v-btn
        icon
        x-small
        @click="category.favorited = !category.favorited"
        :class="{ favorited: category.favorited }"
      >
        <v-icon v-if="!category.favorited" color="grey">
          mdi-star-outline
        </v-icon>
        <v-icon v-if="category.favorited" color="amber"> mdi-star </v-icon>
      </v-btn>
    </v-chip> -->

    <v-data-table
      :headers="headers"
      :items="desserts"
      :items-per-page="5"
      class="elevation-0"
    >
      <template v-slot:item.id="{ item }">
        <v-chip :color="item.color" label dark>
          {{ item.name }}
        </v-chip>
      </template>

      <template v-slot:item.favorited="{ item }">
        <v-btn icon @click="item.favorited = !item.favorited">
          <v-icon v-if="!item.favorited" color="grey">
            mdi-star-outline
          </v-icon>
          <v-icon v-if="item.favorited" color="amber"> mdi-star </v-icon>
        </v-btn>
      </template>

      <template v-slot:item.color="props">
        <v-edit-dialog
          :return-value.sync="props.item.color"
          @save="save"
          @cancel="cancel"
          @open="open"
          @close="close"
        >
          {{ props.item.color }}
          <template v-slot:input>
            <!-- <v-text-field
              v-model="props.item.color"
              :rules="[max25chars]"
              label="Edit"
              single-line
              counter
            ></v-text-field> -->
            <v-color-picker
              mode="hexa"
              v-model="props.item.color"
            ></v-color-picker>
          </template>
        </v-edit-dialog>
      </template>
    </v-data-table>

    <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
      {{ snackText }}

      <template v-slot:action="{ attrs }">
        <v-btn v-bind="attrs" text @click="snack = false"> Close </v-btn>
      </template>
    </v-snackbar>
  </v-container>
</template>

<script>
export default {
  name: "Index",

  data: () => ({
    category: {
      name: "General memes",
      images: 159,
      favorited: true,
      color: "#ff0000",
    },
    snack: false,
    snackColor: "",
    snackText: "",
    max25chars: (v) => v.length <= 25 || "Input too long!",
    headers: [
      { text: "Preview", align: "start", value: "id" },
      { text: "Category", align: "start", value: "name" },
      { text: "Images", value: "images" },
      { text: "Favorited", value: "favorited" },
      { text: "Color", value: "color" },
    ],
    desserts: [
      {
        id: 1,
        name: "General memes",
        images: 159,
        favorited: true,
        color: "#ff0000",
      },
      {
        id: 2,
        name: "Personal",
        images: 22,
        favorited: false,
        color: "success",
      },
      {
        id: 3,
        name: "Cat memes",
        images: 12312,
        favorited: true,
        color: "warning",
      },
    ],
  }),

  methods: {
    save() {
      this.snack = true;
      this.snackColor = "success";
      this.snackText = "Data saved";
    },
    cancel() {
      this.snack = true;
      this.snackColor = "error";
      this.snackText = "Canceled";
    },
    open() {
      this.snack = true;
      this.snackColor = "info";
      this.snackText = "Dialog opened";
    },
    close() {
      console.log("Dialog closed");
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
