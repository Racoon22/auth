$('#auth_btn').on("click", function (e) {
    e.preventDefault();
    var password = $('#password').val(),
        login = $('#login').val(),
        token = $('#token').val();
    $.post({
        url: 'index.php',
        data: {
            login: login,
            password: password,
            token: token
        },
        dataType: "json"
    }).done(function (data) {
        if (data.status == true) {
            window.location.replace("list.html");
        }
        console.log(data);
    });
});

$('#reg_btn').on("click", function (e) {
    e.preventDefault();
    var name = $('#name').val(),
        age = $('#age').val(),
        description = $('#description').val(),
        login = $('#login').val(),
        password = $('#password').val(),
        confirm_password = $('#confirm_password').val(),
        token = $('#token').val(),
        formData = new FormData();
    var fileSelect = document.getElementById('photo');
    var files = fileSelect.files;
    console.log(files);
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        console.log(file);
        // Check the file type.
        // if (!file.type.match('image.*')) {
        //     continue;
        // }
        formData.append('photos', file, file.name);
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'handler.php', true);
    // Set up a handler for when the request finishes.
    xhr.onload = function () {
        if (xhr.status === 200) {
            $.post({
                url: 'reg.php',
                data: {
                    name: name,
                    age: age,
                    description: description,
                    login: login,
                    password: password,
                    confirm_password: confirm_password,
                    token: token
                },
                dataType: "json"
            }).done(function (data) {
                if (data.status === true) {
                    window.location.href = "list.html";
                }
                console.log(data);
            });
            // File(s) uploaded.
        } else {
            alert('An error occurred!');
        }
    };
    // Send the Data.
    xhr.send(formData);
});
