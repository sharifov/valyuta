getValue = function(a, v, t){
    return (a*(v/t)).toFixed(2);
};

focusEnd = function(elem) {
  elem = elem[0];
  let elemLen = elem.value.length;
  if (document.selection) {
    elem.focus();
    let oSel = document.selection.createRange();
    oSel.moveStart('character', -elemLen);
    oSel.moveStart('character', elemLen);
    oSel.moveEnd('character', 0);
    oSel.select();
  }
  else if (elem.selectionStart || elem.selectionStart == '0') {
    elem.selectionStart = elemLen;
    elem.selectionEnd = elemLen;
    elem.focus();
  }
}

getCookie = function(k) {
    let n = k + "=";
    let ca = document.cookie.split(';');
    for(i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(n) == 0) {
            return c.substring(n.length, c.length);
        }
    }
    return "";
};

saveCookie = function(k, v, n=1){
	let d = new Date();
	d.setTime(d.getTime() + (n*24*60*60*1000));
    let e = "expires="+ d.toUTCString();
    document.cookie = k + "=" + v + ";" + e + ";path=/";
}

setCookie = function(k, v) {
    let g=getCookie(k), r = g.split(',');
	if(!g) r = [v];
	else r.push(v);
	saveCookie(k, r);
};

deleteCookie = function(k, v) {
    let g = getCookie(k).split(','), i = g.indexOf(v);
	if( i != -1){
		g.splice(i,1);
		saveCookie(k, g);
	}
};

$('.cur-search input').keyup(function(){
  _v = $(this).val().trim();
  if(_v.length){
    $('.currency:not(.active)').addClass('no-visible');
    $('.currency:not(.active).no-visible .hide:contains("'+_v.toLowerCase()+'")').parent().removeClass('no-visible');
  }else{
    $('.currency:not(.active)').removeClass('no-visible');
  }
});


$('.sidebar .currency').click(function(e){
  if($(e.target).is('input:not(:disabled)')) return;
  _this = $(this);
  _cur = _this.find('img + span').text().toLowerCase();
  if(!_this.hasClass('active')){
    let _effect = _this.prev().is('.convert')?false:true;
    if(_effect)
      _this.css({position:'absolute', left: _this.position().left, 'top': _this.position().top});
    setTimeout(function(){
      if(_effect) _this.addClass('fly');
      setCookie('sess', _cur);
      if(_effect)
        setTimeout(function(){
          _this.removeAttr('style').insertAfter('.sidebar .currency.convert').removeClass('fly').addClass('active').find('input').removeAttr('disabled');
        }, 800);
      else _this.addClass('active').find('input').removeAttr('disabled');

      let _cv = $('.sidebar .currency.convert');
      _this.find('input').val(getValue(_cv.find('input').val(), _this.data('currency'), _cv.data('currency')));
      if(_effect) $('.sidebar').animate({scrollTop:0}, 800);
      focusEnd(_cv.find('input'));
    }, 300);
  }else{
	  deleteCookie('sess', _cur);
      _nextpos = $('.currency.active:last').position();
      _this.css({position:'absolute', left: _this.position().left, 'top': _this.position().top});
      _this.removeClass('active');
      setTimeout(function(){
        _this.css({left: _nextpos.left, 'top': _nextpos.top});
        setTimeout(function(){
            _this.removeAttr('style').insertAfter('.currency.active:last').find('input').attr('disabled', 'disabled').val(0);
            focusEnd($('.sidebar .currency.active:first input'));
        }, 800);
      }, 300);
  }
});


$('.currency input').keyup(function(e){
    let _a = parseFloat($(this).val().trim()),
        _p = $(this).parent(),
        _v = _p.data('currency'),
        _fl = $(this).siblings('span:first').text().toLowerCase();
    if(isNaN(_a)) _a = 0;
    $('.currency').each(function(){
        $(this).removeClass('convert');
        $('.to', this).attr('src', '/flags/'+_fl+'.png');
    });
    _p.addClass('convert');

    if(_p.index()){
      _p.prependTo('.currencies');
      focusEnd($(this));
    }

    $('.currency.active').not(_p).each(function(){
      $('input', this).val(getValue(_a, $(this).data('currency'), _v));
    });
});
