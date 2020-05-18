var actualNumber = 0
const url = new URL(window.location.href);                   // get back the id of student that was in the url
const params = new URLSearchParams(url.search);                
const mangaId = params.get('mangaId');                  
const tomeId = params.get('tomeId');    



$(document).ready(function () {

    // Page suivante du lecteur de manga
     
    $(document).on('click','.btn-next',function (e) {
        e.preventDefault()
        actualNumber = actualNumber + 1; 
         $.post("index.php?content=read&mangaId="+mangaId+"&tomeId="+tomeId, {
             incresedNumber : actualNumber 
             
         },
         
         function(data, status) {

            var src = $(data).find('.img-reader').attr('src')
            $('.img-reader').attr('src' , src)
             
      //      $('html').html(data)
            $('select').formSelect();
            })
        
    })

    // Page precedente du lecteur de manga

    $(document).on('click','.btn-remove',function (e) {
        e.preventDefault() 
        
        actualNumber = actualNumber - 1; 
         $.post("index.php?content=read&mangaId="+mangaId+"&tomeId="+tomeId, {
             decreasedNumber : actualNumber 
             
         },
         function(data, status) {
            
            var src = $(data).find('.img-reader').attr('src')
            $('.img-reader').attr('src' , src)
            $('select').formSelect();
        

         })
        
    })

    $(document).on('change','#chapitre-select',function (e) {
      var id =   $('#chapitre-select').val();
        console.log(id)
        $.post("index.php?content=read&mangaId="+mangaId+"&tomeId="+id, {
            tomeSelectedId : id 
            
        },
        function(data, status) {
            $('html').html(data)
            
            console.log(id)
            window.location = "index.php?content=read&mangaId="+mangaId+"&tomeId="+id
        })
        
    })

    $(document).on('click','.select-dropdown',function (e) {
        $('.select-dropdown').addClass('testage')
        $('.select-dropdown').css('display','')
        $('.select-dropdown').css('width','')
        $('.select-dropdown').css('left','')
        $('.select-dropdown').css('top','')
        $('.select-dropdown').css('height','')
        $('.select-dropdown').css('transform-origin','0px 0px 0px')
        $('.select-dropdown').css('opacity','')
        $('.select-dropdown').css('transform','')
        $('.testage').css('display','block')
        $('.testage').css('width','496.8px')
        $('.testage').css('left',' 0px')
        $('.testage').css('top','0px')
        $('.testage').css('height','150px')
        $('.testage').css('transform-origin','0px 0px 0px')
        $('.testage').css('opacity','0.99')
        $('.testage').css('transform','scaleX(1) scaleY(1)')
    })

    $(document).click(function(e) {

        // Si ce n'est pas #ma_div ni un de ses enfants
        if( !$(e.target).is($('.select-dropdown')) && !$.contains($('.select-dropdown')[0],e.target) && $(".select-dropdown").css('opacity') == 0.99 ) {
          console.log('yes');
          
        $('.testage').addClass('testage')
        $('.testage').css('display','')
        $('.testage').css('width','')
        $('.testage').css('left','')
        $('.testage').css('top','')
        $('.testage').css('height','')
        $('testage').css('transform-origin','0px 0px 0px')
        $('testage').css('opacity','')
        $('testage').css('transform','')
        }
      
      });
     
      

})
