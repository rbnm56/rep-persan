function valores(consulta, opcion, ID) {
    var cons = consulta;
    var result = new Object();
    var opcion = opcion;
    var ID = ID;
    $.post("dist/db/consultas.php", {
        funcion: cons,
    },
        function (data) {
            // PARSE json data
            result = JSON.parse(data);
            var newOptions = result.nombre;
            var selectedOption = (ID)
            var select = $('#' + opcion + '');
            if(select.prop) {
            var options = select.prop('options');
            }
            else {
            var options = select.attr('options');
            }
            $('option', select).remove();
            var i = 0;
            $.each(newOptions, function (val, text) {
                options[options.length] = new Option(text, result.id[i]);
                i++;
            });
            select.val(selectedOption);
            
        }
    );
}