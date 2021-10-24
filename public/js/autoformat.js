function formatAsCnic(event) {

    var str = event.target.value;
    txt = str.replaceAll('-', '')

    if (txt.length > 12) {
        txt1 = txt.slice(0, 5)
        txt2 = txt.slice(5, 12)
        txt3 = txt.slice(12)
        formattedtxt = txt1 + "-" + txt2 + "-" + txt3;
        event.target.value = formattedtxt;
    } else if (txt.length > 5) {
        txt1 = txt.slice(0, 5)
        txt2 = txt.slice(5)
        formattedtxt = txt1 + "-" + txt2;
        event.target.value = formattedtxt;
    }
}

function formatAsPhone(event) {
    var str = event.target.value;
    txt = str.replaceAll('-', '')

    if (txt.length > 4) {
        txt1 = txt.slice(0, 4)
        txt2 = txt.slice(4)
        formattedtxt = txt1 + "-" + txt2;
        event.target.value = formattedtxt;
    }
}

function formatAsDate(event) {
    var str = event.target.value;
    txt = str.replaceAll('-', '')

    if (txt.length > 4) {
        txt1 = txt.slice(0, 2)
        txt2 = txt.slice(2, 4)
        txt3 = txt.slice(4)
        formattedtxt = txt1 + "-" + txt2 + "-" + txt3;
        event.target.value = formattedtxt;
    } else if (txt.length > 2) {
        txt1 = txt.slice(0, 2)
        txt2 = txt.slice(2)
        formattedtxt = txt1 + "-" + txt2;
        event.target.value = formattedtxt;
    }
}

function validateCnic(cnic) {
    var regex = /^\d{5}-\d{7}-\d{1}$/;
    return regex.test(cnic);
}

function validateDate(date) {
    var regex = /^\d{2}-\d{2}-\d{4}$/;
    return regex.test(date);
}