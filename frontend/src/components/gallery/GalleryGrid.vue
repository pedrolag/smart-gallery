<template>
  <div class="gallery-grid">
    <v-row>
      <v-col
        v-for="image in gallery"
        :key="image.id"
        class="d-flex child-flex pa-1"
        cols="2"
      >
        <v-hover>
          <template v-slot:default="{ hover }">
            <v-card
              class="gallery-item"
              @click="test"
            >
              <v-img
                :src="image.url"
                aspect-ratio="1"
                class="grey lighten-2 transition-swing"
                :class="`elevation-${hover ? 8 : 0}`"
                v-ripple
              >
                <template v-slot:placeholder>
                  <v-row
                    class="fill-height ma-0"
                    align="center"
                    justify="center"
                  >
                    <v-progress-circular
                      indeterminate
                      color="grey lighten-5"
                    ></v-progress-circular>
                  </v-row>
                </template>
              </v-img>
            </v-card>
          </template>
        </v-hover>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: "GalleryGrid",
  props: {
    gallery: {
      type: Array,
      required: true
    }
  },
  data: () => ({
    test() {
      console.log('sad');
    }
  }),
};
</script>

<style lang="scss" scoped>
.gallery-grid {

  padding: 24px 8px;

  .gallery-item {
    border-radius: 0;

    &:hover {
      cursor: pointer;
    }

    &.v-card--link:focus:before {
      background: unset;
    }
  }


}
</style>