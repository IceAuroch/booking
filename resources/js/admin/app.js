require('./bootstrap');

import {Wysiwyg, SingleUploader, MultiUploader, BlockEditor, Options} from './components/Editor';

new Vue({
  el: '#app',
  components: {
    Wysiwyg,
    SingleUploader,
    MultiUploader,
    BlockEditor,
    Options
  },
  mounted() {
    require('./modules/notifications');
    require('./modules/phone-mask');
  }
});

