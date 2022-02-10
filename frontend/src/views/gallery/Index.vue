<template>
  <v-container class="gallery-view">

    <p>gallery/index</p>

    <GalleryForm @store="getAll" />

    <GalleryGrid :gallery="gallery" />

  </v-container>
</template>

<script>
import GalleryGrid from "../../components/gallery/GalleryGrid.vue";
import GalleryForm from "../../components/gallery/GalleryForm.vue";

export default {
  name: "Index",

  components: {
    GalleryGrid,
    GalleryForm,
  },

  data: () => ({
    gallery: [],
  }),

  methods: {

    getAll () {
      this.axios.get('http://localhost:8000/api/images')
        .then((response) => {
          this.gallery = response.data;
        });
    }

  },

  mounted() {
    this.getAll();
  }
};
</script>

<style lang="scss" scoped>
.gallery-view {
  padding: 24px;
}
</style>