<template>
  <v-dialog
    content-class="gallery-form"
    v-model="dialog"
    fullscreen
    hide-overlay
    transition="dialog-bottom-transition"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-btn color="primary" dark v-bind="attrs" v-on="on">
        <v-icon left> mdi-plus </v-icon>
        Add images
      </v-btn>
    </template>

    <v-card class="gallery-form__form-card form-card">
      <v-toolbar class="form-card__toolbar toolbar" dark flat color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Settings</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn dark text @click="dialog = false"> Save </v-btn>
        </v-toolbar-items>
      </v-toolbar>

      
      <v-container>

        <v-form class="gallery-form form">
          <v-file-input
            v-model="form.image"
            color="primary"
            counter
            label="File input"
            @change="test"
            placeholder="Select your files"
            outlined
            dense
            :show-size="1000"
          >
            <template v-slot:selection="{ index, text }">
              <v-chip
                v-if="index < 2"
                color="primary"
                dark
                label
                small
              >
                {{ text }}
              </v-chip>

              <span
                v-else-if="index === 2"
                class="text-overline grey--text text--darken-3 mx-2"
              >
                +{{ form.images.length - 2 }} File(s)
              </span>
            </template>
          </v-file-input>

          <v-text-field
            v-model="form.name"
            label="Name"
            outlined
            clearable
            dense
          ></v-text-field>

          <v-textarea
            v-model="form.description"
            label="Description"
            hint="Description of the selected image"
            outlined
          ></v-textarea>

          <v-checkbox
            v-model="form.favorited"
            label="Mark as favorite"
            off-icon="mdi-star-outline"
            on-icon="mdi-star"
            color="amber"
          ></v-checkbox>

          <v-btn dark @click="store">
            <v-icon left>mdi-send</v-icon>
            Salvar
          </v-btn>

        </v-form>

      </v-container>

    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "GalleryForm",

  data: () => ({
    dialog: false,
    widgets: false,
    notifications: false,
    sound: false,
    form: {
      image: null,
      name: '',
      description: '',
      favorited: false,
    }
  }),

  methods: {

    test() {
      console.log(this.form.image)
    },

    store () {
      var formData = new FormData();

      formData.append('name', this.form.name);
      formData.append('description', this.form.description);
      formData.append('favorited', this.form.favorited);
      formData.append('image', this.form.image);

      this.axios({
        method: "post",
        url: "http://localhost:8000/api/images",
        data: formData,
        headers: { "Content-Type": "multipart/form-data" },
      })
      .then(() => {
        this.$emit('store');

        this.dialog = false;
      });
    }

  }
};
</script>

<style lang="scss" scoped>
.gallery-form {

  // .form-card {
  //   background: rgba(0, 0, 0, .8);

  //   .toolbar {
  //     max-width: 600px;
  //     margin: 0 auto;
  //   }
  // }

  .form {
    max-width: 600px;
    margin: 0 auto;
  }
}
</style>