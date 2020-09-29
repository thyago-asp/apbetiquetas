$("#btn_add_carrinho").click(function (event) {
    var button = $(event.target) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    
    console.log(event)
});