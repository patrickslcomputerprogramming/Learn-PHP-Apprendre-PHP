function inputbackground() {
    $('#inputfname').focus(function() { $(this).css('background', '#dddd88') } )
    $('#inputfname') .blur(function() { $(this).css('background', '#ffffff') } )
    $('#inputlname').focus(function() { $(this).css('background', '#dddd88') } )
    $('#inputlname') .blur(function() { $(this).css('background', '#ffffff') } )
}
