function generateBarcode(){
  var value = $("#barcodeValue").val();
  var btype = $("input[name=btype]:checked").val();
  var renderer = $("input[name=renderer]:checked").val();

var quietZone = false;
  if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
    quietZone = true;
  }

  var settings = {
    output:renderer
  };
  if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
    value = {code:value, rect: true};
  }
  if (renderer == 'canvas'){
    clearCanvas();

    $("#canvasTarget").show().barcode(value, btype, settings);
  } else {
    $("#canvasTarget").hide();
  }
}

function clearCanvas(){
  var canvas = $('#canvasTarget').get(0);
  var ctx = canvas.getContext('2d');
  ctx.lineWidth = 1;
  ctx.lineCap = 'butt';
  ctx.fillStyle = '#FFFFFF';
  ctx.strokeStyle  = '#000000';
  ctx.clearRect (0, 0, canvas.width, canvas.height);
  ctx.strokeRect (0, 0, canvas.width, canvas.height);
}

$(function(){
  $('input[name=btype]').click(function(){
    if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
  });
  $('input[name=renderer]').click(function(){
    if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
  });
  generateBarcode();
});

window.onload = function () {

  var c = document.getElementById("canvasTarget");
  document.getElementById('descargar').onclick = function(){

    let filename = prompt("Guardar como",""),
    link = document.createElement('a');

    if (filename == null){//si el usiario dio cancelar
      return false;
    }
    else if (filename == ""){//si el usuario le dio click y no puso nombre al archivo
      link.download = "Sin título";
      link.href = c.toDataURL("image/png");//usa la imagen del canvas
    }
    else{//si el usuario le dio aceptar y puso un nombre al archivo
      link.download = filename;
      link.href = c.toDataURL("image/png");
    }
    link.click();
  }
  //o puedes usar una minilibreria que hice https://www.lawebdelprogramador.com/codigo/JavaScript/4290-libreria-canvas-JavaScript.html

};
