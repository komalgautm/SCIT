$("#next1").click(function(e) {
    e.preventDefault();
    var start_date = $("#start_time").val(); 
    var end_date = $("#end_time").val(); 
    var break_time = $("#break_time").val();
    var shift_notes = $("#shift_notes").val();
    var token = "<?=csrf_token()?>";
    $.ajax({
        url:"{{ url('/add-shift-data') }}",    
        type: "post",    //request type,
        dataType: 'txt',
        data: {start_date: start_date, end_date: end_date, break_time: break_time, shift_notes: shift_notes,  _token:token},
        success:function(result){
           console.log(result);
            
        }
    });
 
});