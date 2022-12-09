const upperCase = (name) => name.toUpperCase();

const lowerCase = (name) => name.toLowerCase();

const getName = (name, callFormatName) => console.log(callFormatName(name)); ;
getName('ihsan', upperCase);
getName('IHSAN', lowerCase);
