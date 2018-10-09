jQuery(document).ready(function() {
$('form') .on ('submit', function(e) {
   e.preventDefault();
   var forma =$(this);
   var url =forma.attr ('action');
   var vars =forma.serializer();
   $.post(url, vars, function (resp) {
    if (resp.indexoOf ('error')<0) {
        window.location = 'sistema.php';
    } else {
        alert(resp);
    }
   });
   });
});