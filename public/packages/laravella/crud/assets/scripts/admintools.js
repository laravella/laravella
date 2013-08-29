//required by laravella admin

$(function() {    
    $('#msg-alert').fadeOut(4000);
});

function alertBox(message) {
    $(".alert").alert();
}

function debugBox() {
    $('.alert-debug').show();
    $('.alert-debug').css('opacity', '1');
}

function logBox() {
    $('.alert-log').show();
    $('.alert-log').css('opacity', '1');
}

function sendSearch() {
    var qString = "";
    var qA = new Object();
    var comma = '';
    var table = '';
    var field = '';
    //turn the search form into JSON
    $('.formfield').each(function(index) {
        table = $(this).attr('data-table');
        if (qA[table] == null || qA[table] == 'undefined' || !qA[table]) {
            qA[table] = new Object();
        }
        if ($(this).val().length > 0) {
            field = $(this).attr('name');
            qString += comma + '"' + $(this).attr('name') + '" : "' + $(this).val() + '"';
            qA[table][field] = $(this).val();
            comma = ',';
        }
    });
    qString = JSON.stringify(qA);
    window.location.href = "/db/search/" + table + "/" + qString;
}

function sendDelete() {
    var recNo = null;
    var tableName = null;
    $('a.record.active').each(function(index) {
        console.log($(this).attr('id'));
        tableName = $(this).attr('data-tablename');
        console.log(tableName);
        recNo = $(this).attr('data-recordid');
        console.log(recNo);

        console.log('/dbapi/delete/' + tableName + '/' + recNo);

        $.get('/dbapi/delete/' + tableName + '/' + recNo, '', function(data) {
            $('#tr-' + tableName + '-' + recNo).remove();
            //console.log(data);
        });

        /*
         $.ajax({
         data: encodeURIComponent(data),
         type: "GET",
         url: '/dbapi/delete/'+tableName+'/'+recNo,
         timeout: 20000,
         contentType: "application/x-www-form-urlencoded;charset=utf-8",
         dataType: 'json',
         success: function(data) {console.log(data);}
         });        
         */

    });
}

function checkRec(recNo) {
    $('#chkico_' + recNo).toggleClass('icon-ok-sign');
    $('#chkico_' + recNo).toggleClass('icon-ok-circle');
}

function saveRec(tableName, recNo) {
//        alert(tableName + " : " + recNo);

    var qA = new Object();
    //qA[tableName] = new Object();

    $(".fld-" + tableName + "-" + recNo).each(function(index, element) {

        //var table = $(this).attr('data-tablename');
        var record = $(this).attr('data-recordid');
        var fieldName = $(this).attr('data-fieldname');
        var value = $(this).val();

        qA[fieldName] = value;
        //console.log(tableName + fieldName + value);

    });
    var data = JSON.stringify(qA);
    console.log(data);

    $.ajax({
        data: encodeURIComponent(data),
        type: "POST",
        url: '/db/edit/' + tableName + '/' + recNo,
        timeout: 20000,
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        dataType: 'json',
        success: function(data) {
            console.log(data);
        }
    });

    //$.post('/db/edit/'+tableName+'/'+recNo, 'data='+encodeURIComponent(data), function(data) {console.log(data);}, 'json');

}
