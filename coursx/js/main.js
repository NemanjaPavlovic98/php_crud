// $('#btn').click(function () {
//     $('#pregled').toggle();
// });
$(document).ready(function(){

    $('#pregled').hide();

    $('#btn').click(function(){

        $('#pregled').toggle();

    });

});

$('#btn-obrisi').click(function () {
    const checked = $('input[name=checked-donut]:checked');

    request = $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: {'id': checked.val()}
    });

    request.done(function (response, textStatus, jqXHR) {
        if (response === 'Success') {
            checked.closest('tr').remove();
            alert('Kurs je obrisan');
            console.log('Obrisana');
        }
        else {
            console.log('Nije obrisana');
            alert('Kurs nije obrisan');
        }
        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });

    // request.always(function () {
    //     $inputs.prop('disabled', false);
    // });
});

$('#btnDodaj').submit(function () {
    $('#myModal').modal('toggle');
    return false;
});

$('#btnIzmeni').submit(function () {
    $('#myModal').modal('toggle');
    return false;
});

$('#dodajForm').submit(function () {
    event.preventDefault();
    console.log("Ovde");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serializedData = $form.serialize();
    console.log(serializedData);
    $inputs.prop('disabled', true);

    request = $.ajax({
        url: 'handler/add.php',
        type: 'post',
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR) {
        if (response === 'Success') {
            alert('Kurs je dodat');
            location.reload(true);
        }
        else console.log('Kurs nije dodat ' + response);
        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });
});

$('#btn-izmeni').click(function () {
    const checked = $('input[name=checked-donut]:checked');

    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: {'id': checked.val()},
        dataType: 'json'
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log('Popunjena');
        $('#nazivv').val(response[0]['naziv']);
        console.log(response[0]['naziv']);

        $('#provajdera').val(response[0]['provajder'].trim());
        console.log(response[0]['provajder'].trim());
        $('#cenaa').val(response[0]['cena'].trim());
        console.log(response[0]['cena'].trim());
        $('#opiss').val(response[0]['opis'].trim());
        console.log(response[0]['opis'].trim());
        $('#id').val(checked.val());s

        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });

});

$('#izmeniForm').submit(function () {
    event.preventDefault();
    console.log("Izmjene");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serializedData = $form.serialize();
    console.log(serializedData);
    $inputs.prop('disabled', true);

    request = $.ajax({
        url: 'handler/update.php',
        type: 'post',
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR) {


        if (response === 'Success') {
            console.log('Kurs je izmenjen');
            location.reload(true);
            //$('#izmeniForm').reset;
        }
        else console.log('Kurs nije izmenjen ' + response);
        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });


    //$('#izmeniModal').modal('hide');
});


function showSearch() {
    var x = document.getElementById('myInput');
    if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    };

  
