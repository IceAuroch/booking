<template>
    <div class="form-group">
        <label v-text="label" v-if="label"></label>

        <div class="border rounded">
            <menubar :editor="editor"></menubar>
            <editor-content class="p-3" :editor="editor"/>
        </div>

        <input type="hidden" :name="name" :value="html">
    </div>
</template>

<script>
  import Menubar from './Menubar';
  import {Editor, EditorContent} from 'tiptap';
  import {
    Blockquote,
    HardBreak,
    Heading,
    HorizontalRule,
    OrderedList,
    BulletList,
    ListItem,
    TodoItem,
    TodoList,
    Bold,
    Italic,
    Link,
    Strike,
    Underline,
    History,
  } from 'tiptap-extensions';

  export default {
    props: {
      label: String,
      content: String,
      name: {
        type: String,
        default() {
          return 'description';
        }
      }
    },

    components: {
      EditorContent,
      Menubar,
    },

    data() {
      return {
        editor: null,
        html: this.content
      }
    },

    mounted() {
      this.editor = new Editor({
        extensions: [
          new Blockquote(),
          new BulletList(),
          new HardBreak(),
          new Heading({levels: [2, 3, 4]}),
          new HorizontalRule(),
          new ListItem(),
          new OrderedList(),
          new TodoItem(),
          new TodoList(),
          new Link(),
          new Bold(),
          new Italic(),
          new Strike(),
          new Underline(),
          new History(),
        ],
        content: this.content,
        onUpdate: ({getHTML}) => {
          this.html = getHTML()
        },
      })
    },

    beforeDestroy() {
      this.editor.destroy()
    },
  }
</script>

<style lang="scss" src="./assets/sass/main.scss"></style>
<style lang="scss" scoped>
    .menubar {
        display: flex;
        align-items: center;
    }
</style>
