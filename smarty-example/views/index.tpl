Hello  {$name}  --  {$someconstant}

<table>
	
	{foreach from=$people key=k item=p}
	
		<tr style="background: {cycle values='blue, yellow}">
		
			<td>{{$k}</td>
			
			<td>{$p}</td>
		</tr>

	{/foreach}
</table>
