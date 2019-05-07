const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const DocumentSchema = new Schema({
    title: {
        type: String,
        unique: true
    },
    text: {
        type: String
    },
    creation: {
        type: Date
    },
    modification: {
        type: Date
    }
});
const DocumentModel = mongoose.model('documents', DocumentSchema);
module.exports = DocumentModel;