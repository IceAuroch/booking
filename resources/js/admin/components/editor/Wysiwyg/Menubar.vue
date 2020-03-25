<template>
    <editor-menu-bar
            :editor="editor" v-slot="{ commands, isActive }"
            class="border-bottom p-2 m-0">
        <div class="menubar">

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.bold() }"
                    @click.prevent="commands.bold"
            >
                <icon name="bold"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.italic() }"
                    @click.prevent="commands.italic"
            >
                <icon name="italic"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.strike() }"
                    @click.prevent="commands.strike"
            >
                <icon name="strike"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.underline() }"
                    @click.prevent="commands.underline"
            >
                <icon name="underline"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.paragraph() }"
                    @click.prevent="commands.paragraph"
            >
                <icon name="paragraph"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.heading({ level: 2 }) }"
                    @click.prevent="commands.heading({ level: 2 })"
            >
                H2
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.heading({ level: 3 }) }"
                    @click.prevent="commands.heading({ level: 3 })"
            >
                H3
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.heading({ level: 4 }) }"
                    @click.prevent="commands.heading({ level: 4 })"
            >
                H4
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.bullet_list() }"
                    @click.prevent="commands.bullet_list"
            >
                <icon name="ul"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.ordered_list() }"
                    @click.prevent="commands.ordered_list"
            >
                <icon name="ol"/>
            </button>

            <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.blockquote() }"
                    @click.prevent="commands.blockquote"
            >
                <icon name="quote"/>
            </button>

            <button
                    class="menubar__button"
                    @click.prevent="commands.horizontal_rule"
            >
                <icon name="hr"/>
            </button>

            <button
                    class="menubar__button"
                    @click.prevent="commands.undo"
            >
                <icon name="undo"/>
            </button>

            <button
                    class="menubar__button"
                    @click.prevent="commands.redo"
            >
                <icon name="redo"/>
            </button>

        </div>
    </editor-menu-bar>
</template>

<script>
  import {EditorMenuBar} from 'tiptap';
  import Icon from './Icon';

  export default {
    props: ['editor'],

    components: {
      EditorMenuBar,
      Icon
    }
  }
</script>