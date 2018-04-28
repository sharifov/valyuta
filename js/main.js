$('.cur-search input').keyup(function(){
  _v = $(this).val().trim();
  if(_v.length){
    $('.currency:not(.active)').hide();
    $('.currency:not(.active) .hide:contains("'+_v.toLowerCase()+'")').parent().show();
  }else{
    $('.currency:not(.active)').show();
  }
});


$('.sidebar .currenc').click(function(){
  _this = $(this);
  if(!_this.hasClass('active')){
    _this.css({position:'absolute', left: _this.position().left, 'top': _this.position().top});
    setTimeout(function(){
      _this.addClass('fly');
      setTimeout(function(){
        _this.removeAttr('style').prependTo('.currencies').removeClass('fly').addClass('active').find('input').removeAttr('disabled');
      }, 800);
      $('.sidebar').animate({scrollTop:0}, 800);
    }, 300);
  }else{
    _nextpos = $('.currency.active:last').position();
    _this.css({position:'absolute', left: _this.position().left, 'top': _this.position().top});
      _this.removeClass('active');
      setTimeout(function(){
        _this.css({left: _nextpos.left, 'top': _nextpos.top});
        setTimeout(function(){
            _this.removeAttr('style').insertAfter('.currency.active:last').find('input').attr('disabled', 'disabled');
        }, 800);
      }, 300);
  }
});


$('.currency input').on('keypress mouseup mouseover mouseenter select focus focusin', function(e){
  console.log(e);

  alert('sdsds');
  return false;
});

$('.currency input').keyup(function(e){
  _p = $(this).parent();
 console.log('in here');
  if(!_p.hasClass('active')){
  //  _p.trigger('click');
  }
});
