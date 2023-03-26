$(document).ready(function(){
    $('.remove_item').click(function(){
        const id = $(this).attr('id');
        $.post("removeItem.php",
        {
            id: id
        },
        (data) => {
           if(data){
            $(this).parent().hide(600);
           }
        }
        );
   
    });

    $(".check_box").click(function(e){
        const id = $(this).attr('dataId');
        
        $.post('checkItem.php',
            {
                id: id
            },
            (data) => {
                if(data != 'error'){
                    const h2 = $(this).next();

                    if(data === '1'){
                        h2.removeClass('checked');
                    }
                    else{
                        h2.addClass('checked');
                    }
                }
            }

        );
    });

    $(".primaryTask").click(function(e){
        const idCheck = $(this).attr('idData');
        
        $.post('checkItem.php',
            {
                idCheck: idCheck
            },
            (data) => {
                if(data != 'error'){
                    if(data === '1'){
                        console.log("1");
                       

                    }
                    else{
                        console.log("0");
                    }
                }
            }

        );
    });

   
    $(".btn").click(function(e) {
    var buttonText = $(this).text();
    console.log(buttonText);
        $.post('favorite.php',
                {
                    buttonValue: buttonText
                },
                (data) => {
                $('.wrap').html(data);
                }

            );
        
        });
            
       
    $(".search").keyup(function(e){
        var input = $(this).val();
    
        $.post('searchTask.php',
            {
                input: input
            },
            (data) => {
                $('.wrap').html(data);
            }

        );
    });

    $(document)
        .on('click','.readMore',function() { 
            $(this).removeClass('readMore').addClass('showLess').html('Show Less').prev('.description').removeClass('task'); 
        })

        .on('click','.showLess',function() { 
            $(this).removeClass('showLess').addClass('readMore').html('Read More').prev('.description').addClass('task'); 
        });

});

