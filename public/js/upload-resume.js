const dropArea = document.querySelector(".drop_box"),
    button = dropArea.querySelector("button"),
    dragText = dropArea.querySelector("header"),
    input = dropArea.querySelector("input");
let file;
var filename;

button.onclick = () => {
    input.click();
};

input.addEventListener("change", function (e) {
    let fileName = e.target.files[0].name;
    $('.file-name').text(fileName);
});
