$(document).ready(function () {
    var keysContainer = $('#keys');
    var keySelectForm = keysContainer.find('#key-select-form');
    var databaseSelect = keysContainer.find('#database-select');
    var limitSelect = keysContainer.find('#limit-select');
    var ajaxSpinner = $('#ajaxSpinner');
    var body = $('body');
    keySelectForm.submit(function (e) {
        var formData = $(this).serialize();
        var formUrl = $(this).attr('action');
        ajaxSpinner.show();
        $('#keyValues').load(formUrl + '?' + formData, function () {
            ajaxSpinner.hide();
            $('#searchPattern').focus();
        });
        e.preventDefault();
    });

    databaseSelect.find('a').click(function () {
        var database = $(this).data('database');
        var searchRegExp = new RegExp(/\/database\/\d+\//);
        var newAction = keySelectForm.attr('action').replace(searchRegExp, '/database/' + database + '/');
        keySelectForm.attr('action', newAction);
        keysContainer.find('#current-db').html($(this).html());
        keySelectForm.submit();
    });

    limitSelect.find('a').click(function () {
        var limit = $(this).data('limit');
        keySelectForm.find('input[name="limit"]').val(limit);
        keysContainer.find('#current-limit').html($(this).html());
        keySelectForm.submit();
    });

    $('[data-toggle="tooltip"]').tooltip();

    body.on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

    body.on('click', '[data-toggle="modal"]', function () {
        $($(this).data("target") + ' .modal-content').load($(this).attr("href"));
    });

    keySelectForm.submit();
});
