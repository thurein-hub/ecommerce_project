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
            var html_body="";
            var html="";
            // $('.empty_cart').show();

            if(shop_str){
                $('.empty_cart').hide();
                // $('.noneshoppingcart_div').hide();
                var shop_arr=JSON.parse(shop_str);
                
                var html_foot="";
                var html_body="";
                if(shop_arr.length>0){
                    var j=1;
                    var total=0;
                    $.each(shop_arr,function(i,v){
                        var amount =(v.discount == 0) ? v.price*v.qty : v.discount*v.qty;
                        var price = (v.discount == 0) ? `<span class="money">$${v.price}</span>` : `<span class="money">$${v.discount}</span><p class="text-muted"><del>$${v.price}</del></p>`;
                        html +=`<tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#"><img class="cart__image" src="storage/${v.photo}" alt="Elastic Waist Dress - Navy / Small"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">${v.name}</a>
                                        </div>
                                        
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        ${price}
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus min" href="javascript:void(0);" data-key="${i}"><i class="icon icon-minus"></i></a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="${v.qty}">
                                                <a class="qtyBtn plus max" href="javascript:void(0);" data-key="${i}"><i class="icon icon-plus"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">$${amount}</span></div>
                                    </td>
                                    <td class="text-center small--hide"><a href="#" data-key="${i}" class="btn btn--secondary cart__remove removebtn" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                                </tr>`;
                        
                        total+=amount;
                    });
                    html_foot+=`<span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">$${total}</span></span>`;

                    $('#tbody').html(html);
                    $('.solid-border .for_subtotal').html(html_foot);
                    $('.checkoutbtn').attr('data-total',total);
                }else{
                    $('.checkout').addClass('disabled');
                    html += `<tr>
                                <td colspan="5" style="text-align: center; font-size: 30px">There is no item!</td>
                            </tr>`;
                    $('#tbody').html(html);
                }
            }else{
                
                $('.checkout').addClass('disabled');
                
                html += `<tr class="px-5">
                            <td colspan="5" style="text-align: center; font-size: 30px">There is no item!</td>
                        </tr>`;
                $('#tbody').html(html);


            }
    }
  
    // for remove each item
    $('tbody').on('click','.removebtn',function(){
        var key= $(this).data('key');
        var shop_str=localStorage.getItem('e_commerce');
        
        if(shop_str){
            var shop_arr = JSON.parse(shop_str);
            $.each(shop_arr,function(i,v){
                if(key==i){
                        shop_arr.splice(key,1);
                }
                var shopData = JSON.stringify(shop_arr);
                localStorage.setItem('e_commerce',shopData);
                getData();
                count();
            });
            
        }
    });
  
    // for increase qty
    $('tbody').on('click','.max',function(){
        var key = $(this).data('key');
  
        var shop_str = localStorage.getItem('e_commerce');
        if(shop_str){
            var shop_arr=JSON.parse(shop_str);
            $.each(shop_arr,function(i,v){
                if(key==i){
                    v.qty++;
                }
  
                var shopData = JSON.stringify(shop_arr);
                localStorage.setItem('e_commerce',shopData);
                getData();
                count();
            })
        }
    });
  
    // for descrease qty
    $('tbody').on('click','.min',function(){
        var key= $(this).data('key');
        var shop_str=localStorage.getItem('e_commerce');
        
        if(shop_str){
            var shop_arr = JSON.parse(shop_str);
            $.each(shop_arr,function(i,v){
                if(key==i){
                    v.qty--;
                    if(v.qty==0){
                        shop_arr.splice(key,1);
                    }
                }
                var shopData = JSON.stringify(shop_arr);
                localStorage.setItem('e_commerce',shopData);
                getData();
                count();
            })
        }
    });
  
    // for checkout order
    $('.checkoutbtn').on('click', function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
        var viewid=$(this).data('viewid');
  
        $.post("/quickview",{id:viewid},function(response){
            // console.log(response);
            // localStorage.clear();
            window.location.href="index";
        //   getData();
        //   count();
        });
       
    });

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