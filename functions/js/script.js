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
            var selectedOption = (ID-1)
            var select = $('#' + opcion + '');
            if(select.prop) {
            var options = select.prop('options');
            }
            else {
            var options = select.attr('options');
            }
            $('option', select).remove();

            $.each(newOptions, function (val, text) {
                options[options.length] = new Option(text, val);
            });
            select.val(selectedOption);
            
        }
    );
}