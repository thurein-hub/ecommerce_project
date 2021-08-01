$(document).ready(function(){
    count();
			function count(){
				var shop_str = localStorage.getItem('e_commerce');
				if(shop_str){
					var shop_arr = JSON.parse(shop_str);
					var count=0;
					var total=0;
					$.each(shop_arr, function(i,v){
						if (v.discount) {
							var price = v.discount;
						}
						else{
							var price = v.price;
						}
						var subtotal = price * v.qty;
						count += v.qty;
						total += subtotal;
							
					});
					$('.cartNoti').text(count);
					// $('.cartTotal').text(total+'Ks');
                    $('.cartTotal').text('$'+total);
					
				}else{
					$('.cartNoti').text(0);
					// $('.cartTotal').text(0+'Ks');
					$('.cartTotal').text('$'+0);


				}
				// return count;
			}
				
			$('.addtocartBtn').click(function(){
				var id=$(this).data('id');
				var name=$(this).data('name');
				var price=$(this).data('price');
				var discount=$(this).data('discount');
				var photo=$(this).data('photo');
				var codeno=$(this).data('codeno');
                var quantity = $('#qty').val();
                var qty = parseInt(quantity);
            

				var item ={
					id:id,
					name:name,
					price:price,
					discount:discount,
					photo:photo,
					codeno:codeno,
					qty:qty,
				}

				var shop_str=localStorage.getItem('e_commerce');
				var shop_arr;
				if(shop_str==null){
					shop_arr =Array();
				}else{
					shop_arr = JSON.parse(shop_str);
				}

				var status=false;
				$.each(shop_arr, function(i,v){
					if(id==v.id){
						v.qty += qty;
						status=true;
					}
				});
				
				if(status==false){
					shop_arr.push(item);
				}

				var shopData = JSON.stringify(shop_arr);
				localStorage.setItem("e_commerce", shopData);
				count();
			});

            //for serarch item
            $('#search').on('keyup', function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                  var search_data =$(this).val();
                  if(search_data.length>0){
                    $.ajax({
                        url: "/search",
                        method:"POST",
                        data:{
                            searchdata:search_data
                        },
                        success: function(res){
                           var search_html ="";
                           $.each(res,function(i,v){
                                var detailUrl ="/detail/"+v.id;
                               search_html+=`<li class="py-2 fs-5"><a href="${detailUrl}" style="text-decoration: none"><img src="../storage/${v.photo}" width="50" class="pr-1">${v.name}</a></li>`;
                            
                           });
                           $('.pageWrapper .for_searchdata .result_data').html(search_html);
                        }
                    });
                  }
            
                
                 
              });
  
    // for clear all data in localstorage
    $('.clearbtn').on('click', function(){
        localStorage.clear();
        window.location.href="cart";
    });
  
  });