function inputbackground() {
    $('#article').focus(function() { $(this).css('background', '#dddd88') } )
    $('#article') .blur(function() { $(this).css('background', '#ffffff') } )
    $('#price').focus(function() { $(this).css('background', '#dddd88') } )
    $('#price') .blur(function() { $(this).css('background', '#ffffff') } )
    $('#quantity').focus(function() { $(this).css('background', '#dddd88') } )
    $('#quantity') .blur(function() { $(this).css('background', '#ffffff') } )
}
