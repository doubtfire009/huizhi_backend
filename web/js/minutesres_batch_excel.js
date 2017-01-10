$(document).ready(function() {
    $('#batch_excel_btn').bind('click',function(){
        $("#batch_excel_file").trigger('click');
        
    }
            );
    $("#batch_excel_file").change(function(){ 
        batch_excel_upload('batch_excel_file','files/minutesres','batch_excel');
    });
    
    function batch_excel_upload(elementId,source_type,file_type){
        upload_url = baseurl+"/index.php?r=minutesres/batch_excel"; 
        var data = new FormData();
        data.append('files', $('#'+elementId)[0].files[0]);
        data.append('elementId',elementId);
        data.append("source_type", source_type);
        data.append("file_type", file_type);
        console.log(data);
        console.log(elementId);
        $.ajax({ 
            data: data,
            type: "POST", 
            url: upload_url, 
            cache: false, 
            contentType: false, 
            processData: false, 
            success: function(data) {
                s = jQuery.parseJSON(data);
                console.log(s);
                location.reload();

                

            }
        }); 
    }
    
});