require(['jquery', 'mage/translate'],function($){
    $(document).ready(function() {
        $( "input[type='password']" ).after(
          function() {
            return "<span toggle='#"+this.id+"' class='eye-open field-icon toggle-password'></span>"
          });
        $(document).on('click', '.toggle-password' , function() {
            $(this).toggleClass("eye-open");
            $(this).toggleClass("eye-close");
              var input = $($(this).attr("toggle"));
              if (input.attr("type") == "password") {
              input.attr("type", "text");
              $(this).attr("title", $.mage.__('Hide Password'));
              } else {
              input.attr("type", "password");
              $(this).attr("title", $.mage.__('Show Password'));
            }
        });
    });
});