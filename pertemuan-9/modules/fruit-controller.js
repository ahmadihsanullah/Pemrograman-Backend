// import data fruit
const fruits = require("./data.js");

//fungsi index
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
};

//fungsi store
const store = (name) => {
    fruits.push(name);
    index();
};

// exports method index dan store
module.exports = { index, store };