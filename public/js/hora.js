(function($){
  $.fn.jTime = function(o) {
    var d = {x:'time-capa',ma:new Date(),i:0};
    var o = $.extend(d, o);
    o.ma = new Date(o.ma);
    
    var mHF = function (){
      var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      var dias = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");  
      
      var ma = new Date(o.ma.getTime() + o.i * 1000);
      Nombredia  = dias[ma.getDay()];
      dia  = ma.getDate();
      mes  = meses[ma.getMonth()];
      ano  = ma.getFullYear()
      h    = ma.getHours();
      m    = ma.getMinutes();
      s    = ma.getSeconds(); 
      if (h<=9) h = '0'+h;
      if (m<=9) m = '0'+m;
      if (s<=9) s = '0'+s;
      hi = Nombredia + ", " + dia + " " + mes + " del " + ano + " , "+ h + ":" + m;
      $('#'+o.x).html(hi); 
      o.i += 1;   
    }
    return this.each(function(){
      o.x = $(this).attr('id');
      setInterval(mHF,1000);     
    });
};
})(jQuery);