$(document).ready(function () {
    $.post(amigable("?module=home&function=dropdown_types"), {"dropdown_types":true}, function (data) {
        var json = JSON.parse(data);
        var $cboTypes = $("#cboTypes");
        $cboTypes.empty();
        $cboTypes.append("<option>Tipo</option>");
        $.each(json, function(index, types) {
            $cboTypes.append("<option>" + types.type + "</option>");
        });
    });

    $.post(amigable("?module=home&function=show_travels"), function (data) {
        var json = JSON.parse(data);
        console.log(json);
        $.each(json, function(index, list) {
            var data_list = "<figure class='block-4-image'>" +
                "<img src='http://localhost/www/FW_PHP_OO_MVC_JQUERY/Andiamo/view/assets/images/" + list.img + "' alt='Image placeholder' class='img-fluid'>" +
              "</figure>" +
              "<div class='block-4-text p-4'>" +
                "<h3><a href='#'>" + list.country + "</a></h3>" +
                "<p class='mb-0'>" + list.destination + "</p>" +
                "<p class='text-primary font-weight-bold'>" + list.price + "€</p>" +
                "<button id=" + list.id + " class='btn InsertCarr btn-success'>Add<span class='icon icon-shopping_cart'></span></button>" +
                "<a id=" + list.id + " class='sumlike btn text-white btn-info'>Like</a>" +
              "</div>";
          $("#travels").append(data_list);
      });
    });

    $("#cboTypes").change(function() {
        var uni = $(this).val(); 
        //console.log(uni);
        $.post(amigable("?module=home&function=dropdown_country"),{"uni":uni}, function (data) {
            var json = JSON.parse(data);
            var $cboCountry = $("#cboCountry");
            $cboCountry.empty();
            $cboCountry.append("<option>Country</option>");
            $.each(json, function(index, countries) {
                $cboCountry.append("<option>" + countries.country + "</option>");
            });
        });
        $('#service').keyup(function(){
            var country = document.getElementById('cboCountry').value;
            //console.log(tipo); 
            var service = $(this).val();    
            var types = uni;
            var dataString = {"service": service, "types":types, "country":country};
            // console.log(dataString);
            // var country = service; 
            $.ajax({
                type: "POST",
                url: amigable("?module=home&function=autocomplete"),
                data: dataString,
                success: function(data) {
                    // console.log(data);
                    $('#suggestions').fadeIn(1000).html(data);
                    $('.suggest-element').on('click', function(){
                        var id = $(this).attr('id');
                        $('#service').val($('#'+id).attr('data'));
                        $('#suggestions').fadeOut(1000);
                        //window.location.href = 'index.php?page=controller_shop&op=redi';
                        var destination = document.getElementById('service').value;
                        //console.log(city);
                        // $().redirect(amigable("?module=shop&function=redirect"), {"uni":uni, "country":country, "destination":destination});
                        // $.post(amigable("?module=shop&function=redirect"),{"uni":uni, "country":country, "destination":destination})
                        var search = [uni, country, destination];
                        window.location.href = amigable("?module=shop&function=redirect&aux=" + search);
                    });
                }
            });
        });
    });
});