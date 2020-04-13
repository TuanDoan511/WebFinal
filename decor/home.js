Array.prototype.forEach.call(document.querySelectorAll('.file_button'), function (button) {
    const hiddenInput = button.parentElement.querySelector('.file_input');
    const label = button.parentElement.querySelector('.file_label');


    button.addEventListener('click', function () {
        hiddenInput.click();
    });

    hiddenInput.addEventListener('change',function () {
        const filenameList = Array.prototype.map.call(hiddenInput.files, function (file) {
            return file.name;
        });


    });
});