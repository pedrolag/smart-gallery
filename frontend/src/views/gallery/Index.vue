<template>
  <v-container class="gallery-view">

    <p>gallery/index</p>

    <ImageGrid :gallery="gallery"/>

  </v-container>
</template>

<script>
import ImageGrid from "./../../components/gallery/ImageGrid.vue";

export default {
  name: "Index",

  components: {
    ImageGrid,
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