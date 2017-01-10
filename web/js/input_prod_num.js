// 数量改变
        $("tr .input_prod_num").change(function() {
            
			var num = $(this).val();
			
			var obj = $(this).closest("tr") ;
			console.log("changed:"+ num);
			var base_price = obj.find(".input_sku_base_price"  ).val();
			var step_price =  obj.find(".input_sku_step_price"  ).val();
			var base_mins =   obj.find(".input_sku_base_mins"  ).val();
			var step_mins =   obj.find(".input_sku_step_mins"  ).val();
            num = parseInt(num);
			if ( isNaN(num) ) num = 0;
			base_price = parseFloat(base_price) ;
			step_price = parseFloat(step_price) ;
			base_mins = parseFloat(base_mins) ;
			step_mins = parseFloat(step_mins) ;
			var total_price = base_price + num * step_price ;
			var total_mins = base_mins + num * step_mins ;
			
			if (num == "0") {
				total_price = "";
				total_mins = "";
			}
			
			$(this).closest("tr").find(".input_total_price").val(total_price);
			$(this).closest("tr").find(".input_total_mins").val(total_mins );
			js_update_total_price();
			js_update_total_mins();
		
			$(".input_dikou").trigger("change" );			
        });
		
		function js_update_total_price()
		{
				var total = 0 ;
				 $("tr .input_total_price").each(function (i, item) {
				  var tmp1 =  ( $(item).val()) ;
				  
					if (tmp1 > 0)
			      	total = parseFloat(total) + parseFloat(tmp1) ;  
			    }) ;
			
			    $("#span_totalprice").html(total) ;
				 $(".order_amt").val(total);

			
		}
		
		function js_update_total_mins()
		{
				var total = 0;
			 $("tr .input_total_mins").each(function (i, item) {
				  var tmp1 =  ( $(item).val()) ;
				 
				  if (tmp1 >0 )
			      total = parseInt( total) +  parseInt(tmp1) ;  
			    }) ;
			 $("#span_totalmin").html(total) ; 
			  $(".minutes_need").val(total);
			
			
		}
        //获取该类别下的商品列表
        function getProd(id, obj)
        {
            var href = "' . Url::to(['/kefu/order/getprodlist'], true). '";

            $.ajax({
                "type"  : "GET",
                "url"   : href,
                "data"  : {cat_id : id},
                success : function(d) { 
                    obj.append(d);
                }
            });
        }

        //获取商品下面的SKU列表
        function getSku(id,obj)
        {
            var href = "' . Url::to(['/kefu/product/getskulist'], true) . '";
            $.ajax({
                "type"  : "GET",
                "url"   : href,			 
                "data"  : {prod_id : id},
                success : function(d) {
                   console.log(d);
				   obj.append(d);
                }
            });
        }
		
		//获取SKU 的详细信息
        function getSkuinfo(id,obj)
        {
            var href = "' . Url::to(['/kefu/product/getskuinfo'], true) . '";
            $.ajax({
                "type"  : "GET",
                "url"   : href,		
				"dataType":"json",
                "data"  : {sku_id : id},
                success : function(d) {
                   obj.find(".input_skuid").val(d.id);
				   obj.find(".input_sku_base_mins").val(d.base_mins);
				   obj.find(".input_sku_step_mins").val(d.step_mins);
				   obj.find(".input_sku_base_price").val(d.base_price);
				   obj.find(".input_sku_step_price").val(d.step_price);
				   obj.find(".input_sku_min_nums").val(d.min_nums);
				   obj.find(".input_prod_num").val(d.min_nums);
				   obj.find(".input_prod_price").val(d.base_price);
				   obj.data("input_sku_base_price",d.base_price );
				   obj.data("input_sku_step_price",d.step_price );
				   obj.data("input_sku_base_mins",d.base_mins );
				   obj.data("input_sku_step_mins",d.step_mins );
				   
				   obj.find(".input_prod_num").trigger("change");
				   
                }
            });
        }

        //搜索小区
        $("#search-community").click(function() {
            var word   = $("#keyword").val();
            var areaid = $("#itemsearch-areaname option:selected").val();
            var href   = "' . Url::to(['/service/base/search-community'], true) . '";

            if (areaid > 0) {
                $.ajax({
                    "type"  : "GET",
                    "url"   : href,
                    "data"  : {id : areaid, word : word},
                    success : function(d) {
                        $("#itemsearch-communityname").html(d);
                    }
                });
            }
        });
		$(".btn-pricegroup button").click(function(){
			var obj=$(this);
			var price_index =  obj.data("priceindex");
		    $(".input_priceindex").val(price_index) ;
			console.log( obj.data("priceindex"));
			obj.closest("div").find("button").removeClass("btn-primary");
			obj.addClass("btn-primary");
			$("tr .input_sku_step_price").each(function (i, item) {
			  var price =  ( $(item).val()) ;
			  var price1 = ( $(item).data("price1")) ;
			  var price2 = ( $(item).data("price2")) ;
			  var price3 = ( $(item).data("price3")) ;
			  var price4 = ( $(item).data("price4")) ;
			  
			  if (price_index ==1)  price =price1;
			  if (price_index ==2)  price =price2;
			  if (price_index ==3)  price =price3;
			  if (price_index ==4)  price =price4;
			  $(item).val(price) ;
			  
			     
		    }) ;
			$("tr .input_prod_num").trigger("change") ;
			
			
		});
		$(".input_dikou").change(function(){
			 var dikou_price = $(this).val();
			 var total_price = $(".order_amt").val();
			 $(".input_paymentneed").val(total_price - dikou_price) ;
		});
	 
		$(".btn-searchcustomer").click(function() {
			var mobile = $("#customer-mobile").val();
			
			console.log("mobile:"+mobile) ;
			var href = "' . Url::to(['/kefu/order/getcustomerinfo'], true) . '";
			if (mobile !="") {
                $.ajax({
                    "type"  : "GET",
                    "url"   : href,
					"dataType":"json",
                    "data"  : {mobile : mobile},
                    success : function(d) {
						if (d.result =="1") {
							$("#customerModal .modal-title").html("查找:"+mobile);
							$("#customerModal .modal-body").html(d.addrhtml);
							$("#customer-name").val(d.name); 							
							$("#customerModal").modal("show" );
							$("#customerModal").data("addrlist",d.json_addrinfo);
						} else {
							alert("这个客户是新客户:"+mobile);
						}
					 
                    }
                });
            } else {
				alert("先输入手机号码");
			}
			
			return false ;
			
		});
		$( "#customerModal" ).on( "click", ".btn-addrclick", function( e ) {
			
				 var index =  $(this).data("addrindex");
				 var json_addrinfo = $("#customerModal").data("addrlist");
				 
				 if (index > 0) {
					 
					 $("#customer-city").val(json_addrinfo[index].city);
					 $("#customer-zone").val(json_addrinfo[index].zone);
					 $("#customer-address").val(json_addrinfo[index].address);
					 $("#order-contact_name").val(json_addrinfo[index].name);
					 $("#order-contact_phone").val(json_addrinfo[index].phone); 
					 
				 } else {
					 $("#customer-city").val("0");
					 $("#customer-zone").val("0");
					 $("#customer-address").val("");
					 $("#order-contact_name").val("");
					 $("#order-contact_phone").val(""); 
					 
					 
				 }
 				 
				 
				 $(".hidden_addrindex").val(index) ;
				 
				 // 
				 
				 
				 $("#customerModal").modal("hide" );
		} ); 