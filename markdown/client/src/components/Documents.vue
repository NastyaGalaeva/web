/* eslint-disable */
<template>
  <div>
    <Nav></Nav>
    <b-container>
      <b-row>
        <b-col>
        <br/><br/>
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
          <b-button variant="danger" v-on:click="deleteDoc">Удалить</b-button>
        </b-col>
        <b-col>
          <br><br>
          <textarea style="height:auto" rows="16" class='form-control' v-model='openedFile'></textarea>
          <br>
          <b-row>
            <b-col>
              <b-form-input
                type="text"
                v-model="title"
                requred/>
            </b-col>
            <b-col>
              <b-button variant="primary" v-on:click="saveChanges">Сохранить изменения</b-button>

            </b-col>
          </b-row>
        </b-col>
      </b-row>

    </b-container>
  </div>
</template>

<script>
import Nav from './Nav'
import Service from '../service/PostService'

export default {
  name: 'Documents',
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
      openedFile: '',
      title: ''
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
      this.openedFile = response.data.text
    },

    async deleteDoc () {
      await Service.deleteDocument(this.selected._id)
      this.getDocuments()
    },

    async saveChanges () {
      await Service.updateDocument({
        id: this.selected._id,
        title: this.title,
        text: this.openedFile
      })
      this.openedFile = ''
      this.title = ''
    }

  }
}
</script>

<style scoped>

</style>
