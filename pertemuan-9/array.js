function formatName(name){
    const result = name.toUpperCase();
    return result;
}

function getName(name, callFormatName){
    const result = callFormatName(name);
    console.log(result);
}

getName('ihsan', formatName)