<?php
					$select="
					 SELECT a.*,SUM(a.checkout_quantity) as total_qty,
					 
					 SUM(a.checkout_quantity*b.price) as total_price,
					 day(a.checkout_date) as checkout_day	
					 FROM checkout as a
					 LEFT JOIN tbl_food as b
					 ON a.checkout_product_id = b.id
					 WHERE a.checkout_status='3'
					 GROUP BY checkout_date";

					$result = $con->query($select);

					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) { ?> 
					
				<tr>
					<?php
					$date = strtotime($row["checkout_date"]);
					
					?>
					<td><?php echo date('F d Y', $date); ?></td>
					<!-- <td><?php echo $row["total_qty"]; ?></td> -->
					<td>P <?php echo $row["total_price"]; ?>.00</td>
					
					
				</tr>			
				<?php	
					}
					} else {
					echo "<tr><td colspan='10'>0 results</td></tr>";
					}
				?>
				
				</tbody>
			</table>
		</div>
	</div>


		<br><br>
	</body>
</html>
