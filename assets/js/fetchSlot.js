$(document).ready(()=>{
    
    function formatCreater(time){
        let start_format =  time.split(':');
        time_format = +(start_format[0]) >= 12 ? 'pm' : 'am';
        return time_format;
    }
    
    $('#slot-days').on('change',function(){
        if($(this).val() != ''){
            let slotId = $(this).attr('data-slot-id');
            let value = $(this).val();
           
            $.ajax({
                url:'ajax/slot-data.php',
                type:'POST',
                data:{id:slotId,value:value},
                dataType:'json',
                success:function(res){
                   $('#slot-time').empty();
                   $('#slot-time').append(`<option value="">select slot time</option>`);

                   
                   if(res.slot_status == 'success'){
                       Array.from(res.data).forEach((item,indx)=>{
                        let s_f = formatCreater(item.startTime);
                        let e_f = formatCreater(item.endTime);
                    
                        $('#slot-time').append(`<option value="${item.startTime} ${s_f}-${item.endTime} ${e_f}">${item.startTime} ${s_f} to ${item.endTime} ${e_f}</option>`);
                       })
                   }
                },
                error:function(xhr,errorThrown){
                    console.log(errorThrown);
                }
            })

        }
    })
})