/* eslint-disable */
<template>
  <div>
    <Nav></Nav>
    <br><br>
    <div class="container">
      <b-row>
        <b-col>
          <h2 class="text-center">Markdown</h2>
          <textarea style="height:auto" rows="16" class='form-control' v-model='md_text'></textarea>
        </b-col>
        <b-col>
          <br/><br/>
          <div class="pre-scrollable" v-html='previewText'></div>
        </b-col>
      </b-row>
      <br>
      <b-row>
        <b-col>
          <b-form cols="3">
            <b-form-input
              type="text"
              v-model="title"
              requred
              placeholder="Введите название файла"/>
          </b-form>
        </b-col>
        <b-col cols="9">
          <b-button type="submit" variant="primary" v-on:click="save">Сохранить</b-button>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import DocumentService from '../service/PostService'
import Nav from './Nav'

let marked = require('marked')
export default {
  name: 'Markdown',
  components: {Nav},
  data () {
    return {
      md_text: '# Title',
      title: ''
    }
  },
  computed: {
    previewText () {
      marked.setOptions({
        renderer: new marked.Renderer(),
        gfm: true,
        tables: true,
        breaks: true,
        pedantic: false,
        sanitize: true,
        smartLists: true,
        smartypants: false
      })
      return marked(this.md_text)
    }
  },
  methods: {
    save: function () {
      if (this.title !== '' && this.md_text !== '') {
        DocumentService.addNewDocument({
          title: this.title,
          text: this.md_text
        })
        this.title = ''
        this.md_text = ''
      } else {
        alert('Empty fields!')
      }
    }
  }
}
</script>
