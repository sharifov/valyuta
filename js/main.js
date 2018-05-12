getValue = function(a, v, t){
    return (a*(v/t)).toFixed(2);
};

$('.cur-search input').keyup(function(){
  _v = $(this).val().trim();
  if(_v.length){
    $('.currency:not(.active)').hide();
    $('.currency:not(.active) .hide:contains("'+_v.toLowerCase()+'")').parent().show();
  }else{
    $('.currency:not(.active)').show();
  }
});


$('.sidebar .currency').click(function(e){
  if($(e.target).is('input:not(:disabled)')) return;
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
            _this.removeAttr('style').insertAfter('.currency.active:last').find('input').attr('disabled', 'disabled').val(0);
            $('.sidebar .currency.active:first input').trigger('focus');
        }, 800);
      }, 300);
  }
});


$('.currency input').keyup(function(e){
    let _a = parseFloat($(this).val()),
        _p = $(this).parent(),
        _v = _p.data('currency'),
        _fl = $(this).siblings('span:first').text().toLowerCase();
    $('.currency').each(function(){
        $(this).removeClass('convert');
        $('.to', this).attr('src', '/flags/'+_fl+'.png');
    });
    _p.addClass('convert');

    if(_p.index()){
      _p.prependTo('.currencies');
      $(this).trigger('focus');
    }

    $('.currency.active').not(_p).each(function(){
      $('input', this).val(getValue(_a, $(this).data('currency'), _v));
    });
});
