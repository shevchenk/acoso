<script type="text/javascript">
var redimensionG = {
    validar: ()=> {
      $("#navValidation").hide();
      $("#navbarSite").removeClass('show');
    }
}

$(window).resize( ()=> {
    redimensionG.validar();
});

$(document).ready( ()=> {
    $("#navValidation").hide();
    $("[disabled]").addClass("disabled");
    masterG.tooltip();
    const swalWithBootstrapButtons = Swal.mixin({
        
    })

    $('#navbarSite').on('shown.bs.collapse', ()=> {
        $("#navValidation").show();
    });

    $('#navbarSite').on('hidden.bs.collapse', ()=> {
        $("#navValidation").hide();
    });

    var validarutaurlm="<?php echo @$valida_ruta_url; ?>";
    if( validarutaurlm=="acceso.index" ){
      msjG.alert('success','Bienvenido',3000);
    }

    $('.site-menu > li.site-menu-item').each( (indice, elemento)=> { //Selecciona el menú activo sin responsivo
        htm=$(elemento).html();
        if( htm.split('<a href="'+validarutaurlm+'"').length > 1 ){
            $(elemento).addClass('active');
        }
    });

    $('.navbar-nav > li.nav-item').each( (indice, elemento)=> { //Selecciona el menú activo responsivo
        htm=$(elemento).html();
        if( htm.split('<a href="'+validarutaurlm+'"').length > 1 ){
            $(elemento).addClass('active');
        }
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var masterG = {
    hoy: ()=>{
      return "<?php echo date("Y-m-d"); ?>";
    },
    tooltip: ()=> {
      $(".tooltip").remove();
      $('[data-toggle="tooltip"]').tooltip();
      $( ".btn" ).mouseleave( ()=> {
          $(".tooltip").remove();
      });
    },
    postAjax: (url,data,eventsucces,eventbefore,async)=> {
      var idajax = Date.now();
      if( typeof async== 'undefined' ){
            async=true;
      }
      $.ajax({
            url         : url,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : data,
            async       : async,
            beforeSend : ()=> {
                if( typeof eventbefore!= 'undefined' && eventbefore!=null){
                  eventbefore();
                }
            },
            success : (r)=> {               
                if( typeof eventsucces!= 'undefined' && eventsucces!=null){
                  eventsucces(r);
                }
            },
            error: (result)=> {
              masterG.overlayG();
              console.log(result);
                if( typeof(result.status)!='undefined' && result.status==401 && result.statusText=='Unauthorized' ){
                    msjG.alert('warning', 'Su sesión a caducado', 4000 );
                }
                else if( typeof(result.status)!='undefined' && result.status==422 && result.statusText=='Unprocessable Entity' ){
                    msjG.alert('warning','Usuario o Password Inválido',4000);
                }
                else if( typeof(result.status)!='undefined' && result.status==419 && result.responseJSON.message=='CSRF token mismatch.' ){
                    msjG.alert('warning','Token vencido ó inválido, refrescar la página',4000);
                }
                else{
                    msjG.alert('error', 'Intente nuevamente, si el error persiste comunicarse con el Administrador del sistema', 4000 );
                }
            }
        });
    },
    overlayG: (v)=>{
      if( typeof v!= 'undefined' && v==true ){
        //overlay open
        $(".panel").append(
          '<div class="panel-loading">'+
            '<div class="loader loader-default"></div>'+
          '</div>').addClass('is-loading');
      }
      else{
        //overlay close
        $(".panel .panel-loading").remove();
        $(".panel").removeClass('is-loading');
      }
    },
    enterGlobal: (e,etiqueta,selecciona)=> {
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==13){
            e.preventDefault();
            $(etiqueta).click(); 
            if( typeof(selecciona)!='undefined' ){
                $(etiqueta).focus(); 
            }
        }
    },
    validaNumerosMax: (e,t,max)=> {
        tecla = (document.all) ? e.keyCode : e.which;//captura evento teclado
        if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
        if(t.value.length>=max)return false;
        patron = /\d/; // Solo acepta números
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    },
    validaLetras: (e)=> {
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
        patron =/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]/; // 4 ,\s espacio en blanco, patron = /\d/; // Solo acepta números, patron = /\w/; // Acepta números y letras, patron = /\D/; // No acepta números, patron =/[A-Za-z\s]/; //sin ñÑ
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
    },
    validaAlfanumerico: (e)=> {
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8 || tecla==0 || tecla==46) return true;//8 barra, 0 flechas desplaz
        patron =/[A-Za-zñÑáéíóúÁÉÍÓÚ@.,_\-\s\d]/; // 4 ,\s espacio en blanco, patron = /\d/; // Solo acepta números, patron = /\w/; // Acepta números y letras, patron = /\D/; // No acepta números, patron =/[A-Za-z\s]/; //sin ñÑ
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
    },
    validaNumeros: (e,t,tipo)=> {
        tecla = (document.all) ? e.keyCode : e.which; // 2
        valida=t.value.substring(0,2);
        if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
        if( tipo=='ruc' ){
          if( (valida.length==0 && (tecla!=50 && tecla!=49 )) || (valida.length==1 && tecla!=48) ){
            return false;
          }
        }
        patron = /\d/; // Solo acepta números
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
    },
    validaDecimal: (e,t)=> {
        tecla = (document.all) ? e.keyCode : e.which; // 2
        pos=t.value.indexOf('.');
        if ( pos!= -1 && tecla == 46 ) return false;// Valida si se registro nuevament el
        if ((tecla == 8 || tecla == 0 || tecla == 46)) return true;
        if (tecla <= 47 || tecla >= 58) return false;
        patron = /\d/; // Solo acepta números
        te = String.fromCharCode(tecla); // 5
        return patron.test(te);
    },
    DecimalMax: (t,n)=> {
        pos=t.value.indexOf('.');
        if( pos!= -1 && t.value!='' && t.value.substring(pos+1).length>=2 ){
          t.value = parseFloat(t.value).toFixed(n);
        }
    },
    Limpiar: (t,v)=> {
        if( $.trim(v)=='' ){
            $(t).val('');
        }
    },
    Eliminar: (t)=> {
        $(t).remove();
    },
    SelectImagen: (archivo,src,carga)=> {
      if( $.trim(archivo)!='' && archivo.substr(-3)=='pdf' ){
        $(src).attr('src','Config/pdf.jpg');
      }
      else if( $.trim(archivo)!='' && (archivo.substr(-4)=='docx' || archivo.substr(-3)=='doc') ){
        $(src).attr('src','Config/word.png');
      }
      else if( $.trim(archivo)!='' && (archivo.substr(-4)=='xlsx' || archivo.substr(-3)=='xls' || archivo.substr(-3)=='csv') ){
        $(src).attr('src','Config/excel.jpg');
      }
      else if( $.trim(archivo)!='' && (archivo.substr(-4)=='pptx' || archivo.substr(-3)=='ppt') ){
        $(src).attr('src','Config/ppt.png');
      }
      else if( $.trim(archivo)!='' && archivo.split('.txt').length > 1 ){
        $(src).attr('src','Config/txt.jpg');
      }
      else{
        if( $.trim(archivo)=='' ){
            $(src).attr('src','Config/default.png');
        }
        else{
            $(src).attr('src',archivo);
        }
      }
        $(carga).removeAttr('href').removeAttr('target');
        if( $.trim(archivo)!='' ){
          $(carga).attr('href',archivo).attr('target','_blank');
        }
    },
    onImagen: (ev,nombre,archivo,src)=> {
        var files = ev.target.files || ev.dataTransfer.files;
        if (!files.length)
            return;
        var image = new Image();
        var reader = new FileReader();
        reader.onload = (e) => {
            $(archivo).val(e.target.result);
            if(files[0].name.substr(-3)=='pdf'){
              $(src).attr('src','Config/pdf.jpg');
            }
            else if(files[0].name.substr(-4)=='docx' || files[0].name.substr(-3)=='doc'){
              $(src).attr('src','Config/word.png');
            }
            else if(files[0].name.substr(-4)=='xlsx' || files[0].name.substr(-3)=='xls' || files[0].name.substr(-3)=='csv'){
              $(src).attr('src','Config/excel.jpg');
            }
            else if(files[0].name.substr(-4)=='pptx' || files[0].name.substr(-3)=='ppt'){
              $(src).attr('src','Config/ppt.png');
            }
            else if(files[0].name.split('.txt').length > 1){
              $(src).attr('src','Config/txt.jpg');
            }
            else{
              $(src).attr('src',e.target.result);
            }
            $(src).fadeOut(1000,function(){
                $(src).fadeIn(1800);
            });
        };
        reader.readAsDataURL(files[0]);
        $(nombre).val(files[0].name);
        console.log(files[0].name);
    },
    CargarPaginacion:function(HTML,ajax,result,id){
        var html='<ul class="pagination">';
        if( result.current_page==1 ){
            html+=  '<li class="paginate_button page-item previous disabled">'+
                        '<a class="page-link">Atras</a>'+
                    '</li>';
        }
        else{
            html+=  '<li class="paginate_button page-item previous" onClick="'+ajax+'('+HTML+','+(result.current_page-1)+');">'+
                        '<a class="page-link">Atras</a>'+
                    '</li>';
        }
        var ini=1; var fin=result.last_page;
        if( result.last_page>5 ){
            if( result.last_page-3<=result.current_page ){
                ini=result.last_page-4;
            }
            else if( result.current_page<5 ){
                fin=5;
            }
            else{
                ini=result.current_page-1;
                fin=result.current_page+1;
            }
        }

        if( (ini>1 && result.current_page>4) || (result.last_page-3<=result.current_page && result.current_page<=4 && ini>1) ){
            html+=  '<li class="paginate_button page-item" onClick="'+ajax+'('+HTML+',1);">'+
                        '<a class="page-link">1</a>'+
                    '</li>';
            html+=  '<li class="paginate_button page-item disabled"><a class="page-link">…</a></li>';
        }
        for(i=ini; i<=fin; i++){
            if( i==result.current_page ){
                html+=  '<li class="paginate_button page-item active">'+
                            '<a class="page-link">'+i+'</a>'+
                        '</li>';
            }
            else{
                html+=  '<li class="paginate_button page-item" onClick="'+ajax+'('+HTML+','+i+');">'+
                            '<a class="page-link">'+i+'</a>'+
                        '</li>';
            }
        }
        if( fin>=5 && result.last_page>5 && result.last_page-3>result.current_page){
            html+=  '<li class="paginate_button page-item disabled"><a class="page-link">…</a></li>';
            html+=  '<li class="paginate_button page-item" onClick="'+ajax+'('+HTML+','+result.last_page+');">'+
                        '<a class="page-link">'+result.last_page+'</a>'+
                    '</li>';
        }

        if( result.current_page==result.last_page ){
            html+=  '<li class="paginate_button page-item next disabled">'+
                        '<a class="page-link">Siguiente</a>'+
                    '</li>';
        }
        else{
            html+=  '<li class="paginate_button page-item next" onClick="'+ajax+'('+HTML+','+(result.current_page*1+1)+');">'+
                        '<a class="page-link">Siguiente</a>'+
                    '</li>';
        }
        html+='</ul>';

        $(id).append(html);
    },
    DatosConfig: ( datos )=> {
      var colores = [ '#589ffc','#28d17c','#f57d1b','#9e9e9e','#ff5e97','#28c0de','#ffdc2e','#76838f','#a57afa','#28c7b7','#ff666b','#7d8efa','#7eb524','#ab8c82' ];
      var aux_colores = [];
      for(i=0; i < datos.data.length; i++){
        aux_colores.push( colores[ i % colores.length] );
      }

      if( typeof datos.display == 'undefined' ){
        datos.display = false;
        datos.text = '';
      }
      
      var config = {
        type: datos.type,
        data: {
          datasets: [{
            data: datos.data,
            backgroundColor: aux_colores,
            label: ''
          }],
          labels: datos.labels
        },
        options: {
          responsive: true,
          legend: {
            position: datos.position,
          },
          title: {
            display: datos.display,
            text: ''
          },
          animation: {
            animateScale: true,
            animateRotate: true
          }
        }
      };
    
      return config;
    },
}

var msjG ={
    alert: (icon, title, time)=> {
        btn=icon;
        if( icon=='error' ){ btn='danger'; }
        
        Swal.fire({
          icon: icon,
          title: title,
          showConfirmButton: false,
          timer: time,
          //showCloseButton: true,
          showClass: {
            popup: 'animated fadeInDown faster'
          },
          hideClass: {
            popup: 'animated fadeOutUp faster'
          },
          footer: '<button type="button"class="btn btn-lg btn-'+btn+' btn-round" onClick="Swal.close();">Ok</button></div>'
        });
    },
    question: (title, question, fn)=> {
        Swal.fire({
          icon: 'warning',
          title: title,
          html: question,
          showClass: {
            popup: 'animated fadeInDown faster'
          },
          hideClass: {
            popup: 'animated fadeOutUp faster'
          },
          showCancelButton: true,
          confirmButtonText: 'SI',
          cancelButtonText: 'NO',
          reverseButtons: true,
          customClass: {
            confirmButton: 'btn btn-lg btn-success btn-round col-4',
            cancelButton: 'btn btn-lg btn-warning btn-round col-4 mr-20'
          },
          allowEscapeKey: false,
          allowOutsideClick: false,
          buttonsStyling: false,
        }).then((result) => {
            if (result.value) {
              fn();
            }
        });
    }
}
</script>
