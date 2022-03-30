const sequelize = require('../dataBase')
const {DataTypes} = require('sequelize')


//Models User
const User = sequelize.define('user', {
    id: {type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true},
    email: {type: DataTypes.STRING, unique: true},
    password: {type: DataTypes.STRING},
    name: {type: DataTypes.STRING},
    family: {type: DataTypes.STRING},
    date_birthday: {type: DataTypes.STRING},
    role: {type: DataTypes.STRING, defaultValue: "USER"}
})


module.exports = {
    User
}