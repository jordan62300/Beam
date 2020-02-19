var actualNumber = 0
const url = new URL(window.location.href);                   // get back the id of student that was in the url
const params = new URLSearchParams(url.search);                
const mangaId = params.get('mangaId');                  
const tomeId = params.get('tomeId');    



$(document).ready(function () {

    // Page suivante du lecteur de manga
     
    $(document).on('click','.btn-add',function (e) {
        e.preventDefault() 
        
        actualNumber = actualNumber + 1; 
         $.post("index.php?content=manga&mangaId="+mangaId+"&tomeId="+tomeId, {
             incresedNumber : actualNumber 
             
         },
         function(data, status) {
        $('html').html(data)

         })
        
    })

    // Page precedente du lecteur de manga

    $(document).on('click','.btn-remove',function (e) {
        e.preventDefault() 
        
        actualNumber = actualNumber - 1; 
         $.post("index.php?content=manga&mangaId="+mangaId+"&tomeId="+tomeId, {
             decreasedNumber : actualNumber 
             
         },
         function(data, status) {
        $('html').html(data)

         })
        
    })

    $(document).on('change','#chapitre-select',function (e) {
      var id =   $('#chapitre-select').val();
        console.log(id)
        $.post("index.php?content=manga&mangaId="+mangaId+"&tomeId="+id, {
            tomeSelectedId : id 
            
        },
        function(data, status) {
            $('html').html(data)
            console.log(id)
            window.location = "index.php?content=manga&mangaId="+mangaId+"&tomeId="+id
        })
        
    })

})