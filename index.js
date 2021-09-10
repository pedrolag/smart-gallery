fs = require('fs');

const file = 'data.json';
const path = './';
const filePath = `${path}${file}`;
var data;

// Get data from json file
if (fs.existsSync(filePath)) {
    data = require(filePath);
}

// Add new image
data.images.push(
    {
        id: data.images.length,
        name: "test",
        tags: [0]
    }
);

// Save data into json file
fs.writeFileSync(filePath, JSON.stringify(data, null, 4));
