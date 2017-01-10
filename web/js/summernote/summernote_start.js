$(document).ready(function() {
    
        $('#product-content').summernote(
                {
                    height: 500,
                    callbacks:{
                        onImageUpload: function(files) { 

                             sendFile(files[0],$(this),"product","content"); //sendfile函数是自定义的，必须引用$(this)才能在sendfile函数内进行操作
                           }

                    }
                
                }
                 );

        
        $('#product-price_desc').summernote(
                {
                    height: 500,
                    callbacks:{
                        onImageUpload: function(files) { 

                             sendFile(files[0],$(this),"product","price_desc"); //sendfile函数是自定义的，必须引用$(this)才能在sendfile函数内进行操作
                           }

                    }
                }
                 ); 
        $('#product-process_desc').summernote(
                {
                    height: 500,
                    callbacks:{
                        
                        onImageUpload: function(files) { 

                             sendFile(files[0],$(this),"product","process_desc"); //sendfile函数是自定义的，必须引用$(this)才能在sendfile函数内进行操作
                           }

                    }
                }
                 );
        $('#product-quality_desc').summernote(
                {
                    height: 500,
                    callbacks:{
                        onImageUpload: function(files) { 

                             sendFile(files[0],$(this),"product","quality_desc"); //sendfile函数是自定义的，必须引用$(this)才能在sendfile函数内进行操作
                           } 

                    }
                }
                 ); 
//         
//         
function sendFile(file,editor,source_type,file_type) {//插入summernote图片
            
//        file["product-content"] = $('#product-content').val();
//        console.log(file);
//        console.log(editor);
//        console.log(source_type);
        
        data = new FormData(); 
        data.append("files", file);
//        data.append("product-content",$('#product-content').val());
        data.append("source_type", source_type);
        data.append("file_type", file_type);
        
        console.log(data);
//        console.log(baseurl);
        upload_url = baseurl+"/index.php?r=product/imguploader"; 
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

                  
                editor.summernote("insertImage",url);//必须采取这样的方式才能插入
                

            } 
        }); 
    }    
});