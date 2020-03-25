<template>
    <div class="form-group">
        <label v-if="label">{{label}}</label>
        <v-select :options="options" v-model="selected" :label="labelBy"/>
        <input v-if="selected" type="hidden" :name="name" :value="selected[output]">
    </div>
</template>

<script>
  import vSelect from 'vue-select';

  vSelect.props.components.default = () => ({
    Deselect: {
      render: createElement => createElement('span', '✕'),
    },
    OpenIndicator: {
      render: createElement => createElement('span', '↓'),
    },
  });

  export default {
    props: {
      options: Array|Object,
      value: String,
      label: String,
      labelBy: {
        type: String,
        default() {
          return 'title';
        }
      },
      output: {
        type: String,
        default() {
          return 'id';
        }
      },
      name: {
        type: String,
        required: true
      }
    },

    components: {
      vSelect
    },

    data() {
      return {
        selected: null
      }
    },

    mounted() {
      if (this.value) {
        this.selected = this.options.find(i => i[this.output] === +this.value);
      }
    }
  }
</script>

