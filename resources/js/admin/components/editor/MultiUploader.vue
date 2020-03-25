<template>
    <div>
        <div class="row images-list mb-2" v-if="images.length">
            <div class="col-md-6 col-lg-4" v-for="(image, index) in images" :key="index">
                <div class="image-preview rounded"
                     :style="{backgroundImage: `url(${image.preview})`}">
                </div>
            </div>
        </div>

        <label class="position-relative image-uploader d-block rounded bg-light p-4">
            <input type="file" accept="image/*" multiple @change="handleImages">

            <div class="text-center">
                Загрузить изображения
                <div v-if="tooltip">({{ tooltip }})</div>
            </div>
        </label>
    </div>
</template>

<script>
  export default {
    props: {
      src: Array,
      name: {
        type: String,
        default() {
          return 'image';
        }
      },
      model: String,
      modelId: Number | String,
      collection: String,
      tooltip: String,
    },
    data() {
      return {
        images: this.src || []
      }
    },
    methods: {
      async uploadFile(formData) {
        await axios.post('/admin/media/upload', formData)
          .then(({data}) => {
            this.images.push(data);
          });
      },

      handleImages(event) {
        const fileList = event.target.files;

        if (!fileList.length) return;

        for (let i = 0; i < event.target.files.length; i++) {
          const formData = new FormData();
          let file = fileList[i];
          formData.set('image', file);

          if (this.model && this.modelId) {
            formData.set('model', this.model);
            formData.set('model_id', this.modelId);
          }

          if (this.collection) {
            formData.set('collection', this.collection);
          }

          this.uploadFile(formData);
        }
      },

      removeImage(index, route) {
        if (!!route) {
          axios.delete(route);
        }

        this.images.splice(index, 1);
      }
    }
  }
</script>

<style lang="scss" scoped>
    .previews {
        margin: -0.5rem;
    }

    .images-list {
        margin: -0.5rem;

        [class^="col"] {
            padding: 0.5rem;
        }
    }

    .image-preview {
        position: relative;
        background-size: contain;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        padding-top: 100%;
        overflow: hidden;

        .btn-delete {
            opacity: 0;
            padding: 0;
            position: absolute;
            top: 5px;
            right: 5px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            transition: 0.35s;
            transform: scale(0);

            svg {
                margin: auto;
                fill: #fff;
            }
        }

        &:hover {
            .btn-delete {
                opacity: 1;
                visibility: visible;
                transform: scale(1);
            }
        }
    }

    .image-uploader {
        overflow: hidden;

        [type="file"] {
            position: absolute;
            left: -9999px;
        }
    }

    .material-icons {
        font-size: 14px;
    }
</style>
