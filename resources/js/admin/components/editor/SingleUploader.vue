<template>
    <label class="image-preview"
           :class="{'image-preview--block': height}"
           :style="{'height': height ? height + 'px' : 'auto'}">
        <figure :style="imageStyle"></figure>

        <input type="file" :name="name" @change="onImageLoaded">
    </label>
</template>

<script>
  export default {
    props: {
      name: {
        type: String,
        default() {
          return 'image';
        }
      },
      src: String,
      mode: {
        type: String,
        default() {
          return 'block';
        }
      },
      height: Number | String,
      ratio: String
    },

    data() {
      return {
        background: this.src || '/images/no-image.png'
      }
    },

    computed: {
      imageStyle() {
        return {
          background: `url(${this.background}) 50% 50% / ${this.mode === 'block' ? 'cover' : 'contain'} no-repeat`,
          paddingTop: !this.ratio ? (450 / 300 * 100) + '%' : this.ratio
        }
      }
    },

    methods: {
      onImageLoaded(event) {
        const reader = new FileReader();

        if (event.target.files[0]) {
          reader.onload = () => {
            this.background = reader.result;
          };

          reader.readAsDataURL(event.target.files[0]);
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
    .image-preview {
        display: block;
        position: relative;

        figure {
            margin: 0;
        }

        &--block {
            figure {
                padding-top: 0;
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }
        }

        input {
            position: absolute;
            left: -9999px;
        }
    }
</style>
