<template>
    <div class="block-editor">
        <div class="block-editor__header d-flex justify-content-between align-items-center">
            <h6 class="flex-shrink-1 mb-0" v-if="title">{{ title }}</h6>

            <div class="lang-switcher btn-group ml-auto" v-if="multilang">
                <button type="button" class="btn btn-sm"
                        v-for="(lang, index) in locales" :key="index"
                        :class="current === lang ? 'btn-primary' : 'btn-dark'"
                        @click.prevent="current = lang">
                    {{ langs[index] }}
                </button>
            </div>
        </div>

        <div class="block-editor__body">
            <template v-if="multilang">
                <div v-for="locale in locales" v-show="locale === current" :key="locale">
                    <slot :name="locale"></slot>
                </div>
            </template>

            <slot></slot>
        </div>
    </div>
</template>

<script>
  const locales = JSON.parse(document.head.querySelector('[name="locales"]').content);

  export default {
    props: {
      title: String,
      multilang: {
        type: Boolean,
        default() {
          return true;
        }
      }
    },
    data() {
      return {
        current: locales[0],
        locales: locales,
        langs: []
      }
    },
    mounted() {
      const langs = {
        ru: 'Русский',
        uk: 'Українська',
        en: 'English'
      };
      this.langs = this.locales.map(l => {
        return langs[l];
      });
    }
  }
</script>
