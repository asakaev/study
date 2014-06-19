<div class = "content">
		<div class = "header"><h1 align = "center">Дисциплины</h1><hr></div>
		<div style = "clear:right"></div>
		<div id = "select-dis">
			<input id = "search" type = "text" placeholder = "Поиск...">
			<ul class = "main-ul">
				{foreach from = $chairs key = k item = v }
					<li class = "li-item">{$k}
						<ul class = "additional-ul">
						{foreach from = $v key = keys item = value}
							<li class = "li-item" id = "{$keys}"><a href = "discipline.php?id={$keys}"> {$value}</a> </li>
						{/foreach}
						</ul>
					</li>
				{/foreach}
			</ul>
			<a href = "add.php"><div id = "add-new" class = "button">Добавить</div></a> 
		</div>