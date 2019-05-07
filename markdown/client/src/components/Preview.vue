<template>
  <div>
    <Nav></Nav>
    <br><br>
    <div class="container">
      <b-row>
        <b-col>
          <b-table
            selectable
            :select-mode="selectMode"
            selectedVariant="success"
            :fields="fields"
            :items="documents"
            @row-selected="rowSelected"
            show-empty
          >
            <template slot="empty" slot-scope="scope">
              <h4>Нет документа</h4>
            </template>
            <template slot="thead-top" slot-scope="data"></template>
          </b-table>
          <b-button variant="primary" v-on:click="open">Открыть</b-button>
        </b-col>
        <b-col>
          <h2 class="text-center"></h2>
          <div class="well well-sm pre-scrollable" v-html='previewText'></div>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import Nav from '../components/Nav'
import Service from '../service/PostService'
let marked = require('marked')

export default {
  name: 'Preview',
  components: {Nav},
  data () {
    return {
      selectMode: 'single',
      documents: [],
      fields: [
        {key: 'title', label: 'Название'},
        {key: 'creation', label: 'Дата создания'},
        {key: 'modification', label: 'Последнее изменение'}
      ],
      selected: '',
      md_text: '',
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
  mounted () {
    this.getDocuments()
  },
  methods: {
    async getDocuments () {
      const response = await Service.fetchdocuments()
      this.documents = response.data.documents
    },
    rowSelected (item) {
      this.selected = item[0]
      this.title = this.selected.title
    },

    async open () {
      const response = await Service.getDocument({
        id: this.selected._id
      })
      this.md_text = response.data.text
    }

  }

}
</script>

<style scoped>

</style>
