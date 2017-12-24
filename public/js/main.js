document.addEventListener("DOMContentLoaded", function(event) {

    var comenzi_inregistrate = document.getElementById('comenzi-inregistrate');
    var categorii = document.getElementById('categorii');
    var marimi = document.getElementById('marimi');
    var produse = document.getElementById('produse');
    var culori = document.getElementById('culori');

    comenzi_inregistrate.addEventListener('click', function() {
        $case = document.getElementById('comenziInregistrate').style.display;
        switch($case)
        {
            case 'none':
                document.getElementById('comenziInregistrate').style.display = 'block';
                break;
            case 'block':
                document.getElementById('comenziInregistrate').style.display = 'none';
                break;
            default:
                console.log('eyyy');

        }
    });
});
