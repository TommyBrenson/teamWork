//Import libraries
require('dotenv').config()
const express = require('express')

//Import connection data DataBase
const sequelize = require('./db')


//Read port local server
const PORT = process.env.PORT || 5000
const app = express()

//Function start Server
const start = async () => {
    try{
        await sequelize.authenticate() //connect db
        await sequelize.sync()
        app.listen(PORT, () => console.log(`Server started on port ${PORT}`))
    }
    catch(e){
        console.log(e)
    }
}

start();