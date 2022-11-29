//import fruit-controller

const { index, store } = require("./fruit-controller.js");

const main = ()=> {
    index();
    store("Orange");
}

main();