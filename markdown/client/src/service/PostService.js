import api from '../service/api'

export default {
  fetchdocuments () {
    return api().get('documents')
  },
  addNewDocument (params) {
    return api().post('documents', params)
  },
  getDocument (params) {
    return api().get(`documents/${params.id}`)
  },
  updateDocument (params) {
    return api().put(`documents/${params.id}`, params)
  },
  deleteDocument (id) {
    return api().delete(`documents/${id}`)
  }
}
