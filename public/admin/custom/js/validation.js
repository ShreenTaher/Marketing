$(document).ready(function () {
    $.validator.setDefaults({
        submitHandler: function() {
            alert("submitted!");
        }
    });

});
