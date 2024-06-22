document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var fileInput = document.getElementById('file');
    var file = fileInput.files[0];

    if (!file) {
        showMessage('Please select a file.');
        return;
    }

    var formData = new FormData();
    formData.append('file', file);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php');

    xhr.upload.addEventListener('progress', function(e) {
        var percent = (e.loaded / e.total) * 100;
        document.getElementById('progressWrapper').style.display = 'block';
        document.getElementById('progressBar').style.width = percent.toFixed(2) + '%';
    });

    xhr.addEventListener('load', function() {
        if (xhr.status === 200) {
            showMessage('Upload successful.');
            fileInput.value = '';
            document.getElementById('progressWrapper').style.display = 'none';
        } else {
            showMessage('Upload failed. Please try again.');
        }
    });

    xhr.send(formData);
});

function showMessage(message) {
    document.getElementById('message').innerHTML = message;
}
