andiamo.controller('contactCtrl', function($scope, services, toastr){
	$scope.contact = {
        cname: "",
        cemail: "",
        matter: "",
        message: ""
    };
    
    $scope.SubmitContact = function () {
        var data = {"name": $scope.contact.cname, "email": $scope.contact.cemail, 
        "matter": $scope.contact.matter, "message": $scope.contact.message,"token":'contact_form'};
        var contact_form = JSON.stringify(data);
        console.log(contact_form);
        
        services.post('contact', 'send_contact', contact_form).then(function (response) {
            if (response == 'true') {
                    toastr.success('El mensaje ha sido enviado correctamente', 'Mensaje enviado',{
                    closeButton: true
                });
            } else {
                    toastr.error('El mensaje no se ha enviado', 'Mensaje no enviado',{
                    closeButton: true
                });
            }
        });
    };
});
