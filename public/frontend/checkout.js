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

				var item ={
					id:id,
					name:name,
					price:price,
					discount:discount,
					photo:photo,
					codeno:codeno,
					qty:1,
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
						v.qty++;
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
    // count();
    getData();
    // function count(){
    //     var shop_str = localStorage.getItem('e_commerce');
    //     if(shop_str){
    //         var shop_arr = JSON.parse(shop_str);
    //         var count=0;
    //         var total=0;
    //         $.each(shop_arr, function(i,v){
    //             if (v.discount) {
    //                 var price = v.discount;
    //             }
    //             else{
    //                 var price = v.price;
    //             }
    //             var subtotal = price * v.qty;
    //             count += v.qty;
    //             total += subtotal;
                    
    //         });
    //         $('.cartNoti').text(count);
    //         $('.cartTotal').text(total+'Ks');
            
    //     }else{
    //         $('.cartNoti').text(0);
    //         $('.cartTotal').text(0+'Ks');
  
    //     }
    // }
  
    function getData(){
            var shop_str=localStorage.getItem('e_commerce');
            if(shop_str){
                // $('.shoppingcart_div').show();
                // $('.noneshoppingcart_div').hide();
                var shop_arr=JSON.parse(shop_str);
                var html="";
                var html_foot="";
                if(shop_arr.length>0){
                    var j=1;
                    var total=0;
                    $.each(shop_arr,function(i,v){
                        var amount =(v.discount == 0) ? v.price*v.qty : v.discount*v.qty;
                        var price = (v.discount == 0) ? v.price : v.discount;
                        html +=`<tr>
                                    <td class="text-left">${v.name}</td>
                                    <td>$${price}</td>
                                    <td>${v.qty}</td>
                                    <td>$${amount}</td>
                                </tr>`;
                        total+=amount;
                    });
                    html_foot+=`<td colspan="3" class="text-right">Total</td>
                    <td>$${total}</td>`;
                    $('tbody').html(html);
                    // $('tfoot #total').html(html_foot);
                    $('tfoot .grand_total').html(html_foot);
                    $('.checkoutbtn').attr('data-total',total);
                }else{
                    $('.shoppingcart_div').hide();
                    $('.noneshoppingcart_div').show();
                }
            }else{
                $('.shoppingcart_div').hide();
                $('.noneshoppingcart_div').show();
            }
            
    }
  
    // for remove each item
    // $('tbody').on('click','.removebtn',function(){
    //     var key= $(this).data('key');
    //     var shop_str=localStorage.getItem('e_commerce');
        
    //     if(shop_str){
    //         var shop_arr = JSON.parse(shop_str);
    //         $.each(shop_arr,function(i,v){
    //             if(key==i){
    //                     shop_arr.splice(key,1);
    //             }
    //             var shopData = JSON.stringify(shop_arr);
    //             localStorage.setItem('e_commerce',shopData);
    //             getData();
    //             count();
    //         })
            
    //     }
    // });
  
    // for increase qty
    // $('tbody').on('click','.max',function(){
    //     var key = $(this).data('key');
  
    //     var shop_str = localStorage.getItem('e_commerce');
    //     if(shop_str){
    //         var shop_arr=JSON.parse(shop_str);
    //         $.each(shop_arr,function(i,v){
    //             if(key==i){
    //                 v.qty++;
    //             }
  
    //             var shopData = JSON.stringify(shop_arr);
    //             localStorage.setItem('e_commerce',shopData);
    //             getData();
    //             count();
    //         })
    //     }
    // });
  
    // for descrease qty
    // $('tbody').on('click','.min',function(){
    //     var key= $(this).data('key');
    //     var shop_str=localStorage.getItem('e_commerce');
        
    //     if(shop_str){
    //         var shop_arr = JSON.parse(shop_str);
    //         $.each(shop_arr,function(i,v){
    //             if(key==i){
    //                 v.qty--;
    //                 if(v.qty==0){
    //                     shop_arr.splice(key,1);
    //                 }
    //             }
    //             var shopData = JSON.stringify(shop_arr);
    //             localStorage.setItem('e_commerce',shopData);
    //             getData();
    //             count();
    //         })
    //     }
    // });
  
    // for checkout order
    $('.checkoutbtn').on('click', function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
        var notes =$('.notes').val();
        var cartArray = localStorage.getItem('e_commerce');
        
        var total = $(this).data('total');
  
        $.post("/order",{cart:cartArray,note:notes,total:total},function(response){
            // console.log(response);
            localStorage.clear();
            window.location.href="ordersuccess";
        //   getData();
        //   count();
        });
       
    });
  
    // for clear all data in localstorage
    $('.clearbtn').on('click', function(){
        localStorage.clear();
        window.location.href="cart";
    });
  
  });