$(document).ready(function () {

    // PROFILE
    $('.profile-edit-show').click(function () {
        $('#profile-edit-form').show();
        $('.profile-edit-show').hide();
    });
    $('#profile-edit-form button.cancel').click(function () {
        $('#profile-edit-form').hide();
        $('.profile-edit-show').show();
    })

    // SELECT MULTIPLE
    var last_valid_selection = null;

    $('select.custom-select').change(function (event) {

        console.log($(this).val());
        $(this).val().forEach(element => {
            if (!element) {
                $(this).val([""]);
                last_valid_selection = null;
            }
        });

        if ($(this).val().length > 3) {
            $(this).val(last_valid_selection);
        } else {
            last_valid_selection = $(this).val();
        }
    });

    // CREATE CAMPAIGN SLIDERS
    $('#required_workers input[type="range"]').val(0);
    $('#required_workers small').text(0);
    $('#required_workers input[type="range"]').on('input', function () {
        $('#required_workers small').text($(this).val());
    })

    $('#threshold_percentage input[type="range"]').val(0);
    $('#threshold_percentage small').text(0 + ' %');
    $('#threshold_percentage input[type="range"]').on('input', function () {
        $('#threshold_percentage small').text($(this).val() + ' %');
    })

    // CREATE TASK OPTIONS
    $('#task-option-button').click(function () {
        var name = $('#task-option-input').val();
        if (!name) return;
        $('#task-option-input').val("");
        var optionsValue = JSON.parse($('input[type="hidden"][name="options"]').val());
        optionsValue.push(name);
        $('input[type="hidden"][name="options"]').val(
            JSON.stringify(optionsValue)
        );
        var option = $(`
            <li class="list-group-item d-flex justify-content-between align-items-center">
                ${name}
                <span class="badge badge-danger badge-pill" style="cursor: pointer">X</span>
            </li>
        `);
        $('#options-list').append(option);
        option.children('span').click(function () {
            var name = $(this).parent().clone()    //clone the element
                .children() //select all the children
                .remove()   //remove all the children
                .end()  //again go back to selected element
                .text()
                .trim();
            $(this).parent().remove();
            var optionsValue = JSON.parse($('input[type="hidden"][name="options"]').val());
            if (optionsValue.length) {
                optionsValue.splice(optionsValue.indexOf(name), 1);
                $('input[type="hidden"][name="options"]').val(
                    JSON.stringify(optionsValue)
                );
            }
        })
    })
    $('#create-task-form').submit(function (e) {
        if (JSON.parse($('input[type="hidden"][name="options"]').val()).length < 2) {
            e.preventDefault();
            alert('Need at least 2 option');
        }
    });
})