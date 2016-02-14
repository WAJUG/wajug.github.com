function switchSlide(){
  if(jQuery('.switchSlideInput').is(':checked')){
    jQuery('#acf_37 #acf-field-active-slide-1').trigger('click');
    jQuery('#acf_37').css('display', 'block');
  }else{
    jQuery('#acf_37 #acf-field-active-slide-1').trigger('click');
    jQuery('#acf_37').css('display', 'none');
  }
}

jQuery(document).ready(function(){
  jQuery('#acf_37 #acf-active-slide').css({
    'height'       : '0',
    'padding'      : '0',
    'margin-bottom': '-12px',
    'visibility'   : 'hidden'
  });

  if(jQuery('#acf_37 #acf-field-active-slide-1').is(':checked')){
    jQuery('<label><input class="switchSlideInput" onchange="switchSlide()" type="checkbox" checked="checked">Activer le slider</label>').insertBefore('#adv-settings .metabox-prefs .clear');
  }else{
    jQuery('<label><input class="switchSlideInput" onchange="switchSlide()" type="checkbox">Activer le slider</label>').insertBefore('#adv-settings .metabox-prefs .clear');
    jQuery('#acf_37').css('display', 'none');
  }
});