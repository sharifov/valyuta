$('.cur-search input').keyup(function(){
  _v = $(this).val().trim();
  if(_v.length){
    $('.currency:not(.active)').hide();
    $('.currency:not(.active) .hide:contains("'+_v.toLowerCase()+'")').parent().show();
  }else{
    $('.currency:not(.active)').show();
  }
});

$('.sidebar .currency').click(function(){
  _this = $(this)
  _this.css({position:'absolute', left: _this.position().left, 'top': _this.position().top});
  setTimeout(function(){
    _this.addClass('fly');
    setTimeout(function(){
      _this.removeAttr('style');
      _this.prependTo('.currencies');
    }, 800);
  }, 800);
  //$(this).addClass('active');
});
