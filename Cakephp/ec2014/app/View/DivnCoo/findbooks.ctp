<fieldset>
         <legend>Data Entry Status of <?php echo $unions[0]['GeoCodeUnion']['union_name'] ?></legend><br>
          <table>
     	<thead>
     		<tr>
     			<th>Total Entered Book</th>
     			<th>Total Entered Unit</th>
     			<th>Total DEO Worked</th>
     			<th>Total Supervisor Worked</th>
     		</tr>
     	</thead>
     	
     	<tbody>
     		<tr>
     			<td><?php echo $totalBooks ?></td>
     			<td><?php echo $totalUnit ?></td>
     			<td><?php echo $totalDeoWork ?></td>
     			<td><?php echo $totalSup ?></td>
     		</tr>
     	</tbody>
         </table>
         
            </fieldset>
            <br/>


<fieldset>
           <legend>Books of <?php echo $unions[0]['GeoCodeUnion']['union_name'] ?> 
           	
           	</legend><br>
          <div class="master_tbl">
                <ul class="list_with_icon">
                  
        <?php
			foreach ($books as $key => $book) 
			{
			echo ($key+1).". ".$book['Book']['id'];
				echo "<br />";
			}
?>
             </ul>
            </div>
            </fieldset>
            <br/>