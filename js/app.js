$(document).foundation()
$(document).ready(function() {
    $('.delete-button').click(function() {
        var productId = $(this).data('product-id'); // obține ID-ul produsului
        $(this).closest('.panel').remove(); // șterge elementul panel al produsului
        // Aici poți adăuga și logica pentru ștergerea produsului din backend, dacă este necesar
        alert('Produsul ' + productId + ' a fost șters.');
    });
});
