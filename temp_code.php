document.getElementById('cart_link').innerHTML="(<?php echo count($_SESSION['cart_content']);?>) View Cart";
		        			document.getElementById('add_to_cart_button').innerHTML="<a href='show_cart.php' style='color:#ffffff;'>View Cart</a>";


		        			// If the cart session variable is not set or cart array is empty 
							    if (!isset($_SESSION["cart_content"]) || sizeof($_SESSION["cart_content"]) < 1) {  
							    	$id=0;
							        // RUN IF THE CART IS EMPTY OR NOT SET 
							        $_SESSION["cart_content"] = array ( 
							            $id => array (  
							                array ("pid" => $picked_id, "size" => $picked_size, "quantity" => $picked_quantity) 
							            ) 
							        );
							         

							    // NOT EMPTY?  ARRAY_PUSH TO ADD IT IN 
							    } else { 
							         $id=$id+1;
							        array_push($_SESSION["cart_content"][$id][], array ("pid" => $picked_id, "size" => $picked_size, "quantity" => $picked_quantity));   
							    } 
							  





		foreach ($_SESSION['cart_content'] as $product) {
			$sql_fetch_product = "SELECT * FROM product WHERE product_id = $product";
			$result = $conn->query($sql_fetch_product);
			$order_price = $order_price + $_POST['product_price'];
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	
			    	?>	
			    	<tr>
			    		<td><?php echo $row['product_name'].'<p style="font-size:12px;margin-top:5px;">'.$row['product_category'].'>'.$row['product_subcategory'].'</p>';?></td>
			    		<td><input type="hidden" value="<?php echo $row['product_price'];?>" name="product_price"><?php echo $row['product_price'];?></td>
			    		<td><input type="text" value="1" name="product_size"></td>
			    		<td><input type="text" value="1" name="product_quantity"></td>
			    	</tr>
			<?php
			}
		}
	}

	for($index = 0; $index < count($_SESSION['cart_content']); $index++)
								{
									$temp_product = $_SESSION['cart_content'][$index];
									$temp_size = $_SESSION['cart_content_size'][$index];
									$temp_units = $_SESSION['cart_content_units'][$index];
		        					
		        					if(array_search($picked_id,$_SESSION['cart_content']))
		        					{
		        						$temp_units++;
		        					}

		        					else {
		        						array_push($_SESSION['cart_content'], $picked_id);
		        						array_push($_SESSION['cart_content_size'], $picked_size);
		        						array_push($_SESSION['cart_content_units'], $picked_quantity);
		        					}
		        				}



		        					<script type="text/javascript">
		function remove_from_cart()
			{
				<?php
					unset($_SESSION['cart_content'][$index]);
					unset($_SESSION['cart_content_size'][$index]);
					unset($_SESSION['cart_content_units'][$index]);
			?>
			}
	</script>


	<script type="text/javascript">
				document.getElementById("remove_from_cart").addEventListener("click", remove_from_cart);
				function remove_from_cart()
				{
					<?php
						unset($_SESSION['cart_content'][$_SESSION['current_product']]);
						unset($_SESSION['cart_content_size'][$_SESSION['current_product']]);
						unset($_SESSION['cart_content_units'][$_SESSION['current_product']]);
					?>
				}
			</script>

			<td><button class="btn btn-danger" id="remove_from_cart">Remove from cart</button></td>




			No. of units : <input type="number" name="product_quantity_picked" id="product_quantity_picked">
								<?php
									//Explode the suburbs string delimited by a comma
									$boom = explode(',', $row['product_sizes']);
									$bada_boom = array_unique($boom);
									foreach($bada_boom as $b)
									{
									$suburbOptionList .= '<option value='.$b.'>'.$b.'</option>';
									}
								?>
									Size : <select id="product_size_picked" name="product_size_picked"> <?php
									echo $suburbOptionList;
									?>
									</select>






									print_r($_SESSION['cart_content']);
echo "<br>";
print_r($_SESSION['cart_content_size']);
echo "<br>";
print_r($_SESSION['cart_content_units']);
echo "<br>";
print_r($_SESSION['cart_content_name']);
echo "<br>";
print_r($_SESSION['cart_content_price']);
echo "<br>";









				<script type="text/javascript">
					document.getElementById("fname").onchange = function() {myFunction()};

					function myFunction() {
					    var x = document.getElementById("fname");
					    x.value = x.value.toUpperCase();
					    <?php $shipping_cost = "<script>x.value</script>";?>
					    document.getElementById("shipping_cost_p").innerHTML.value = x.value;
					}
				



				if(shipping_cost==0)
					    {
					    	document.getElementById("display_cost").innerHTML = "<span class='text-muted'>Enter ZIP Code to calculate shipping</span>";
					    }
					    var x = document.getElementById("fname").value;
					    
					    if(x >= 400001 && x<=400105)
					    {
					    	shipping_cost = 50;
					    	document.getElementById("display_cost").innerHTML = "Rs. "+shipping_cost;
					    }
					    else{
					    	shipping_cost = 100;
					    	document.getElementById("display_cost").innerHTML = "Rs. "+shipping_cost;		    	
					    }
					    



					function myFunction() {
					    var x = document.getElementById("fname").value;
					    
					    if(x >= 400001 && x<=400105)
					    {
					    	shipping_cost = 50;
					    	document.getElementById("display_cost").innerHTML = "Rs. "+shipping_cost;
					    	
					    }
					    else{
					    	shipping_cost = 100;
					    	document.getElementById("display_cost").innerHTML = "Rs. "+shipping_cost;
					    }


					}	










//SEARCH BAR

<div id="search" style="display:none" class="container">
         
<div class="text-center">
   <form action="display_search_results.php" method="get" style="display:inline;">
	    <div class="form-group" style="display:inline;">
		<input type="text" name="searched_product" id="searched_product" placeholder="Search for a product" style="padding: 5px; width:70%">
		<input class="btn btn-dark" type="submit" value="Search">
	    </div>

	  </form>
<button type="button" class="btn btn-secondary" onclick="myFunction1()"><i class="fas fa-times fa-lg"></i></button>

<script>
function myFunction1() {
   document.getElementById('search').style.display = "none";
}
</script>
</div>
          
</div>

	
	   		<li class="nav-item">
                            <a class="nav-link login-signup" onclick="myFunction()" role="button"><i class="fas fa-search fa-lg"></i></a>
                        </li>