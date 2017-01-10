$(document).ready(function() {
    if($('#product-icon').val() == ""){
//        $('#product_icon_img img').attr("src",baseurl+"/img/product/system/product_question_mark.jpg");
        $('#product_icon_img img').attr("src",imgurl+"/backend/product/system/product_question_mark.jpg");

    }else{
        $('#product_icon_img img').attr("src",$('#product-icon').val());
    }
    
    if($('#product-logo').val() == ""){
//        $('#product_logo_img img').attr("src",baseurl+"/img/product/system/product_question_mark.jpg");
        $('#product_logo_img img').attr("src",imgurl+"/backend/product/system/product_question_mark.jpg");

    }else{
        $('#product_logo_img img').attr("src",$('#product-logo').val());
    }
    
    if($('#product-bigimage').val() == ""){
//        $('#product_bigimage_img img').attr("src",baseurl+"/img/product/system/product_question_mark.jpg");
        $('#product_bigimage_img img').attr("src",imgurl+"/backend/product/system/product_question_mark.jpg");

    }else{
        $('#product_bigimage_img img').attr("src",$('#product-bigimage').val());
    }
 /////////////////////////////////////////////////////////////   
    $('#product_icon_button').bind('click',function(){
        $("#product_icon_file").trigger('click');
        
    }
            );
    $("#product_icon_file").change(function(){ 
        product_img_upload('product_icon_file','product','icon');
    });
    /////////////////////////////////////////////////////////
    
    $('#product_logo_button').click(function(){
        $("#product_logo_file").trigger('click');
        
    }
            );
    $("#product_logo_file").change(function(){ 
        product_img_upload('product_logo_file','product','logo');
    });
    ///////////////////////////////////////////////////////////
    $('#product_bigimage_button').click(function(){
        $("#product_bigimage_file").trigger('click');
        
    }
            );
    $("#product_bigimage_file").change(function(){ 
        product_img_upload('product_bigimage_file','product','bigimage');
    });
    ///////////////////////////////////////////////////////////    
    function product_img_upload(elementId,source_type,file_type){
        upload_url = baseurl+"/index.php?r=product/imguploader"; 
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
            success: function(filename) {

                    
//                var url =  baseurl+"/img/"+source_type+"/"+file_type+"/"+filename;
                var url =  imgurl+"/backend/"+source_type+"/"+file_type+"/"+filename;
                 console.log(url); 
                 $('#'+source_type+"-"+file_type).val(url);
                 $('#'+source_type+"_"+file_type+"_img img").attr("src",url);
//                editor.summernote("insertImage",url);//必须采取这样的方式才能插入
                

            } 
        }); 

    }
});

